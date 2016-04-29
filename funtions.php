<?php
include("configuration.php");

function getImeAndPrezimeForUsername($email){
global $conn;
$sql = "SELECT ime,prezime FROM korisnik WHERE email=?";
$query = $conn->prepare($sql);
$query->bind_param('s',$email);
$query->execute();
$query->store_result();
$query->bind_result($ime, $prezime);
$returnvalue = "";
while ($query->fetch()) {
$returnvalue = $ime." ".$prezime;
 }
 $query->free_result();
 $query->close();
 return $returnvalue;
}


function dodajKorisnik($ime, $prezime, $email, $password)
{
global $conn;
$insert = "INSERT INTO korisnik (ime,prezime,password,email) VALUES (?,?,?,?)";
$query = $conn->prepare($insert);
$query->bind_param('ssss',$ime,$prezime, md5($password),$email); //md5
$query->execute();
$query->close();
}


function proveriKorisnika($email, $password){
global $conn;
//$encrypt = md5($password);
//echo "".$encrypt;
$sql = "SELECT * FROM korisnik WHERE email='$email' AND password='$password'";  //$encrypt'
$quer = $conn->query($sql);

if ($quer->num_rows > 0) {
   return 1;
} else{
return 0;
}
$quer->close();
}

?>
