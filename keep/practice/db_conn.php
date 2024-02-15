<?php
$sname= "115.68.231.165";
$uname= "2021320306";
$password="ooinoing@korea.ac.kr";

$db_name = "db2021320306";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn){
    echo("Connection failed!");

}
?>