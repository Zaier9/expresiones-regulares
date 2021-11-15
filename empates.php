<?php

$file = fopen("./results.csv", "r");

#Con esta expresion traemos los partidos y los agrupamos en Local, Visitante y ademas si existio un empate

$match = 0;
$$nomatch = 0;

while(!feof($file)) {
    $line = fgets($file);
    if(preg_match(
        '/^(\d{4}\-\d\d\-\d\d),(.+),(.+),(\d+),(\d+),.*$/i',
        $line,
        $m
    )
    ){
        if($m[4] == $m[5]){
            # %s %s [%d-%d]\n", $m[2], $m[3], $m[4], $m[5]
            echo "Empate: ";
        } elseif($m[4] > $m[5]){
            echo "Local:   ";
        }else{
            echo "Visitante: ";
        }
        printf("\t%s, %s [%d-%d]\n", $m[2], $m[3], $m[4], $m[5]);
        $match++;
    } else{
        $nomatch++;
    }
}

fclose($file);

printf("\n\nmatch: %d\nno match: %d\n", $match, $nomatch);