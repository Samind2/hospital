<?php
if(isset($_GET['P_id'])):
    echo"<br>" . $_GET['P_id'];
    require 'connect.php';
    $count=0;
    $sql = "SELECT * FROM country where countryName = :countryName";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':countryName', $_GET['countryName']);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    echo "<br>**********<br>";

    while ($row = $stmt->fetch()) {
        echo $row['CountryName'].''.$row['CountryName']."<br/>";
        $count++;
    }
    //echo "count ... ".$count;
    if($count==0)
        echo"<br>No data ... <br>";
    $conn=null;
endif;
?>