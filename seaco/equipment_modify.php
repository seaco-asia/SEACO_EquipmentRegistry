<?php
    ob_start();
 ?>
 
<html>
<link rel="stylesheet" href="style/style.php" media="screen">
<head><title>Equipment Modify</title></head>
<body>
<script language="javascript">
function confirm_delete()
{
   window.location='equipment_modify.php?equipment_id=
     <?php echo $_GET["equipment_id"]; 
	?>&Action=ConfirmDelete';
	 
}
</script>
<center><h1>Equipment Modification</h1></center>
<?php
  include("connection.php");
  $equipId=$_GET["equipment_id"];

  $conn = oci_connect($dbuname, $dbpwd,$db) or die("DB connection unsuccessful!");

  $query= "SELECT * FROM EQUIPMENT WHERE EQUIPMENT_ID ='".$_GET["equipment_id"]."'";
	
  $stmt = oci_parse($conn,$query);
  oci_execute($stmt);
  $row = oci_fetch_array ($stmt);

  $strAction = $_GET["Action"];

  switch($strAction)
  {
    case "Update":
 ?>
      <form method="post" action="equipment_modify.php?
        equipment_id=<?php echo $_GET["equipment_id"]; ?>
        &Action=ConfirmUpdate">
      <center>Equipment Details Updated<br />
      </center><p />
      <table align="center" cellpadding="3">
      <tr>
        <td><b>Equipment ID</b></td>
        <td>
          <input type="text" name="equipment_id" size="30" 
          value="<?php echo $row["EQUIPMENT_ID"];  ?>">
        </td>
      </tr>
      <tr>
        <td><b>Equipment Name</b></td>
        <td>
          <input type="text" name="equipment_name" size="30" 
          value="<?php echo $row["EQUIPMENT_NAME"];  ?>">
        </td>
      </tr>
      <tr>
        <td><b>Equipment Accuracy</b></td>
        <td>
          <input type="text" name="equipment_accuracy" size="30" 
          value="<?php echo $row["EQUIPMENT_ACCURACY"];  ?>">
        </td>
      </tr>
      
      </table>
      <br/>
      <table align="center">
      <tr>
        <td>
          <input type="submit" value="Update Equipment">
        </td>
        <td>
          <input type="button" value="Return to List" 
            OnClick="window.location='equipment_edit.php'">
        </td>
      </tr>
      </table>
      </form>
<?php
    break;

    case "ConfirmUpdate":
      $query="UPDATE EQUIPMENT
        SET EQUIPMENT_ID = '$_POST[equipment_id]', EQUIPMENT_NAME = '$_POST[equipment_name]' WHERE EQUIPMENT_ID =".$_GET["equipment_id"];
      $stmt = oci_parse($conn,$query);
      oci_execute($stmt);
      header("Location: equipment_edit.php");
    break;

    case "Delete":
 ?>
  <form method="post" action="equipment_modify.php?
        equipment_id=<?php echo $_GET["equipment_id"]; ?>
        &Action=ConfirmDelete">
      <center>
        Confirm deletion of the customer record
      <br /></center><p />
       <table align="center" cellpadding="3">
      <tr />
        <td><b>Equipment ID</b></td>
        <td><?php echo $row["EQUIPMENT_ID"];  ?></td>
      </tr>
      <tr>
        <td><b>Equipment Name</b></td>
        <td><?php echo $row["EQUIPMENT_NAME"];  ?></td>
      </tr>
      <tr>
        <td><b>Equipment Accuracy</b></td>
        <td><?php echo $row["EQUIPMENT_ACCURACY"];  ?></td>
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
            OnClick="window.location='equipment_edit.php'">
        </td>
      </tr>
      </table>
<?php
    break;

    case "ConfirmDelete":
      $query="DELETE FROM EQUIPMENT
        WHERE equipment_id =".$_GET["equipment_id"];
      $stmt = oci_parse($conn,$query);
      if(@oci_execute($stmt))
      {
 ?>
        <center>
          The following equipment record has been 
          successfully deleted<br />
<?php
        echo "Equipment ID. ".$row["EQUIPMENT_ID"]." "."From Equipment ID"
          ." ".$row["EQUIPMENT_ID"];
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
        OnClick='window.location=\"equipment_edit.php\"'>
        </center>";
    break;
  }
  oci_free_statement($stmt);
  oci_close($conn);
 ?>

</body>
</html>