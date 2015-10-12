<html>
<link rel="stylesheet" href="style/style.php" media="screen">
<head><title></title></head>
<body>


<center><h1>Equipment</h1></center>
<a href="Report.php">Get PDF version</a>


<center><input type='button' value='Log out' OnClick='window.location="logout.php"'></center>
<center><input type='button' value='Add Equipment' OnClick='window.location="equipment_add.php"'></center>


<?php
session_start();
  include("connection.php");
  $conn = oci_connect($dbuname, $dbpwd,$db) or die("DB connection unsuccessful!");

  $query="SELECT * FROM EQUIPMENT ORDER BY equipment_id";
  $stmt = oci_parse($conn,$query);
  oci_execute($stmt);
?>
  <table border="1" align="center">
  <tr>
    <th>Equipment ID</th>
    <th>Equipment Name</th>
    <th>Accuracy Reading</th>
    <th colspan="2">Options</th>
  </tr>
<?php
  while ($row = oci_fetch_array ($stmt))
  {
?>
    <tr>
      <td><?php echo $row["EQUIPMENT_ID"];  ?></td>
      <td><?php echo $row["EQUIPMENT_NAME"];  ?></td>
       <td><?php echo $row["EQUIPMENT_ACCURACY"];  ?></td>
       <td>
        <a href="equipment_modify.php?equipment_id=
          <?php echo $row["EQUIPMENT_ID"];  ?>
          &Action=Update">MODIFY</a>
      
 
      <a href="equipment_modify.php?equipment_id=
        <?php echo $row["EQUIPMENT_ID"];  ?>
        &Action=Delete">Delete</a>
      </td>
    </tr>
<?php
  }
?>
  </table>
<?php
  oci_free_statement($stmt);
  oci_close($conn);
?>


</body>
</html>
