# ArteLatina

Repositorio/galería de arte hecho por mujeres latinoamericanas. Proyecto de Desarrollo Web

## Requerimientos

Para el programa se requiere un servidor con php y mysql, con algunas características especiales.

Debe haber un usuario en el servidor de mysql con los datos:

- Host:localhost
- Username: dbconnection
- Password: 123Acatlan

Si la conexión requiere un puerto en específico, indicarlo en el host así como en el archivo "includes/dbh-inc.php" en la variable "$host".

Se debe correr el script "db-creation.sql" antes de comenzar, y la conexión se debe de hacer desde "localhost", no de la IP local.

### Actividades pendientes

La creación de un sistema de registro de favoritos y/o de compra. Las tablas están creadas para emularlo, pero no tienen contenido.
