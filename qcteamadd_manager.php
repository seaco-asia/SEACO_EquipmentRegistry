<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="stylesheet" href="style/style.php" media="screen">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title></title>
</head>

<body>
<?php
include("connection.php");
$conn = oci_connect($dbuname, $dbpwd,$db) or die("DB connection unsuccessful!");
$qcteam_id = "";
$qcteam_name = "";

if(isset($_POST['qcteam_id']) && !empty($_POST['qcteam_id'])){
$qcteam_id = $_POST['qcteam_id'];
}

if(isset($_POST['qcteam_name']) && !empty($_POST['qcteam_name'])){
$qcteam_name = $_POST['qcteam_name'];
}


$query= "INSERT INTO QCTEAM (QCTEAM_ID,QCTEAM_NAME)
VALUES (".$qcteam_id.",'".$qcteam_name."')";

$statement = oci_parse($conn, $query);


if(oci_execute($statement)){
	echo "<center>You have successfully added ".$qcteam_id.", ".$qcteam_name."!</center>";
}
else{
	echo "<center>Quality Check Team add unsuccessful!</center>";
}

oci_free_statement($statement);
oci_close($conn);
?>

<center>
<input type='button' value='Add New User' OnClick='window.location="qcteam_add.php"'>
<input type='button' value='Return to Quality Check Team View' OnClick='window.location="qcteam_edit.php"'>
</center>

</body>
</html>
