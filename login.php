
<html>
<head>
<title>MeetUP</title>
</head>
<body>
<h1 align="center" > MeetUP </h1>
<hr>
<?php
session_start();
require('povezi.php');
	$greska=0;

	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password']);
	
	$username = mb_convert_case($username, MB_CASE_TITLE, "UTF-8");
	
	$query = "select * from korisnici where username='$username' and password='$password'";
	$result = mysqli_query($veza, $query);
	
	$count=mysqli_num_rows($result);

	if($count==1){
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		header('location:homepage.php'); //salje na homepage.php
		
	}
	else{
		header("refresh:3; url=index.php"); //posle 3s te vraca na idnex.php
		?>
		
		<label class="labela">Neuspesna prijava na sajt. Proverite svoje korisnicko ime i lozinku</label>
		</br>
		<?php 
		$greska=1;
	}
	?>
</body>
</html>