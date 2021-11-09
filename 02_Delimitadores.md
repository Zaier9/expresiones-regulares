# Delimitadores

\w - caracteres de palabras
\d - digitos
\s - espacios/invisibles en blanco
[0-9] ~ \d
[0-9a-zA-Z_] ~ \w
* greedy - todo
+ uno o mas
? cero o uno

# Delimitador (?)

El ? indica al patrón que encuentre las coincidencias de manera rápida (o greedy); es decir, devolviendo el resultado más pequeño que haga match hasta donde se encuentra el delimitador, y esto lo haga tantas veces como sea posible dentro de la cadena.

.+?, - Busca los matches minimos.

# Contadores

\d{2,4} - Matches de dos hasta 4 digitos
\d{4,} - Mas de 4 hasta el infinito

\w{10,10} - Buscando 10 digitos(Numero de telefono)
\d{2,2}[\-\.]? - Enontrar matches ya sea que esten separadas por guion o punto. Convengamos que hace match cada dos caracteres. Entonces, deberiamos repetir la expresion hasta completar 10 digitos o 5 matches.