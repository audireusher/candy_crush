<?php
require("connection.php");
 
     $FirstName = $_POST['fname'];
     $LastName = $_POST['lname'];
     $email = $_POST['email'];
     $Password = $_POST['psw'];
     $RepeatPassword= $_POST['psw-repeat']; 
     
     

$sql="INSERT INTO customers(first_name,second_name,Email,Password)
VALUES('$FirstName','$LastName','$email','$Password')";
     


if (mysqli_query($conn, $sql)) {
        header("Location: index.php");

     } 
     else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);

?>
