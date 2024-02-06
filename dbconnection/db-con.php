<?php

$servername = 'localhost';
$username='root';
$password='';
$database='test_db';

$con_login = mysqli_connect($servername, $username, $password,$database);

if(!$con_login){
    echo "Error connecting to login database";
}

?>