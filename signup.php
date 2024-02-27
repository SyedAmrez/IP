<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="lib";
$conn = new mysqli($servername, $username, $password, $dbname);
if(!$conn){  

  die('Could not connect: '.mysqli_connect_error());  

}  
echo 'Connected successfully<br/>';  

$stmt = $conn->prepare("INSERT INTO table1(username,password,email,number) VALUES(?,?,?,?)");
$stmt->bind_param("ssss", $u,$p,$e,$n);
// set parameters and execute
$u=$_POST["Username"];
$p=$_POST["Password"];
$e=$_POST["Email"];
$n=$_POST["Mobile_number"];
$stmt->execute();
 echo "Record inserted successfully";  
$stmt->close();
$conn->close();
header("refresh:2; url=hp.html");
?> 
