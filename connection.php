
<?php
$servername = "localhost";
$email = "root";
$password = "";
$dbname="se";
$conn =new mysqli($servername, $email, $password, $dbname);

if(!$conn){
die("Connection Failed:".mysqli_connect_error());
}
?>


