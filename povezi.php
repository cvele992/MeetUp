<?php
		$veza = mysqli_connect('localhost', 'bejn', 'bejn23', 'bejn');
			if (!$veza){
    			die("Database Connection Failed" . mysqli_connect_error());
			}
?>