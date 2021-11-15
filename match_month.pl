#!/usr/bin/perl

use strict;
use warnings;

my $t = time;


open(my $f, "<./results.csv") or die ("No hay archivo");

#Con esta expresion, buscamos todos lo partidos jugados en el mes de Febrero.

my $match = 0;
my $nomatch = 0;

while(<$f>) {
    chomp;
    if(m/^[\d]{4,4}\-02\-.*$/){
        print $_."\n";
        $match++;
    } else {
        $nomatch++;
    }
}

close($f);

printf("Se encontraron %d matches\n", $match);