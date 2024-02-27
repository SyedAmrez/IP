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

$u=$_POST["Username"];
$p=$_POST["Password"];
$sql = "SELECT username,password FROM table1 where username= '{$u}' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    if ($row["username"]== $u && $row["password"]==$p)
       {
           echo "You have been successfully Validated";

  }
else 
{
  echo "Credentials Wrong, Try again";
} 
}
}
else
 {
   echo "User name given was not exist";
}

$conn->close();
 header("refresh:2; url=hp.html");
?>

