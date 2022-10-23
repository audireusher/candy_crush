<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        .CategoriesHolder {
          float: left;
          width: 20%;
          background-color:white;
          padding:5px;
          margin:5px;
          margin-top:15px;
          border:10px;
          border:solid 1px black;;

        }

        .Main {
          margin-top:15px;
          float: left;
          width: 60%;
          padding-left:80px;
          padding-right:80px;
          padding-top:80px;
          padding-bottom:80px;
          background-color:white;
		border:solid 1px black;;
          margin-bottom:60px;
          overflow: scroll;
          white-space: nowrap;
        }

        .Main button{
        margin:10px;
        background-color:white;
        border-color:black;
		color:black;
        border:solid 0.2px black;;

        }

        /* Clear floats after the columns */
        .row:after {
          content: "";
          display: table;
          clear: both;
        }

        .NewSubCategory input{
        }

        td {
        margin:5px;
        }


        .ProductDetails{
        position: absolute;left: 50%;top: 50%;z-index: 100000;
        transform: translate(-50%, -50%);
        background-color:rgba(67, 68, 112);
        border: solid 5px white;
        border-radius:12px;
        }
    </style>
</head>
<body cla>


<div class="row">
    <center>
      <div class="CategoriesHolder" >
          <h5>Add a new product</h5>
          <div>
              <center>
              <form action="functions/process_login.php" method="post" >
                <input type="text" placeholder="First Name" name="fname" required><br>
                <input type="text" placeholder="Last Name" name="lname" required><br>
                <input type="text" placeholder="Enter Email" name="email" required><br>
                <input type="password" placeholder="Enter Password" name="password" required><br>
                <button type="submit" name="submit" class="signupbtn">CREATE ACCOUNT</button>
              </form>
              </center>
          </div>


      </div>
    </center>







<center>
  <div class="Main">
      <table>
          <tr>
              <th>Image</th>
              <th>ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Password</th>
              <th>Role</th>
          </tr>
          <form class="NewSubCategory">
              <?php

              $conn = mysqli_connect("localhost", "root", "", "candy_rush");
              if (!$conn) {die("Connection failed: " . mysqli_connect_error());}
              $sql="SELECT `users_id`, `first_name`, `last_name`, `email`, `password`, `role`, `is_deleted` FROM `t_users` ;";
              $result = mysqli_query($conn, $sql);
              $TotalRows=mysqli_num_rows($result);
              if( 0<$TotalRows){
              while($row = $result->fetch_assoc()) {
              echo "
				<tr>
					<form method='POST', action='functions/UpdateUsers.php'>
					  <td>".$row["users_id"]."</td>
					  <input style='display:none;' value=".$row["users_id"]." name='Id'>
					  <td><input name='fname' placeholder='First Name' value=".$row["first_name"]."></td>
					  <td><input name='lname' placeholder='Last Name' value=".$row["last_name"]."></td>
					  <td><input name='email' placeholder='Email' value=".$row["email"]."></td>
					  <td><input name='password' placeholder='password' value=".$row["password"]."></td>
            <td><input name='password' placeholder='password' value=".$row["password"]."></td>
            <td>
					  <select name='role'>";
                echo "<option value='".$row['role']."'>".$row['role']."</option>";
                echo
                  $sql_for_category="SELECT `role_id`, `role_name`, `is_deleted` FROM `t_roles`;";
                  $result_category = mysqli_query($conn, $sql_for_category);
                  $TotalRows_category=mysqli_num_rows($result_category);
                  if( 0<$TotalRows_category){
                    while($r = $result_category->fetch_assoc()) {
                      echo "<option value='".$r['role_id']."' label='".$r['role_name']."'>";
                    }
                  }
                echo "
            </select>
					  </td>
					  <td><button type='submit'>Update</button></td>
					</form>
					<form action='functions/DeleteUsers.php' method='POST'>
					  <input style='display:none;' name='ID' value='".$row["users_id"]."'>
					  <td><button type='submit' >Delete</button></td>
					 </form>
              </tr>";
              }
              }
              else{
              echo "0 results";
              }
              ?>

          </form>

      </table>
  </div>
</center>
</div>




</body>
<script>
    function DescriptionCall(Description){
    a=document.create
    }


	function UpdateProductFormSubmit(id){
		let Current_Time_And_Date=new Date();
		Currently=Current_Time_And_Date.getFullYear().toString()+"-"+Current_Time_And_Date.getMonth().toString()+"-"+Current_Time_And_Date.getDate().toString()+" "+Current_Time_And_Date.getHours().toString()+"-"+Current_Time_And_Date.getMinutes().toString()+"-"+Current_Time_And_Date.getSeconds().toString()
		DateElement= document.getElementById("TimeCreated");
		DateElement.value=Currently;
		let form=document.getElementById('P'+id)
		var time=document.createElement('input')
		time.name='Time';
		time.value=Currently;
		form.appendChild(time)
		var Item_id=document.createElement('input')
		Item_id.name='Id';
		Item_id.value=id;
		form.appendChild(Item_id)
		form.submit();
	}


	function DeleteUser(id){
		console.log(id)
	}
</script>
</html>
