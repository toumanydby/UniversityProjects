#!/usr/bin/env python3
# -*- coding: utf-8 -

from sys import argv
from socket import gethostbyname
import asyncio


async def sndrcv(reader, writer, msg, code, optprint=False):
    """envoie le message [msg] au serveur et attend le code retour [code]
        génère un message d'erreur et quitte sinon"""
    if msg is not None:
        writer.write(msg.encode() + b"\r\n")
    data = await reader.readline()
    data = data.decode()
    if code != data[:3]:
        print(f"Oups... wanted {code} and got {data[:3]}")
        exit(1)
    if optprint:
        print("<<<", data[:-1])


async def getcode(reader, writer, msg, optprint=False):
    """envoie le message [msg] au serveur et retourne le code retour [code]
    avec l'option optprint, affiche le message sans le code"""
    if msg is not None:
        writer.write(msg.encode() + b"\r\n")
    data = (await reader.readline()).decode()
    try:
        code = int(data[:3])
    except ValueError:
        print("Oops! An integer code was expected here.")
    if optprint:
        print(data[4:])
    return (code)


def getint(msg):
    """demande une valeur entière à l'utilisateur"""
    while True:
        try:
            y = int(input(msg))
            break
        except ValueError:
            print("Oops!  That was no valid number.  Try again...")
    return (y)


async def play(reader, writer):
    """joue une partie"""
    k = (await getcode(reader, writer, None)) - 300
    while (k > 0):
        if k > 1:
            print(str(k) + ' rounds remaining.')
        else:
            print('Last round.')
        play = getint("""
What do you want to play? Type:
0 for rock.
1 for paper.
2 for scissors.
""")
        while play not in range(0, 3):
            print("Not a valid play!\r\n")
            play = getint("""
What do you want to play? Type:
0 for rock.
1 for paper.
2 for scissors.
""")
        k = (await getcode(reader, writer, "PLAY: " + str(play), True)) - 300
    writer.close()


async def computergame(reader, writer):
    """partie en mode 0 : contre une IA"""
    await sndrcv(reader, writer, 'MODE: 0', "200")
    coderep = 400
    while coderep == 400:
        nbrounds = getint("How many rounds do you want to play?\r\n")
        coderep = await getcode(reader, writer, "NBROUNDS: " + str(nbrounds))
        if coderep == 400:
            print("Not a valid number of rounds.")
    if coderep != 200:
        print("Exiting now!")
        exit(1)
    await play(reader, writer)


async def namelesstable(reader, writer):
    """partie en mode 1 : anonyme"""
    await sndrcv(reader, writer, 'MODE: 1', "200")
    coderep = 400
    while coderep == 400:
        nbrounds = getint("How many rounds do you want to play?\r\n")
        coderep = await getcode(reader, writer, "NBROUNDS: " + str(nbrounds))
        if coderep == 400:
            print("Not a valid number of rounds.")
    if coderep != 200:
        print("Exiting now!")
        exit(1)
    code = await getcode(reader, writer, None)
    if code == 201:
        print("Starting game now!")
    else:
        if code == 202:
            print("Waiting for an oponent.")
        else:
            print("Exiting now!")
            exit(1)
    await play(reader, writer)


async def createnamedtable(reader, writer):
    """mode 2 : création d'une table nommée"""
    await sndrcv(reader, writer, 'MODE: 2', "200")
    coderep = 400
    while coderep == 400:
        tname = input("What name do you choose for your table?\r\n")
        coderep = await getcode(reader, writer, "TNAME: " + tname, True)
    if coderep != 200:
        print("Exiting now!")
        exit(1)
    coderep = 400
    while coderep == 400:
        nbrounds = getint("How many rounds do you want to play?\r\n")
        coderep = await getcode(reader, writer, "NBROUNDS: " + str(nbrounds))
        if coderep == 400:
            print("Not a valid number of rounds.")
    if coderep != 202:
        print("Exiting now!")
        exit(1)
    print("Waiting for a second player.")
    await play(reader, writer)


async def joinnamedtable(reader, writer):
    """mode 3 : accéder à une table nommée"""
    await sndrcv(reader, writer, 'MODE: 3', "200")
    tname = input("What table do you want to join?\r\n")
    coderep = await getcode(reader, writer, "TNAME: " + tname, True)
    if coderep == 500:
        print("No table exists with this name. Bye.")
        exit(1)
    print("Starting game now.")
    await play(reader, writer)


async def shif_client(server):
    reader, writer = await asyncio.open_connection(server, 999)
    await sndrcv(reader, writer, None, "200")
    mode = -1
    while mode not in range(4):
        mode = getint("""
How do you want to play? Type:
0 to start a game against an IA.
1 to play against the first available oponent.
2 to create a named table and wait for someone to connect.
3 to join a named tametable.

""")
    f = [computergame, namelesstable, createnamedtable, joinnamedtable][mode]
    await f(reader, writer)


if __name__ == '__main__':
    if len(argv) != 2:
        print("usage: {scriptname} server".format(scriptname=argv[0]))
        exit(1)
    sname = argv[1]
    server = gethostbyname(sname)
    print("connecting to :", sname, server)
    asyncio.run(shif_client(server))
