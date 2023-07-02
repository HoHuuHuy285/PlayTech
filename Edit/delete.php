<?php


include "../style/admin/connection.php";

$id = $_GET['id'];
$sql = "DELETE FROM `products` WHERE id=$id;";

//  DELETE
$result = mysqli_query($conn, $sql);

// Close
mysqli_close($conn);

header('location:../gestion.php');