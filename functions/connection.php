
<?php
$servername = "localhost";
$email = "root";
$password = "";
$dbname="candy rush";
$conn =new mysqli($servername, $email, $password, $dbname);

if(!$conn){
die("Connection Failed:".mysqli_connect_error());
}
?>


