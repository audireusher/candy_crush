<?php
	$uploaddir = '/home/user/Desktop/Code/PHP/htdocs/candy_rush/functions/uploads/';
	$filename='';


	//Uplading the file to the upload folder
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["ImageToUpload"]["name"]);
	echo $target_file; echo "<br>";

	if (move_uploaded_file($_FILES["ImageToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["ImageToUpload"]["name"])). " has been uploaded.";
	} else {
		echo "Sorry, there was an error uploading your file.";
	}
    $conn = mysqli_connect("localhost", "root", "", "candy_rush");
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }


    $sql = "INSERT INTO `t_product`(`product_name`, `product_description`, `product_image`, `unit_price`, `available_quantity`, `subcategory_id`, `created_at`, `updated_at`, `added_by`, `is_deleted`) VALUES
	('".$_POST['Name']."','".$_POST['Description']."','".$target_file."','".$_POST['Price']."','".$_POST['Quantity']."','".$_POST['Subcategory']."','".$_POST['Time']."','".$_POST['Time']."','Boss',0)";
	$sql_statement="INSERT INTO `t_product`(`product_name`, `product_description`, `product_image`, `unit_price`, `available_quantity`, `subcategory_id`, `created_at`, `updated_at`, `added_by`, `is_deleted`)
	VALUES ('',[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11])";
    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    echo "Added wel";
    header("Location: ../Manage_products.php");
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }






?>
