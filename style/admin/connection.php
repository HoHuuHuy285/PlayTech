<?php
// connection a la base de données
$servername = "localhost";
$username = "root";
$database = "tshirt_cart";
$password = "";

// create a connection

$conn = new mysqli($servername,
                    $username, 
                    $password, 
                    $database);

     
if(!$conn){
    echo'Không kết nối được database !';
    die(); 
}
?>