<html> <head>
<title> Display selected patient Information</Sect></title>
</head>
<body>

<?php
 if (isset($_GET["P_id"]))
  {
    $strP_id = $_GET["P_id"];
  }
 require "connect.php";
 $sql = "SELECT patient.P_id ,patient.P_name, patient.P_DOB, patient.P_debt, permissions.P_Username
        FROM patient, permissions
        WHERE patient.P_id = permissions.P_CID 
        and patient.P_id='".$_GET["P_id"]."'";
        echo $sql;
 $params = array($strP_id);
 $stmt = $conn->prepare($sql);
 $stmt->execute($params);
 $result = $stmt->fetch(PDO::FETCH_ASSOC);


?>
<table width="300" border="1">
  <tr>
    <th width="325">รหัสคนไข้</th>
    <td width="240"><?php echo $result["P_id"]; ?></td>
  </tr>

  <tr>
    <th width="130">ชื่อคนไข้</th>
    <td><?php echo $result["P_name"]; ?></td>
  </tr>

  <tr>
    <th width="130">อีเมลคนไข้</th>
    <td><?php echo $result["P_Username"]; ?></td>
  </tr>

  <tr>
    <th width="130">วันเกิด</th>
    <td><?php echo $result["P_DOB"]; ?></td>
  </tr>

  <tr>
    <th width="130">ยอดหนี้</th>
    <td><?php echo $result["P_debt"]; ?></td>
  </tr>

  </table>
<?php
$conn = null;
?>
</body>
</html>