<?php
    $name = $_POST["name"];
    $link = require_once("../../config.php");
    $sql="select * from Parking_Lot where name= '$name'";
	$result = mysqli_query($link,$sql);

    while ($record = mysqli_fetch_row($result))
    {
        echo "<script>alert('請稍等');
                window.location.href='./導航(2.1).php?address=$record[2]#map';
              </script>";
    }
?>