<?php
	echo $_POST['id'];




	$conn = mysqli_connect("localhost", "root", "", "candy_rush");
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }


    $sql = "DELETE FROM `t_product` WHERE `product_id`=".$_POST['ID'].";";
    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    echo "Added wel";
    header("Location: ../Manage_orders.php");
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>
