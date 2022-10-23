<?php







function Process($user_name,$user_password){
	echo "</br>You password is ".$user_name." and your password:".$user_password;

	
    // Create connection
    $conn = mysqli_connect("localhost", "root", "", "candy_rush");
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }


    $sql = "SELECT `users_id`, `first_name`, `last_name`, `email`, `password`, `role`, `is_deleted` FROM `t_users` where `first_name`='".$user_name."' ;";
    $result = mysqli_query($conn, $sql);
    echo mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      $row = mysqli_fetch_assoc($result);
      if($row["first_name"]==$user_name and $row["password"]==$user_password){
        echo "successfull login";
        if($row['role']==2){
          session_start();
          $_SESSION["user_name"] = $row["first_name"] ;
          $_SESSION["user_id"] = $row["users_id"] ;
          $_SESSION["user_email"] = $row["email"] ;
          header("Location: ../controls.php");
        }
		else{
			session_start();
			$_SESSION["user_name"] = $row["first_name"] ;
			$_SESSION["user_id"] = $row["users_id"] ;
			$_SESSION["user_email"] = $row["email"] ;
      header("Location: ../index.php");
		}
      }
      else{
      header("Location: ../reg.php");
      }
    } else {
      header("Location: ../reg.php");
    }

    mysqli_close($conn);

}

Process($_POST["username"],$_POST["password"]);

?>

<html>
<button>Continue</button>
<script>
</script>
</html>
