#!/usr/bin/python

import re

#Con esta expresion traemos el año de cada partido 

pattern = re.compile(r'^([\d]{4,4})\-.*$')

f = open("./results.csv", "r")

for line in f:
    res = re.match(pattern, line)
    if res:
        print("%s\n" % res.group(1))

f.close()

#Con esta expresion traemos todos los partidos amistosos.

pattern = re.compile(r'^([\d]{4,4})\-\d\d\-\d\d,(.*),Friendly,.*$')

f = open("./results.csv", "r")

for line in f:
    res = re.match(pattern, line)
    if res:
        print("%s\n" % res.group(2))

f.close()