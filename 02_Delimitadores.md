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

    "+541155446688"

^\+?\d+[#pe]?\d*$ - Quiero una linea que empiece con un signo(+) o ninguno, seguido por uno o más números y ésto seguido por cualquier objeto que esté dentro de la clase [] exista o no, a continuación puede o no haber dígitos.

# URL's

Una de las cosas que más vamos a usar en la vida, seamos frontend o backend, serán directamente dominios o direcciones de internet; ya sea direcciones completas de archivo (una url) o puntualmente dominios para ver si es correcto un mail o no.

    "https://platzi.com"

https?:\/\/[\w\-\.]+\.\w{2,5}\/?\S* - Pedimos http y si existe que sea de forma segura también, los dos puntos no son reservados y lo ponemos sin escapar, en cambio al slash si hay que escaparlo. Luego creamos una clase en la cual puede haber letras, guiones y puntos. Después del punto puede haber de dos hasta cinco lentras del final del dominio (.com, .ar, .hola), escapamos nuevamente el slash si corresponde y eliminamos espacios vacios si los hay.

# Mails

Quedamos en que ya podemos definir URLs, y dentro de las URLs están los dominios. No es infalible, pero es muy útil para detectar la gran mayoría de errores que cometen los usuarios al escribir sus emails.

    "mi-nombre-182@gmail.com"

@[\w\.\-]{3,}\.\w{2,5} - Con ésta parte ya tenemos el dominio completo posterior al @, ahora vamos a enfocarnos el el nombre del posible usuario.

[\w\._]{5,30}\+?[\w]{0,10}@ - Construimos una clase que contenga una palabra o dígito de ASCII de entre 5 a 30 caracteres que puede o no tener el símbolo (+), y agregamos otra clase que puede contener algún alias.

# Localizaciones

Esta clase nos va a servir para ver unos tips comunes de qué hacer y sobre todo qué no hacer con expresiones regulares, usando como ejemplo datos de posicionamiento en el mapa: latitud y longitud.

    -99.205646,19.429707,2275.10
    -99.205581, 19.429652,2275.10
    -99.204654,19.428952,2275.58

^\-?\d{1,3}\.\d{1,6},\s?\-?\d{1,3}\.\d{1,6},.*$

-------------------------------------------------------

    -99 12' 34.08"W, 19 34' 56.98"N
    -34 54' 32.00"E, -3 21' 67.00"S

-?\d{1,3}\s\d{1,2}' \d{1,2}\.\d{2,2}"[WE],\s?\-?\d{1,3}\s\d{1,2}' \d{1,2}\.\d{2,2}"[NS]

# Busqueda y reemplazo

Al igual que una navaja suiza, las expresiones regulares son una herramienta increíblemente útil pero tienes que darle la importancia y las responsabilidades adecuadas a cada una, ya que no son la panacea, no solucionan todos los problemas.

El uso más conveniente de las expresiones regulares es buscar coincidencias o matches de cadenas en un texto, y si es necesario, reemplazarlas con un texto diferente.

# Uso de REGEX para descomponer querys GET

Al hacer consultas a sitios web mediante el método GET se envían todas las variables al servidor a través de la misma URL.

La parte de esta url que viene luego del signo de interrogación ? se le llama query del request que es: variable1=valor1&variable2=valor2&... y así tantas veces como se necesite. En esta clase veremos como extraer estas variables usando expresiones regulares.

https://b3co.com/?s=fotografia&mode=search&module=blog
https://www.google.com/search?q=regex+platzi&oq=regex+platzi&aqs=chrome..69i57j69i60.6885j0j9&sourceid=chrome&ie=UTF-8
https://co.search.yahoo.com/search?p=flickr&fr=yfp-t&fp=1&toggle=1&cop=mss&ie=UTF-8

[\?&]\w+=([^&\n]+)
\ $1 => 

https://b3co.com/
  fotografia =>  
  search =>  
  blog =>  
https://www.google.com/search
  regex+platzi =>  
  regex+platzi =>  
  chrome..69i57j69i60.6885j0j9 =>  
  chrome =>  
  UTF-8 =>  
https://co.search.yahoo.com/search
  flickr =>  
  yfp-t =>  
  1 =>  
  1 =>  
  mss =>  
  UTF-8 =>  

# Explicación del Proyecto

Vamos a utilizar un archivo de resultados de partidos de fútbol histórico con varios datos. El archivo es un csv de más de 39000 líneas diferentes.

Con cada lenguaje intentaremos hacer una solución un poquito diferente para aprovecharlo y saber cómo utilizar expresiones regulares en cada uno de los lenguajes.

Usaremos las expresiones regulares en:

    * Perl
    * PHP
    * Python
    * Javascript

# `grep` y `find` desde consola

En los sistemas operativos basados en UNIX podemos utilizar expresiones regulares a través de la consola mediante los comandos grep y find.

  * grep: Nos ayuda a buscar dentro de los archivos, textos muy puntuales utilizando una versión muy reducida de expresiones regulares.

  * find: Se utiliza para encontrar archivos en un determinado directorio a partir de diversas reglas de búsqueda que incluyen expresiones regulares.