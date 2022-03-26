#!/usr/bin/env python3
# -*- coding: utf-8 -

import asyncio
import datetime
import time

async def affiche(msg, delai):
    await asyncio.sleep(delai)
    print(msg)

async def attente():
    await affiche('Hello', 5)
    await affiche('World', 2)

async def concurente():
    task1 = asyncio.create_task(affiche('hello', 5))
    task2 = asyncio.create_task(affiche('world', 2))
    await task1
    await task2



if __name__ == '__main__':
    msg = "shifumi.log--sdnad"
    logSend = f"{msg} >>> to asdf at {time.ctime()}  \r\n"
    print(time.ctime())
    print(logSend)


