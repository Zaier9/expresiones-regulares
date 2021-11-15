#!/usr/bin/perl

use strict;
use warnings;

my $t = time;


open(my $f, "<./results.csv") or die ("No hay archivo");

#Con la siguiente expresion, traemos todas las victorias de todos los visitantes por cada año

my $match = 0;
my $nomatch = 0;

while(<$f>) {
    chomp;
    if(m/^([\d]{4,4})\-.*?,(.*?),(.*?),(\d+),(\d+),.*$/){
        if($5 > $4){
            printf("%s: %s(%d) - (%d) %s\n",
                $1, $2, $4, $5, $3
            );
        }
        $match++;
    } else {
        $nomatch++;
    }
}

close($f);

printf("Se encontraron: \n - %d matches\n - %d no matches \n - tardo %d segundos\n", $match, $nomatch, time() - $t);