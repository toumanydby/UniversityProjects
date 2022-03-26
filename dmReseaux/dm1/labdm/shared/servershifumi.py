#!/usr/bin/env python3
# -*- coding: utf-8 -


from sys import argv
import asyncio
import random
import time


async def send(writer, msg):
    """envoie le message [msg] au client"""
    file = open("shared/shifumi.log", 'a')
    writer.write(msg.encode() + b"\r\n")
    await writer.drain()
    sockname = str(writer.get_extra_info('sockname'))
    timeNow = str(time.ctime())
    msgTowrite = msg + " >>> to " + sockname + " at " + timeNow + "\r\n"
    file.write(msgTowrite)
    file.close()


async def rcv(reader, writer):
    """recupere un message du client """
    file = open("shifumi.log", "a")
    data = await reader.readline()
    peername = str(writer.get_extra_info('sockname'))
    timeNow = str(time.ctime())
    msg = data.decode().strip()
    msgTowrite = msg + " <<< to " + peername + "at" + timeNow + "\r\n"
    file.write(msgTowrite)
    file.close()
    return data.decode().strip()


async def victoireGame(coupJoueur1, coupJoueur2):
    """Fonction qui decide en fonction de deux coups qui a gagne le tour"""
    victoire, winnerr = False, ""
    if coupJoueur1 == 0:
        if coupJoueur2 == 0:
            victoire = False
            winnerr = "nul"
        elif coupJoueur2 == 1:
            victoire = True
            winnerr = "joueur2"
        else:
            victoire = True
            winnerr = "joueur"
    elif coupJoueur1 == 1:
        if coupJoueur2 == 0:
            victoire = True
            winnerr = "joueur"
        elif coupJoueur2 == 1:
            victoire = False
            winnerr = "nul"
        else:
            victoire = True
            winnerr = "joueur2"
    elif coupJoueur1 == 2:
        if coupJoueur2 == 0:
            victoire = True
            winnerr = "joueur2"
        elif coupJoueur2 == 1:
            victoire = True
            winnerr = "joueur"
        else:
            victoire = False
            winnerr = "nul"

    return [victoire, winnerr]


async def gameBeginIA(reader, writer, k, addrJoueur):
    """Cette fonction gere le deroulement d'une partie contre l'IA"""
    scoreJoueur = 0
    scoreIA = 0
    while k > 0:
        print(k)
        coupIA = random.randint(0, 2)
        print(f"Coup ia {coupIA}")
        msg = 300 + k
        msg = str(msg) + f" {scoreJoueur} - {scoreIA}"
        await send(writer, str(msg))
        coupJoueur = int((await rcv(reader, writer))[6])
        victoireTour = await victoireGame(coupJoueur, coupIA)
        if victoireTour[0]:
            if victoireTour[1] == "joueur":
                scoreJoueur = scoreJoueur + 1
                print(f"MANCHE VICTOIRE JOUEUR {scoreJoueur} - {scoreIA}")
            else:
                scoreIA = scoreIA + 1
                print(f"MANCHE VICTOIRE IA {scoreJoueur} - {scoreIA}")
        else:
            print(f"MANCHE NUL {scoreJoueur}-{scoreIA}")
        k = k - 1

    if scoreJoueur > scoreIA:
        winnerText = f" Le vainqueur de la partie est le joueur avec l'adresse {addrJoueur}"
    elif scoreIA > scoreJoueur:
        winnerText = f" Le vainqueur de la partie est l'IA"
    else:
        winnerText = " Il y a match nul, donc pas de vainqueur"

    msg = str(300) + winnerText + f" le score est de {scoreJoueur} - {scoreIA}, bien joue!!"
    await send(writer, msg)


