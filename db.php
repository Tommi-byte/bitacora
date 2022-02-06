<?php 

session_start();


$conn = mysqli_connect(

    'localhost',
    'root',
    '',
    'bitacora'


);

/*Nos permite ver si la app tiene conexion con la dba
if(isset($conn)){
    echo 'DB esta conectada';
}

*/



?>