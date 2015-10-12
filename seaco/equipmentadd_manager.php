<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="stylesheet" href="style/style.php" media="screen">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Added Equipment</title>
</head>

<body>
<?php
include 'connection.php';


if(isset($_POST['equipment_id']) && !empty($_POST['equipment_id'])){
$equipment_id = $_POST['equipment_id'];
}

if(isset($_POST['equipment_name']) && !empty($_POST['equipment_name'])){
$equipment_name = $_POST['equipment_name'];
}
if(empty($_POST['equipment_accuracy'])){
$query= "INSERT INTO EQUIPMENT (EQUIPMENT_ID,EQUIPMENT_NAME)
VALUES ('".$equipment_id."','".$equipment_name."')";
}else if(isset($_POST['equipment_accuracy']) ){
$equipment_accuracy = $_POST['equipment_accuracy'];
$query= "INSERT INTO EQUIPMENT (EQUIPMENT_ID,EQUIPMENT_NAME,EQUIPMENT_ACCURACY)
VALUES ('".$equipment_id."','".$equipment_name."',".$equipment_accuracy.")";
}


$conn = oci_connect($dbuname,$dbpwd,$db) or die("Couldn't connect to database.");

$statement = oci_parse($conn, $query);


if(oci_execute($statement)){
	echo "<center>You have successfully added ".$equipment_id.", ".$equipment_name."!</center>";
}
else{
	echo "<center>Equipment add unsuccessful!</center>";
}

oci_free_statement($statement);
oci_close($conn);
?>

<center><input type='button' value='Add Another Equipment' OnClick='window.location="equipment_add.php"'>
<input type='button' value='Return to Equipment View' OnClick='window.location="equipment_edit.php"'>
</center>
</body>
</html>
