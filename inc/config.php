<?php
$dsn = 'mysql:dbname=4324768_huy;host=fdb1029.awardspace.net';
$user = '4324768_huy';
$password = 'Huy14121412';
try
{
	$db = new PDO($dsn,$user,$password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	echo "PDO error".$e->getMessage();
	die();
}

define('PRODUCT_IMG_URL','assets/product-images/');

?>