async def gameBegin(readerJ1, writerJ1, readerJ2, writerJ2, nbCoups):
    """Fonction qui deroule une partie avec deux joueurs quelque soit le mode de jeu choisi"""
    scoreJ1 = 0
    scoreJ2 = 0
    while nbCoups > 0:
        msg = 300 + nbCoups
        msgJ1 = str(msg) + f" {scoreJ1} - {scoreJ2}"
        msgJ2 = str(msg) + f" {scoreJ2} - {scoreJ1}"
        send_tasks = []
        rcv_tasks = []

        send_tasks.append(asyncio.create_task(send(writerJ1, msgJ1)))
        send_tasks.append(asyncio.create_task(send(writerJ2, msgJ2)))
        rcv_tasks.append(asyncio.create_task(rcv(readerJ1, writerJ1)))
        rcv_tasks.append(asyncio.create_task(rcv(readerJ2, writerJ2)))

        aws = send_tasks + rcv_tasks
        await asyncio.gather(*aws)

        coupJ1 = int((rcv_tasks[0]).result()[6])
        coupJ2 = int((rcv_tasks[1]).result()[6])

        victoireTour = await victoireGame(coupJ1, coupJ2)
        if victoireTour[0]:
            if victoireTour[1] == "joueur":
                scoreJ1 = scoreJ1 + 1
                print(f"MANCHE VICTOIRE JOUEUR1 {scoreJ1} - {scoreJ2}")
            else:
                scoreJ2 = scoreJ2 + 1
                print(f"MANCHE VICTOIRE JOUEUR2 {scoreJ1} - {scoreJ2}")
        else:
            print(f"MANCHE NUL {scoreJ1}-{scoreJ2}")

        nbCoups = nbCoups - 1

    if scoreJ1 > scoreJ2:
        winnerText = f" Le vainqueur de la partie est le joueur avec l'adresse {writerJ1.get_extra_info('peername')[0]}"
        msg = str(300) + winnerText + f" le score est de {scoreJ1} - {scoreJ2} bien joue!!"
    elif scoreJ2 > scoreJ1:
        winnerText = f" Le vainqueur de la partie est le joueur avec l'adresse {writerJ2.get_extra_info('peername')[0]}"
        msg = str(300) + winnerText + f" le score est de {scoreJ2} - {scoreJ1} bien joue!!"
    else:
        winnerText = " Il y a match nul, donc pas de vainqueur"
        msg = str(300) + winnerText + f" le score est de {scoreJ1} - {scoreJ2}, bien joue!!"

    sendFinal_tasks = [asyncio.create_task(send(writerJ1, msg)), asyncio.create_task(send(writerJ2, msg))]
    await asyncio.gather(*sendFinal_tasks)


