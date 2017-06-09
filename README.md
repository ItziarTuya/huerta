# Orchard App

Aplicacion de tienda online para consumidores y productores de agricultura local. Aplicacion realizada con PHP+Laravel

## Setup

Para la configuracion del servidor, se recomienda [Laravel Homestead](https://laravel.com/docs/5.4/homestead)

Una vez instalada, descargar este repositorio en una carpeta

Configurar dicha carpeta en Homestead.yaml. ejemplo:

````
folders:
    - map: ~/Code
      to: /home/vagrant/Code
````

Luego se debe configurar un dominio en su archivo hosts. ejemplo:

````
192.168.10.10   huerta.app
````

y finalmente crear un site en Homestead.yaml. ejemplo:

````
sites:
    - map: huerta.app
      to: /home/vagrant/Code/huerta/public
````

Una vez configurado

**$ vagrant up**

**$ vagrant ssh**

Dentro de vagrant, ir a la ruta (siguiendo el ejemplo) a Code/huerta, y ejecutar

**$ composer install**

Crear una base de datos mysql llamada huerta.

Una vez creada, la configurarmos en el archivo .env . ejemplo:

````
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=huerta
DB_USERNAME=homestead
DB_PASSWORD=secret
````

En la ruta citada anteriormente, ejecutar:

**$ php artisan migrate**

este comando creara el schema de la base de datos.

Por último, ejectuar:

**$ npm run prod**

este comando compila los recursos para el frontal (CSS, JS) minificados.

La aplicacion está desplegada en un servidor AWS con Elastic Beanstalk

http://huerta-env.r7qjn3cps6.us-west-2.elasticbeanstalk.com/
