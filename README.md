# Ejercicio Laravel

Este es un proyecto construido con Laravel como ejercicio.

## Instalación

Para instalar y configurar el proyecto en tu entorno local, sigue estos pasos:

1. Clona este repositorio en tu máquina local.
2. Instala las dependencias del proyecto ejecutando `composer install`.
3. Copiar el archivo `.env.example` y renómbralo como `.env`.
4. Genera una nueva clave de aplicación ejecutando `php artisan key:generate`.
5. Configura las variables de entorno en el archivo `.env` según tu configuración local.
6. Ejecuta las migraciones para crear las tablas de la base de datos con el comando `php artisan migrate`.
7. Llena la base de datos con datos de ejemplo ejecutando los seeders con el comando `php artisan db:seed`.

## Para obtener los datos de la API ejecutar el servidor

```bash
php artisan serve
```

Y luego desde el navegador correr:

http://127.0.0.1:8000/api/fetch-entities

## Ejecución de Pruebas

El proyecto incluye un conjunto de pruebas unitarias.

```bash
php artisan test
```

## Descripción de Pruebas

### ApiServiceTest

Sirve para obtener los datos de una API externa

### ApiTest

Verifica los datos en la base de datos de las entidades

### CategoryTest

Verifica que existan las categorías iniciales

### EntityTest

Verifica los campos requeridos y tipos de campos de Entity