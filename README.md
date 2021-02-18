
# pruebalaravel
El proyecto consiste en una app que genere eventos y que se pueda ingresar los tiquetes del mismo.

Esta parte del proyecto backend se realizo en laravel con mySQL para un servidor local.

Descripción detallada del desarrollo:

- Teniendo en cuenta lo parámetros que se requieren para el desarrollo del Front, se ideo una pequeña base de datos relacional como principal tabla "boletas" para poder crear los eventos y relacionarlas con los clientes y por medio de otra tabla que es la encargada de llenar las boletas compradas.
- Se realiza las estructura de la migración de tablas, después de tener ya todas las configuraciones hechas para que el Framework trabaje con una base de datos que se creo. Los campos de las tablas van de acuerdo a el diseño del Front. Los modelos se crean junto a la migración de acuerdo a los modelos de diseño.
- Se realiza las rutas y el controlador con las funciones necesarias para recibir las peticiones APIs del Front. Dentro de los métodos del controlador se realiza el llamado de los modelos para poder mandarlo a el Front por medio de un JSON teniendo en cuenta las peticiones.
