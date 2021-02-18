# ReadME Agenda Symfony Pablo Jose Lopez Rivadulla

## Descripción General Agenda Symfony 

Esta agenda es una aplicación web para trabajar con contactos en la que podremos: Crear contactos, editar los contactos y borrarlos. A su vez también podremos clasificarlos en 2 tipos de contactos: **Personales** y **Profesionales** 


A su vez también tendremos una tabla *Global* que tendrá todos los contactos de la agenda.

## Guía de utilización:


Para poder utilizar la página deberemos entrar en la siguiente url: 

``` 
http://localhost:8000/contacto
``` 

La página cuenta con un Navbar que contará con dos botones que harán lo siguiente:

| Boton | Description |
| ------ | ----------- |
| Agregar   | Nos lleva al formulario que agrega contactos a la agenda. |
| Volver | Es el botón que vuelve a la página principal de la aplicación. |

Para ver una agenda en concreto deberemos clickar en ella y nos mostrará los contactos correspondientes a cada agenda. Una vez entremos en una agenda tendremos dos botones: Ver y Borrar.

Si pulsamos borrar, eliminaremos el contacto en la agenda de forma permanente. Si le damos a Ver nos enseñara el contacto específico y nos dará la opción de poder editarlo.



## Requisitos y Guía de Instalación:

Para poder utilizar esta aplicación deberemos instalar los siguientes programas: Symfony, Composer y Doctrine y Xampp. 

Para descargar los programas iremos a los siguientes enlaces:

**Xampp:** 
```
https://www.apachefriends.org/es/download.html
```
**Symfony**
```
https://symfony.com/download
```    
**Composer**
```
https://getcomposer.org/download/   
```

Para descargar el Doctrine deberemos utilizar la consola en la carpeta que guardaremos nuestro proyecto. Una vez abierta la consola utilizaremos los siguientes comandos:

```
composer require symfony/orm-pack
 
composer require --dev symfony/maker-bundle
```

## Autor y licencia:

El autor de esta agenda es Pablo José López Rivadulla y la licencia de este proyecto es **Creative Commons Zero** por lo que puedes utilizar este programa para lo que quieras.

## Como contribuir:

Con este proyecto no busco ningún tipo de contribución económica , pero si que se agradece feedback o mejoras en todos mis proyectos. Os dejo mi enlace de Github:

```
https://github.com/Rivarsal
```
