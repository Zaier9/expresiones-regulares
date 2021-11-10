# Delimitadores

\w - caracteres de palabras
\d - dígitos
\s - espacios/invisibles en blanco
[0-9] ~ \d
[0-9a-zA-Z_] ~ \w
* greedy - todo
+ uno o más
? cero o uno

# Delimitador (?)

El ? indica al patrón que encuentre las coincidencias de manera rápida (o greedy); es decir, devolviendo el resultado más pequeño que haga match hasta donde se encuentra el delimitador, y esto lo haga tantas veces como sea posible dentro de la cadena.

.+?, - Busca los matches mínimos.

# Contadores

\d{2,4} - Matches de dos hasta 4 dígitos
\d{4,} - Desde 4 hasta el infinito

\w{10,10} - Buscando 10 dígitos(Numero de telefono)
\d{2,2}[\-\.]? - Enontrar matches ya sea que esten separadas por guión o punto. Convengamos que hace match cada dos caracteres. Entonces, deberíamos repetir la expresión hasta completar 10 dígitos o 5 matches.

# Not(^), uso y peligros

Este caracter nos permite negar una clase o construir “anticlases”, vamos a llamarlo así, que es: toda la serie de caracteres que no queremos que entren en nuestro resultado de búsqueda.

Para esto definimos una clase, por ejemplo: [ 0-9 ], y la negamos [ ^0-9 ] para buscar todos los caracteres que coincidan con cualquier caracter que no sea 0,1,2,3,4,5,6,7,8 ó 9

[^0-5a-c] - Con esta expresión, solicitamos todo lo que está fuera de éste rango.

# Principio(^) y final de linea($)

Estos dos caracteres indican en qué posición de la línea debe hacerse la búsqueda:
el ^ se utiliza para indicar el principio de línea
el $ se utiliza para indicar final de línea

^ ------------- $