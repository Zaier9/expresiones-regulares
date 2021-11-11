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

# Logs

Las expresiones regulares son muy útiles para encontrar líneas específicas que nos dicen algo muy puntual dentro de los archivos de logs que pueden llegar a tener millones de líneas.

^\[LOG.*\[ERROR\].*$ - Con ésta expresión encontramos todos los LOG que tengan ERROR.

^\[LOG.*\[ERROR\].*user:@zaier\] .*$ - Buscar lineas específicas con el usuario.

^\[LOG.*\[ERROR\].*user:@\w+?\] .*$ - Buscar cualquier usuario con correo.

# Busqueda de Telefonos

^\+?\d+[#pe]?\d*$ - Quiero una linea que empiece con un signo(+) o ninguno, seguido por uno o más números y ésto seguido por cualquier objeto que esté dentro de la clase [] exista o no, a continuación puede o no haber dígitos.

# URL's

Una de las cosas que más vamos a usar en la vida, seamos frontend o backend, serán directamente dominios o direcciones de internet; ya sea direcciones completas de archivo (una url) o puntualmente dominios para ver si es correcto un mail o no.

https?:\/\/[\w\-\.]+\.\w{2,5}\/?\S* - Pedimos http y si existe que sea de forma segura también, los dos puntos no son reservados y lo ponemos sin escapar, en cambio al slash si hay que escaparlo. Luego creamos una clase en la cual puede haber letras, guiones y puntos. Después del punto puede haber de dos hasta cinco lentras del final del dominio (.com, .ar, .hola), escapamos nuevamente el slash si corresponde y eliminamos espacios vacios si los hay.