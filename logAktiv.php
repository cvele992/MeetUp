<?php session_start(); 

if((!isset ($_SESSION['username']) == true) and (!isset ($_SESSION['password']) == true)) { 

	unset($_SESSION['username']); 
	unset($_SESSION['password']); 
	header('location:index.php'); } 

else $korisnik = $_SESSION['username']; 

?>
