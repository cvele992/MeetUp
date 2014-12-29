<meta http-equiv="content-type" content="text/html; charset=utf-8" />


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<?php
	
	require('povezi.php');
	$greska=0;
	$ime=htmlspecialchars($_POST['ime']);
	$prezime=htmlspecialchars($_POST['prezime']);
	$username=htmlspecialchars($_POST['username']);
	$password=htmlspecialchars($_POST['password']);
	$email=htmlspecialchars($_POST['email']);
	$datum=$_POST['datum'];

	//za formatiranje unosa
	
	$ime = mb_convert_case($ime, MB_CASE_TITLE, "UTF-8");
	$prezime = mb_convert_case($prezime, MB_CASE_TITLE, "UTF-8");
	$username = mb_convert_case($username, MB_CASE_TITLE, "UTF-8");
	$email = strtolower($email);

	// jedinsvenost username-a
	
	$query_username="select * from korisnici where username='$username'";
	$result_username=mysqli_query($veza , $query_username);
	$count_username=mysqli_num_rows($result_username);

	// jedinstvenost email-a
	
	$query_email="select * from korisnici where email='$email'";
	$result_email=mysqli_query($veza , $query_email);
	$count_email=mysqli_num_rows($result_email);
	
	//validacija forme
	if (!preg_match("/^[a-zA-ZccždšCCŽŠÐ]*$/",$ime))
	{

		?>
		
		<label class="labela"> <?php echo "Nekorektan unos imena. Ime moze sadrzati samo slova."; ?> </label>

		<?php 
		$greska=1;
		//die("Neuspešna registracija, \n nekorektan unos, ime moze sadrzati samo slova.");

	}

	if(!preg_match("/^[a-zA-ZccždšCCŽŠÐ]*$/",$prezime)){

		?>
		
		<label class="labela"> <?php echo "Nekorektan unos prezimena, Prezime moze sadrzati samo slova."; ?> </label>
		</br>
		<?php
		$greska=1;
		//die("Neuspešna registracija, \n nekorektan unos, prezime moze sadrzati samo slova.");
	}

	if(!preg_match("/^[a-zA-ZccždšCCŽŠÐ0-9._-]*$/",$username)){
		?>
		
		<label class="labela"> <?php echo "Nekorektan unos korisnickog imena. Izbacite specijalne karaktere."; ?> </label>
		</br>
		<?php
		$greska=1;
		//die("Neuspešna registracija, \n nekorektan unos korisnickog imena, \n izbacite specijalne karaktere.");
	}
	if(!preg_match("/^[a-zA-ZccždšCCŽŠÐ0-9._-]*$/",$password)){
		?>
		
		<label class="labela"> <?php echo "Nekorektan unos lozinke. Izbacite specijalne karaktere."; ?> </label>
		</br>
		<?php
		$greska=1;
		//die("Neuspešna registracija, \n nekorektan unos korisnickog lozinke, \n izbacite specijalne karaktere.");
	}
	

	if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)){
		
		?>
		<label class="labela"> <?php echo "Nekorektan unos e-mail adrese."; ?> </label>
		</br>
		<?php
		$greska=1;
		//die("Neuspešna registracija, \n nekorektan unos e-mail adrese.");
	}
		if($count_username==1){
			?>
		
		<label class="labela"> <?php echo "Neuspesna registracija, korisnicko ime je vec u upotrebi"; ?> </label>
		</br>
		<?php
		$greska=1;
		}


	if($count_email==1){
			?>
		
		<label class="labela"> <?php echo "Neuspesna registracija, e-mail adresa je vec u upotrebi."; ?> </label>
		</br>
		<?php
		$greska=1;
		}

	
	$query = "insert into korisnici (username, password, email,  dob, name, lastname) values ('$username', '$password', '$email', '$datum', '$ime', 
											'$prezime')";
        $result = mysqli_query($veza, $query);
        ?>
		
		<label class="labela"> <?php echo "Uspešna ste se registrovali. Bicete preusmereni na stranicu za logovanje."; ?> </label>
		</br>
		<?php
		header("refresh:3; url=index.php");
		 ?>