<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>select-customer-1</title>
</head>
<body>
  
<?php
require "connect.php";
// ลองให้โชว์ข้อมูล customer
$sql = "SELECT patient.P_id ,patient.P_Name, permissions.P_UserName
        FROM patient, permissions
        WHERE patient.P_id = permissions.P_CID" ; 
$stmt = $conn->prepare($sql);
$stmt->execute();
?>

<table width="600" border="1">
  <tr>
    <th width="80"> <div align="center">P_id</div></th>
    <th width="80"> <div align="center">P_Name</div></th>
  </tr>

  <?php
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
 
  <tr>  
    <td><a href ="SelectpatientLinkdetail.php?P_id=<?php echo $result["P_id"]; ?>">
                                        <?php echo $result["P_id"]; ?>     
        </a>
    </td>
    
    <td>
         <?php echo $result["P_Name"];?>
    </td>

    </tr>
 
<?php
  }
?>
 
</table>
 
<?php
$conn = null;
?>
</body>
</html>