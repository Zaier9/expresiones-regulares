<?php

$file = fopen("./results.csv", "r");

#Con esta expresion traemos los partidos jugados en enero del 2018

$match = 0;
$$nomatch = 0;

while(!feof($file)) {
    $line = fgets($file);
    if(preg_match(
        '/^2018\-01\-(\d\d),.*$/',
        $line,
        $m
    )
    ){
        print_r($m);
        $match++;
    } else{
        $nomatch++;
    }
}

fclose($file);

printf("\n\nmatch: %d\nno match: %d\n", $match, $nomatch);