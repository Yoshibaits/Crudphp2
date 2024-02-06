<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "information";

$con_student = mysqli_connect($servername, $username, $password, $database);

if(!$con_student){
    echo "Error connecting to Student database";
}

?>