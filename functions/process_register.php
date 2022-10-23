
<?php
    echo $_POST['Category'];

    $conn = mysqli_connect("localhost", "root", "", "candy_rush");
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }


    //$sql = "INSERT INTO `t_categories`( `category_name`, `is_deleted`) VALUES ('".$_POST['Category']."',0);";
	//$sql="INSERT INTO `users`(`username`, `password`, `SurName`, `Tel`, `Email`, `FirstName`) VALUES ('".$_POST["Username"]."','".$_POST["password"]."','".$_POST["email"]."','".$_POST["Username"]."','".$_POST["tel"]."','".$_POST["password"]."');";
	$sql="INSERT INTO `t_users`( `first_name`, `last_name`, `email`, `password`, `role`, `is_deleted`) VALUES ('".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["email"]."','".$_POST["password"]."',1,0)";
    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    echo "Added wel";
    header("Location: ../reg.php");
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }



?>
