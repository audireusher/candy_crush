<?php
	echo $_POST['ID'];



    $conn = mysqli_connect("localhost", "root", "", "candy_rush");
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }


    $sql = "DELETE FROM `t_users` WHERE `users_id`=".$_POST['ID'].";";
    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    echo "Added wel";
    header("Location: ../Manage_users.php");
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }


?>
