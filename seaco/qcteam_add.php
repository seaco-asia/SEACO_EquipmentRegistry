<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="stylesheet" href="style/style.php" media="screen">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Adding Quality Check Team</title>
</head>

<body>
<h1 align="center">Add Quality Check Team</h1>

<table align="center">
	<form method="POST" action="qcteamadd_manager.php" name="add_qcteam_form" onsubmit=" return move_uploaded_file();">
		<tr> 
<td> Quality Check Team ID: </td><td><input type="text" name="qcteam_id" required/></td>
</tr>
        <tr> 
<td> Quality Check Team Name: </td><td><input type="text" name="qcteam_name" required/></td>
</tr>

<tr>

		<tr><td><input type="reset" value="Clear"></td>
		<<td><input type="submit" value="Add"></td>
		<td><input type='button' value='Back' OnClick='window.location="qcteam_edit.php"'></td>
		</tr>
  </form>
</table>


</body>

</html>
