<?php
	echo $_POST['Id'];
	echo $_POST['fname'];
	echo $_POST['lname'];
	echo $_POST['password'];
	echo $_POST['email'];
  echo $_POST['role'];



    $conn = mysqli_connect("localhost", "root", "", "candy_rush");
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }


    $sql = "UPDATE `t_users` SET `first_name`='".$_POST['fname']."' ,`last_name`='".$_POST['lname']."' ,`email`='".$_POST['email']."',`password`='".$_POST['password']."' WHERE `users_id`=".$_POST['Id'].";";
    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    echo "Added wel";
    header("Location: ../Manage_users.php");
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>
