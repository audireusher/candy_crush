<?php
session_start();
$user_id=$_SESSION["user_id"];
$email=$_SESSION["user_email"];
$user_name=$_SESSION["user_name"];
echo $user;
//print_r($_SESSION);
echo $_POST['user_order'];
$response = json_decode($_POST['user_order'], true);
echo '<br>';
echo $response['1']['name'];



$conn = mysqli_connect("localhost", "root", "", "candy_rush");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


foreach ($response as $item){
	echo $item['name'];
	$sql="INSERT INTO `t_orders`( `user_id`, `user_name`, `product_id`, `product_name`, `user_email`, `is_delivered`,`product_quantity_desired`) VALUES (".$user_id.",'".$user_name."',".$item['id'].",'".$item['name']."','".$email."',0,".$item['amount'].")";
	if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    echo "Added wel";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
header("Location: ../cart.php");


?>
