<html>
    <head>
        <title>Test SQL injection</title>
    </head>
    <body>
        <h1> Test SQL injection</h1>
            <form action="SelectpatientLinkdetailbainParamLike.php" method="GET">
            <input type="text" placeholder="Enter P_id"name="P_id">
            <br><br>
            <input type="submit">
        </form>

    </body>
    
</html>

<?php
$count = 0;
if(isset($_GET['P_id'])&& $_GET['P_id']!=null):
{
    echo"<br> get value =" . $_GET['P_id'];
    require 'connect.php';

    $sql = "SELECT * FROM patient where P_id like CONCAT('%',:P_id,'%')";

    echo "<br>sql=".$sql;
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':P_id', $_GET['P_id']); //stmt เป็นตัวแปลจะตั้งชื่ออะไรก็ได้ แต่ต้องตรงกัน//
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    echo "<br>**********<br>";

    while ($row = $stmt->fetch()) {
        echo $row['P_id'].''.$row['P_name'].''.$row['P_DOB'].''.$row['P_debt'].''.$row['P_Username']."<br/>";
        $count++;
    }
    echo "count ... ".$count;
}
    if($count==0)
        echo"<br>No data ... <br>";

    $conn=null;
endif;
?>



  
  