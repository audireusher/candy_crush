<?php
	echo $_POST['Id'];
	echo $_POST['Product_Name'];
	echo $_POST['Price'];
	echo $_POST['Quantity'];
	echo $_POST['User'];
	echo $_POST['Time'];


    $conn = mysqli_connect("localhost", "root", "", "candy_rush");
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }


    $sql = "UPDATE `t_product` SET `product_name`='".$_POST['Product_Name']."',`unit_price`=".$_POST['Price'].",`available_quantity`='".$_POST['Quantity']."',`subcategory_id`='".$_POST['Subcategory']."',`updated_at`='".$_POST['Time']."',`added_by`='".$_POST['User']."' WHERE `product_id`=".$_POST['Id'].";";
    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    echo "Added wel";
    header("Location: ../Manage_products.php");
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>
