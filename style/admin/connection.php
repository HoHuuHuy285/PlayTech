<?php
// connection a la base de données
$servername = "fdb1029.awardspace.net";
$username = "4324768_huy";
$database = "4324768_huy";
$password = "Huy14121412";

// create a connection

$conn = new mysqli($servername,
                    $username, 
                    $password, 
                    $database);

     
if(!$conn){
    echo'Ereure coté serveure !';
    die(); 
}
?>