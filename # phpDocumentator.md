# phpDocumentator
## ¿Qué es phpDocumentator?
phpDocumentator es una herramienta para la generación automática de documentación a partir del código fuente para aplicaciones de código php.

## ¿Cómo instalar phpDocumentator?
### Requisitos previos
Para poder hacer uso de phpDocumentator previamente tenemos que tener instalado:
* php 7.4.0 o superior
* Extensión php7.4-mbstring
* Extensión php7.4-xml
  
### Descarga
Para generar la documentación se necesita el fichero phpDocumentator.phar que se puede obtener en el siguiente link:

https://docs.phpdoc.org/3.0/guide/getting-started/installing.html


Además para poder desplegar la aplicación debemos tener en nuestro sistema el servidor apache. Puedes seguir la instalación en el siguiente enlace:

https://www.digitalocean.com/community/tutorials/how-to-install-the-apache-web-server-on-ubuntu-20-04-es

Para una rápida visualización de la aplicación podemos situar el proyecto en la ruta por defecto de apache /var/www/html.


## ¿Cómo funciona phpDocumentator?
La documentación se divide en bloques, se sitúan antes del elemento a documentar haciendo uso del siguiente patrón. 

Se inicia el bloque con /** y cada una de las líneas va precedidad de un *, las líneas que no comienzan de esta manera serán ignoradas. Finalmente cerramos el bloque con */ . 

phpDocumentator tiene definidas unas etiquetas que proporcionan información adicional y son interpretadas de manera especial haciendo uso del símbolo @. Puedes conocer estas etiquetas en su correspondiente apartado en la docunentación:

https://docs.phpdoc.org/3.0/guide/references/phpdoc/tags/index.html

## ¿Cómo generar la documentación? 
Una vez comentado el código, situaremos el fichero descargado phpDocumentator.phar en la carpeta de nuestro proyecto y desde la terminal ejecutaremos el siguiente comando:

php phpDocumentor.phar -d [directorio_proyecto] -t [directorio_documentacion]

phpDocumentator crea una nueva carpeta con la documentación. 

## Documentación
Puedes obtener información más detallada en la documentación oficial: https://docs.phpdoc.org/3.0/














