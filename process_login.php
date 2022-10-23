<?php
    require('connection.php');
    session_start();
    
    if (isset($_POST['submit'])) {
        $email=$_POST['email'];
        $password=$_POST['psw'];

        $sql    = "SELECT * FROM customers WHERE Email='$email' AND Password='$password' ";
        $result = $conn->query($sql);
       
        if ($result->num_rows > 0) {
            $_SESSION['UserID'] = $userId;
            
            header("Location: index.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect email/password.</h3><br/>
                  <p class='link'>Click here to <a href='signup.html'>Login</a> again.</p>
                  </div>";
        }
    } 
?>