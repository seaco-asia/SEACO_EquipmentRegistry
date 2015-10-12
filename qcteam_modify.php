
<?php
    ob_start();
 ?>
<html>
<link rel="stylesheet" href="style/style.php" media="screen">
<head><title>Quality Check Team Modify</title></head>
<body>
<script language="javascript">
function confirm_delete()
{
   window.location='qcteam_modify.php?qcteam_id=
     <?php echo $_GET["qcteam_id"]; ?>&Action=ConfirmDelete';
}
</script>
<center><h1>Quality Check Team Modification</h1></center>
<?php
  include("connection.php");
  $conn = oci_connect($dbuname, $dbpwd,$db) or die("DB connection unsuccessful!");

  $query="SELECT * FROM QCTEAM 
    WHERE QCTEAM_ID =".$_GET["qcteam_id"];
	
  $stmt = oci_parse($conn,$query);
  oci_execute($stmt);
  $row = oci_fetch_array ($stmt);

  $strAction = $_GET["Action"];

  switch($strAction)
  {
    case "Update":
 ?>
      <form method="post" action="qcteam_modify.php?
        qcteam_id=<?php echo $_GET["qcteam_id"]; ?>
        &Action=ConfirmUpdate">
      <center>Quality Check Team Details Updated<br />
      </center><p />
      <table align="center" cellpadding="3">
      <tr />
        <td><b>Quality Check Team ID</b></td>
        <td><?php echo $row["QCTEAM_ID"];  ?></td>
      </tr>
      <tr>
        <td><b>Quality Check Team Name</b></td>
        <td>
          <input type="text" name="qcteam_name" size="30" 
          value="<?php echo $row["QCTEAM_NAME"];  ?>">
        </td>
      </tr>
            
      </table>
	  
      <br/>
      <table align="center">
      <tr>
        <td>
          <input type="submit" value="Update Quality Check Team">
        </td>
        <td>
          <input type="button" value="Return to List" 
            OnClick="window.location='qcteam_edit.php'">
        </td>
      </tr>
      </table>
      </form>
<?php
    break;

    case "ConfirmUpdate":
      $query="UPDATE QCTEAM
        set QCTEAM_NAME = '$_POST[qcteam_name]' WHERE QCTEAM_ID =".$_GET["qcteam_id"];
      $stmt = oci_parse($conn,$query);
      oci_execute($stmt);
      header("Location: qcteam_edit.php");
    break;

    case "Delete":
 ?>
  <form method="post" action="qcteam_modify.php?
        property_id=<?php echo $_GET["qcteam_id"]; ?>
        &Action=ConfirmDelete">
      <center>
        Confirm deletion of the customer record
      <br /></center><p />
       <table align="center" cellpadding="3">
      
      <tr>
        <td><b>Quality Check Team ID</b></td>
        <td>
          <input type="text" name="qcteam_id" size="30" 
          value="<?php echo $row["QCTEAM_ID"];  ?>">
        </td>
      </tr>
	  <tr>
        <td><b>Quality Check Team Name</b></td>
        <td>
          <input type="text" name="qcteam_id" size="30" 
          value="<?php echo $row["QCTEAM_ID"];  ?>">
        </td>
      </tr>
      
      </table>
      <br/>
      <table align="center">
      <tr>
        <td>
          <input type="submit" value="Confirm">
        </td>
        <td>
          <input type="button" value="Cancel" 
            OnClick="window.location='qcteam_edit.php'">
        </td>
      </tr>
      </table>
<?php
    break;

    case "ConfirmDelete":
      $query="DELETE FROM QCTEAM
        WHERE qcteam_id =".$_GET["qcteam_id"];
      $stmt = oci_parse($conn,$query);
      if(@oci_execute($stmt))
      {
 ?>
        <center>
          The following customer record has been 
          successfully deleted<br />
<?php
        echo "Quality Check Team ID. ".$row["QCTEAM_ID"]." "."From QC Team ID"
          ." ".$row["QCTEAM_ID"];
        echo "</center>";
      }
      else
      {
        echo "<center>
           Error deleting property record</center>
           <p />";
      }
      echo "<center><input type='button' 
        value='Return to List' 
        OnClick='window.location=\"qcteam_edit.php\"'>
        </center>";
    break;
  }
  oci_free_statement($stmt);
  oci_close($conn);
 ?>
</body>
</html>