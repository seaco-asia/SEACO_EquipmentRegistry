<html>
<link rel="stylesheet" href="style/style.php" media="screen">
<head><title></title></head>
<body>


<center><h1>Quality Check Team</h1></center>


<center><input type='button' value='Add Quality Check Team' OnClick='window.location="qcteam_add.php"'></center>


<?php
  include("connection.php");
  $conn = oci_connect($dbuname, $dbpwd,$db) or die("DB connection unsuccessful!");

  $query="SELECT * FROM QCTEAM ORDER BY qcteam_id";
  $stmt = oci_parse($conn,$query);
  oci_execute($stmt);
?>
  <table border="1" align="center">
  <tr>
    <th>User ID</th>
    <th>User Name</th>
    <th colspan="2">Options</th>
  </tr>
<?php
  while ($row = oci_fetch_array ($stmt))
  {
?>
    <tr>
      <td><?php echo $row["QCTEAM_ID"];  ?></td>
      <td><?php echo $row["QCTEAM_NAME"];  ?></td>
       
       <td>
        <a href="qcteam_modify.php?qcteam_id=
          <?php echo $row["QCTEAM_ID"];  ?>
          &Action=Update">MODIFY</a>
      
 
      <a href="qcteam_modify.php?qcteam_id=
        <?php echo $row["QCTEAM_ID"];  ?>
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
