<?php
include("funtions.php");
	if(isset($_POST['submit'])){
		$ime = $_POST['ime'];
		$prezime = $_POST['prezime'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		if(!empty($ime) && !empty($prezime) && !empty($email) && !empty($password)){
		dodajKorisnik($ime,$prezime,$email,$password);
		echo "Uspešna registracija";

		} else{
			echo "Niste popunili sva polja";
		}
	}
?>