async def handle_request(reader, writer):
    """Fonction appelee a chaque connection d'un client au serveur"""
    addrJoueur = writer.get_extra_info('peername')[0]
    if [addrJoueur, reader, writer] not in users:
        users.append([addrJoueur, reader, writer])

    await send(writer, "200")

    # On sait qu'ici a chaque fois on doit d'abord choisir le mode de jeu, donc dans message
    # on aura du message du genre MODE: 0 ou MODE: 1 et ainsi de suite, donc on va juste recuperer
    # l'entier correspondant dans modeJeu

    modeJeu = await rcv(reader, writer)
    modeJeu = int(modeJeu[6])
    print(modeJeu)

    # On commence a gerer les differents modes du jeu a ce niveau
    # Mode de jeu 0
    if modeJeu == 0:
        await send(writer, "200")
        # Cette boucle while recupere le nombre du coups a jouer dans le bon format en gerant les erreurs
        # qui peuvent survenir
        while True:
            nbCoups = (await rcv(reader, writer))[10:]
            try:
                print("Nbcoups:" + nbCoups)
                nbCoups = int(nbCoups)
                if nbCoups == 0:
                    await send(writer, "400")
                else:
                    await send(writer, "200")
                    break
            except ValueError:
                await send(writer, "400")

        # Debut de la partie
        await gameBeginIA(reader, writer, nbCoups, addrJoueur)

    # Mode de jeu 1
    elif modeJeu == 1:
        await send(writer, "200")
        # On initialise quelque variable qui nous serons utiles. Tout d'abord les indices des joueur 1
        # et du joueur 2 ( indJ1, indJ2 ) correspondants a la table tableNoName et le boolean game_start
        # pour le debut de la partie ou pas
        indJ1, indJ2, game_start = 0, 0, False

        # Cette boucle while recupere le nombre du coups a jouer dans le bon format en gerant les erreurs
        # qui peuvent survenir
        while True:
            nbCoups = (await rcv(reader, writer))[10:]
            print(f"nbCoups {nbCoups}")
            try:
                print("Nbcoups:" + nbCoups)
                nbCoups = int(nbCoups)
                if nbCoups == 0:
                    await send(writer, "400")
                else:
                    await send(writer, "200")
                    break
            except ValueError:
                await send(writer, "400")

        # A chaque connexion au mode, on rajoute les info qu'il faut a la table, en gros le nombre de coups
        # a jouer le reader du joueur et son writer ( nbCoups, reader, writer)
        tableNoName.append([nbCoups, reader, writer])

        # On verifie si dans la table on a deja un joueur en attente d'adversaire avec le meme nombre de coups
        # que le joueur courant, et si oui on initialise nos differentes variables
        for i in range(len(tableNoName) - 1):
            if tableNoName[i][0] == nbCoups:
                game_start = True
                indJ1 = i
                indJ2 = len(tableNoName) - 1

        # Si toutes les conditions pour le debut d'une partie sont remplies, on demare la partie comme suit,
        # sinon on met en attente le joueur
        if game_start:
            readerJ1 = tableNoName[indJ1][1]
            writerJ1 = tableNoName[indJ1][2]
            readerJ2 = tableNoName[indJ2][1]
            writerJ2 = tableNoName[indJ2][2]
            msg = "201 Demarrage de la partie"
            sendTasksRequest = asyncio.create_task(send(writerJ2, msg))
            await asyncio.gather(sendTasksRequest)
            await gameBegin(readerJ1, writerJ1, readerJ2, writerJ2, nbCoups)
            tableNoName.pop(indJ1)
            tableNoName.pop(indJ2 - 1)
            # print(tableNoName)
        else:
            msg = "202 En l'attente d'un adversaire"
            await send(writer, msg)

    # Mode de jeu 2
    elif modeJeu == 2:
        await send(writer, "200 Quel est le nom de votre table ?")

        # Cette boucle while recupere le nom voulu pour la table en gerant les differents cas d'erreurs
        while True:
            tName = (await rcv(reader, writer))[7:]
            print(tName)
            if tName == "" or any(tName in sublist for sublist in tableName):
                await send(writer, "400")
            else:
                await send(writer, "200")
                break

        # Cette boucle while recupere le nombre du coups a jouer dans le bon format en gerant les erreurs
        # qui peuvent survenir
        while True:
            nbCoups = (await rcv(reader, writer))[10:]
            try:
                print("Nbcoups:" + nbCoups)
                nbCoups = int(nbCoups)
                if nbCoups == 0:
                    await send(writer, "400")
                else:
                    await send(writer, "202")
                    break
            except ValueError:
                await send(writer, "400")

        # Ensuite, on ajoute a la table les differentes informations qu'il faut
        tableName.append([tName, nbCoups, reader, writer])

    # Mode de jeu 3
    else:
        # On demande le nom de la table que le joueur veut rejoindre, si elle existe
        # et qu'elle est dans le bon format, on lance la partie dans notre else sinon,
        # on ferme la connexion en affichant un message d'erreur
        await send(writer, "200 Quel est le nom de la table que vous souhaitez rejoindre ?")
        tNameRejoindre = (await rcv(reader, writer))[7:]
        print(tNameRejoindre)
        if tNameRejoindre == "" or not (any(tNameRejoindre in sublist for sublist in tableName)):
            await send(writer, "500")
        else:
            await send(writer, "201")
            for i in range(len(tableName)):
                if tableName[i][0] == tNameRejoindre:
                    readerJ1, writerJ1 = tableName[i][2], tableName[i][3]
                    readerJ2, writerJ2 = reader, writer
                    nbCoups = tableName[i][1]
                    await gameBegin(readerJ1, writerJ1, readerJ2, writerJ2, nbCoups)
                    break


async def shif_server():
    """Fonction principale qui cree le serveur sur le port 999 et le lance pour toujours """

    # Start a socket server
    server = await asyncio.start_server(handle_request, '0.0.0.0', 999)
    print("Starting server")

    async with server:
        # Le server tourne pour toujours jusqu'a ce qu'on l'arrete !
        await server.serve_forever()


if __name__ == '__main__':
    if len(argv) > 1:
        print(f"usage: servershifumi.py")
        exit(1)

    users = []  # empty list of connected users
    tableNoName = []
    tableName = []
    asyncio.run(shif_server())
    tableNoName.clear()
    tableName.clear()
    users.clear()
