<?php
    echo $_POST['Category'];

    $conn = mysqli_connect("localhost", "root", "", "candy_rush");
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }


    $sql = "INSERT INTO `t_categories`( `category_name`, `is_deleted`) VALUES ('".$_POST['Category']."',0);";
    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    echo "Added wel";
    header("Location: ../Manaage_categories.php");
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }



?>
