<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'productos');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

//Checar la conexion a la bd
if (mysqli_connect_errno())
{
 echo "Fallo al conectar la base de datos " . mysqli_connect_error();
}
?>