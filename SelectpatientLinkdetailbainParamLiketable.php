<html>
    <head>
        <title>Test SQL injection</title>
    </head>
    <body>
        <h1> Test SQL injection</h1>
            <form action="SelectpatientLinkdetailbainParamLiketable.php" method="GET">
            <input type="text" placeholder="Enter P_id"name="P_id">
            <br><br>
            <input type="submit">
        </form>

    </body>
    
</html>

<?php
$count = 0;
if(isset($_GET['P_id'])&& $_GET['P_id']!=null)
{
    echo"<br> get value =" . $_GET['P_id'];
    require 'connect.php';

    $sql = "SELECT * FROM patient, permissions 
    where patient.P_id = permissions.P_CID 
    and P_id like CONCAT('%',:P_id,'%')";

    echo "<br>sql=".$sql;
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':P_id', $_GET['P_id']); //stmt เป็นตัวแปลจะตั้งชื่ออะไรก็ได้ แต่ต้องตรงกัน//
    $stmt->execute();
?>

    <table width="800" border="1">
  <tr>
    <th width="90"> <div align="center">รหัสผู้ใช้ </th>
    <th width="140"> <div align="center">ชื่อคนไข้ </th>
    <th width="120"> <div align="center">วันเกิด </th>
    <th width="70"> <div align="center">ยอดหนี้ </th>
    <th width="70"> <div align="center">Email </th>
  </tr>
    
<?php

    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
<tr>
    <td>
                                        <?php echo $result["P_id"]; ?>
        </a>
         
    </td>
 
 
   <td><?php echo $result["P_name"]; ?></div></td>
    <td><?php echo $result["P_DOB"]; ?></td>
    <td><?php echo $result["P_debt"]; ?></div></td>
    <td><?php echo $result["P_Username"]; ?></div></td>
    
  </tr>
<?php
        $count++;
    }
    echo "count ... ".$count;
}
    // if($count==0)
    //     echo"<br>No data ... <br>";

    // $conn=null;

?>



  
  