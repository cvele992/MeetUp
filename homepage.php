<?php require ('logAktiv.php');
	
	//provera da li na svakoj stranici funkcionisu sesije, sklonicemo kad iztestiramo
	echo "Ulogovan kao: ".$korisnik;

?>
uspesno logovanje
<html>
	<body>
		<a href="profilna.php" align="right"><button value="Profile">Profile</button></a>
		<a href="Logout.php" align="right"><button value="Logout">Logout</button></a>
	</body>
</html>
