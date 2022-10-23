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
              <form>
                  <input name="NewCategory" placeholder="Add Category">
                  <input name="NewCategory" placeholder="Add Category">
                  <input name="NewCategory" placeholder="Add Category">
                  <input name="NewCategory" placeholder="Add Category">
                  <input name="NewCategory" placeholder="Add Category">
                  <input name="NewCategory" placeholder="Add Category">
                  <input name="NewCategory" placeholder="Add Category">
                  <input name="NewCategory" placeholder="Add Category">
                  <input name="NewCategory" placeholder="Add Category">
                  <button>+ Add</button>
              </form>
              </center>
          </div>


      </div>
    </center>







<center>
  <div class="Main">
      <table>
          <tr>
              <th>order_id</th>
              <th>user_name</th>
			  <th>Email</th>
              <th>product name</th>
              <th>Quantity</th>
          </tr>
          <form class="NewSubCategory">
              <?php

              $conn = mysqli_connect("localhost", "root", "", "ecom");
              if (!$conn) {die("Connection failed: " . mysqli_connect_error());}
              $sql="SELECT `order_id`, `user_id`, `user_name`, `product_id`, `product_name`, `user_email`, `is_delivered`, `product_quantity_desired` FROM `t_orders` ;";
              $result = mysqli_query($conn, $sql);
              $TotalRows=mysqli_num_rows($result);
              if( 0<$TotalRows){
              while($row = $result->fetch_assoc()) {
              echo "
				<tr>
					<form method='POST', action='functions/ManageDeliveredProducts.php'>
					  <td>".$row["order_id"]."</td>
					  <td>".$row["user_name"]."</td>
					  <td>".$row["user_email"]."</td>
					  <td>".$row["product_name"]."</td>
					  <td>".$row["product_quantity_desired"]."</td>
					  <input style='display:none;' name='id' value=".$row["order_id"].">
					  <td><button type='submit'>Delivered</button></td>
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
