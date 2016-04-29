<?php
session_start();
include("funtions.php");
	if(isset($_POST['submit'])){
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		if(!empty($email) && !empty($password)){
			if(proveriKorisnika($email,$password)){
				$_SESSION['email'] = $email;
				echo "Logovan si kao: ".$_SESSION['email'];
			}else{
				echo "Pogresan email ili password";
			}
		}else{
			echo "Niste uneli sve podatke";
		}
	}
?>