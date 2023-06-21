<?php
session_start();
include "../style/admin/connection.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {
	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);
	// die();
	if (empty($uname)) {
		header("Location: index.php?error=User Name is required");
		exit();
	} else if (empty($pass)) {
		header("Location: index.php?error=Password is required");
		exit();
	} else {
		$sql = "SELECT * FROM `users` WHERE mail='$uname' AND password='$pass'";
		// echo $sql;
		// die();
		$result = $conn->query($sql);
		// echo $result;
		// die();
		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
			if ($row['mail'] === $uname && $row['password'] === $pass) {
				$_SESSION['mail'] = $row['mail'];
				$_SESSION['name'] = $row['first_name'];
				$_SESSION['id'] = $row['id_user'];
				$_SESSION['admin'] = $row['is_admin'];
				header("Location: ../index.php");
				exit();
			} else {
				header("Location: index.php?error=Incorect User name or password");
				exit();
			}
		} else {
			header("Location: index.php?error=Incorect User name or password");
			exit();
		}
	}
} else {
	header("Location: index.php");
	exit();
}
