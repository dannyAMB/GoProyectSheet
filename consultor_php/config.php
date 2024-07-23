<?php


$conn = mysqli_connect("127.0.0.1","root","","db_prueba");


if ($conn->connect_error) {

    die("Error de conexión". $conn->connect_error);

} 


?>