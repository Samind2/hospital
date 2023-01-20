<html> <head>
<title> Display selected patient Information</Sect></title>
</head>
<body>
    
<?php
require
"connect.php";
if
(isset($_GET["P_Name"]))
{
    $strP_Name =
$_GET["P_Name"];

    echo "<br>" .
"strP_Name = " .$strP_Name;   

    $sql = "SELECT *
        FROM patient, permissions
        WHERE P_Name LIKE '%" .$strP_Name . "%'";

    echo "<br>" . " sql =" .$sql . "<br>";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    ($result = $stmt->fetch(PDO::FETCH_ASSOC)) ; 
    print_r($result);
}
?>
<table width="300" border="1">
  <tr>
    <th width="325">รหัสคนไข้</th>
    <td width="240"><?php echo $result["P_id"]; ?></td>
  </tr>

  <tr>
    <th width="130">ชื่อคนไข้</th>
    <td><?php echo $result["P_Name"]; ?></td>
  </tr>

  <tr>
    <th width="325">อีเมลคนไข้</th>
    <td width="240"><?php echo $result["P_UserName"]; ?></td>
  </tr>

  <tr>
    <th width="325">วันเกิด</th>
    <td width="240"><?php echo $result["P_DOB"]; ?></td>
  </tr>

  <tr>
    <th width="325">ยอดหนี้</th>
    <td width="240"><?php echo $result["P_Debt"]; ?></td>
  </tr>

  </table>
<?php
$conn = null;
?>
</body>
</html>