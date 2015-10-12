<?php
session_start();
include 'connection.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
$row=-1;

if(isset($_POST["username"])){
	$username=$_POST["username"];
}
if(isset($_POST["password"])){
	$password=$_POST["password"];
}

$conn = oci_connect($dbuname,$dbpwd,$db) or die("Couldn't connect to database.");
$query= "SELECT * from LOGIN_AC where USERNAME='".$username."' and USERPASSWORD='".$password."'";
$statement = oci_parse($conn, $query);
oci_execute($statement);

$row = oci_fetch_array ($statement);
	
if (($row['USERNAME']==$username) && ($row['USERPASSWORD']==$password)){
	header("Location:equipment_edit.php"); 
	
}
else{
	echo "Username or Password does not exist. Contact your webdeveloper for further enquiries.";
	?>  
		  <input type="button" value="RETURN" 
            OnClick="window.location='login.php'">
	<?php
}
oci_free_statement($statement);
oci_close($conn);


?>
