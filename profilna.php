<!DOCTYPE html>
<?php
require('povezi.php');
?>
<html>
<body>
<img SRC="uploads/mcvetanovic13.jpg" width="320px" height="260px">
<a href="homepage.php" align="right"><button value="Home">Home</button></a>
<a href="Logout.php" align="right"><button value="Logout">Logout</button></a>

<br>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
	<br>
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>