<?php


    $conn = mysqli_connect("localhost", "root", "", "candy_rush");
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }


    $sql = "UPDATE `t_subcategories` SET `subcategory_name`='".$_POST['name']."',`category`=".$_POST['category']."  WHERE `subcategory_id`=".$_POST['Id'].";";
    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    echo "Added";
    header("Location: ../Manaage_categories.php");
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>
