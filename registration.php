<!DOCTYPE html>
<head>
    <title>signup</title>
<link rel="stylesheet" href="regstyle.css">
 <style>
body {
 background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0.5) 100%),  url('https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/d1-81olored-candies-on-pastel-pink-background-royalty-free-image-1644956455.jpg');
}
</style>
</head>

<body>
<div style="display: flex;width:60%">
<form action="process_signup.php" method="post" style="border:1px solid lightpink;width:60%;padding:10px;background-color:#FFC0CB;">
  <div class="container">
    <h1>New to Candy Rush?</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
 <label for="fname"><b>First Name</b></label><br>
    <input type="text" placeholder="First Name" name="fname" required>
<br>
 <label for="lname"><b>Surname</b></label><br>
    <input type="text" placeholder="Last Name" name="lname" required>
<br>
    <label for="email"><b>Email Address</b></label><br>
    <input type="text" placeholder="Enter Email" name="email" required>
<br>
    <label for="psw"><b>Password</b></label><br>
    <input type="password" placeholder="Enter Password" name="psw" required>
<br>
    <label for="psw-repeat"><b>Repeat Password</b></label><br>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
  <br>



<br> 
    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>

    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">

      <button type="submit" name="submit" class="signupbtn">CREATE ACCOUNT</button>

    </div>
  </div>
</form>
<div>

       
     <div style="display: flex; width:300%;">   
<form action="functions/process_login.php" method="post" style="border:1px solid lightpink;width:60%;padding:10px;background-color:#FFC0CB;">
  <div class="container">
    <h1>Sign in here!</h1>
    
    <hr>

    <label for="email"><b>Email Address</b></label><br>
    <input type="text" placeholder="Enter Email" name="username" required>
<br>
    <label for="psw"><b>Password</b></label><br>
    <input type="password" placeholder="Enter Password" name="password" required>
<br>
   
<p>Forgot Password?<a href="#" style="color:dodgerblue">Click Here.</a></p>

 
    
    <div class="clearfix">

      <button type="submit" name="submit" class="signupbtn">LOG IN</button>

    </div>
  </div>
</form>
</div>
           
    </body>
</html>