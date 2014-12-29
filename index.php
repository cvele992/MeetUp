<?php
require('povezi.php');
?>
<html>
<head>
<title>MeetUP</title>
</head>
<body>
<h1 align="center" > MeetUP </h1>
<hr>
<p> Ulogujte se i nadjite se sa prijateljima! </p>
	<form method="POST" action="login.php">
			<table>
				<tr>
					<td>Username:</td>
					<td><input type="text" name="username" /></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="password" name="password" /></td>
				</tr>
				<tr>
					<td><input type="submit" value="Login" /></td>
				</tr>
			</table>
	</form>
<p> Niste registrovani? Registracija traje samo dva minuta! </p>
	<a href="registracija.php"><button>  Register </button></a>
</body>
</html>