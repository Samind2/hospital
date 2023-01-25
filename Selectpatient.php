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
$sql = "SELECT patient.P_id ,patient.P_Name, patient.P_Debt, permissions.P_UserName
        FROM patient, permissions
        WHERE patient.P_id = permissions.P_Cid 
        and P_Debt Between 1000 and 3000 " ; 
$stmt = $conn->prepare($sql);
$stmt->execute();
?>

<table width="600" border="1">
  <tr>
    <th width="80"> <div align="center">P_id</div></th>
    <th width="80"> <div align="center">P_Name </div></th>
    <th width="80"> <div align="center">P_Debt </div></th>
    <th width="80"> <div align="center">P_UserName </div></th>
  </tr>

  <?php
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
 
  <tr>  
                                        <?php echo $result[""]; ?>     
        </a>
    </td>
    
    <td>
         <?php echo $result["P_id"];?>
    </td>

    <td>
         <?php echo $result["P_name"];?>
    </td>

    <td>
         <?php echo $result["P_debt"];?>
    </td>

    <td>
         <?php echo $result["P_Username"];?>
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