<?php
if(isset($_GET['P_name'])):
    echo"<br>" . $_GET['P_name'];
    require 'connect.php';
    $count=0;
    $sql = "SELECT * FROM patient where P_name = :P_name";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':P_name', $_GET['P_name']); //stmt เป็นตัวแปลจะตั้งชื่ออะไรก็ได้ แต่ต้องตรงกัน//
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    echo "<br>**********<br>";

    while ($row = $stmt->fetch()) {
        echo $row['P_id'].''.$row['P_name'].''.$row['P_DOB']."<br/>";
        $count++;
    }
    //echo "count ... ".$count;
    if($count==0)
        echo"<br>No data ... <br>";
    $conn=null;
endif;
?>