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
          border:solid 1px black;

        }

        .Main {
          margin-top:15px;
          float: left;
          width: 60%;
		  height:400px;
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

		#product_form span{
			margin:10px;background-color:rgba(67, 68, 112);border-color:rgba(67, 68, 112);border-radius:12px;
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


        #ProductDetails{
        position: absolute;left: 50%;top: 50%;z-index: 100000;
        transform: translate(-50%, -50%);
        background-color:white;
        border: solid 5px black;
        border-radius:12px;
        }
    </style>
</head>
<body id="body">

<div class="row">
    <center>
      <div class="CategoriesHolder" >
          <h5>Add a new product</h5>
          <div>
              <center>
              <form  id='product_form' onsubmit="ProductFormSubmit()" method="POST" action="functions/AddNewItem.php" enctype="multipart/form-data">
                  <input style='border:solid 0.5px black; margin-bottom:10px; width:250px; height:30px;' name="Name" placeholder="Name" required></br>
                  <input style='border:solid 0.5px black; margin-bottom:10px; width:250px; height:30px;' type='number' name="Price" placeholder="price" required></br>
                  <input style='border:solid 0.5px black; margin-bottom:10px; width:250px; height:30px;' name="Quantity" placeholder="Quantity Available" required></br>
				  <textarea style='border:solid 0.5px black; margin-bottom:10px; width:250px; height:50px;' name='Description' required>Decription</textarea></br>
				  <label>Category and Subcategory</label><br>
                  <select style='border:solid 0.5px black; margin-bottom:100px; width:250px; height:30px;' name="Subcategory" placeholder="Add Category" onchange="AssignCategoryValue(this.options[this.selectedIndex])" required></br>
				  <?php
					$conn = mysqli_connect("localhost", "root", "", "candy_rush");
					if (!$conn) {die("Connection failed: " . mysqli_connect_error());}
					$sql="SELECT `category_id`, `category_name`, `is_deleted` FROM `t_categories`;";
					$result = mysqli_query($conn, $sql);
					$TotalRows=mysqli_num_rows($result);
					if( 0<$TotalRows){
						while($row = $result->fetch_assoc()) {
							echo "<optgroup label='".$row['category_name']."'>";
							$SubCategoryQuery="SELECT `subcategory_id`,`subcategory_name`,`category`,`is_deleted` FROM `t_subcategories` WHERE `is_deleted`=0 and `category`=".$row['category_id']."";
							$SubCategoryResult = mysqli_query($conn, $SubCategoryQuery);
							$SubCategoryTotalRows=mysqli_num_rows($SubCategoryResult);
							if( 0<$SubCategoryTotalRows){
								while($SubCategory_row = $SubCategoryResult->fetch_assoc()) {
									echo "<option id='".$row['category_id']."'  value=".$SubCategory_row['subcategory_id'].">".$SubCategory_row['subcategory_name']."</option>";
								}
							}
						}
					}
					else{
						echo "0 results";
					}
					?>

					<input type='hidden' name="Category" id="NewCategory">
					<input type='hidden' name="Time" id="TimeCreated">
					<input  type='file' id="ImageToUpload" name="ImageToUpload" placeholder="Add Category" required>

                  <input style='border:solid 0.5px black;' type='submit' value="Add" name='submit'>
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
              <th>Name</th>
              <th>Description</th>
              <th>Price</th>
              <th>Quantity Available</th>
              <th>Category</th>
              <th>SubCategory</th>
              <th>Created At</th>
              <th>Updated At</th>
          </tr>
		  <?php
			//session_start();
			$conn = mysqli_connect("localhost", "root", "", "candy_rush");
            if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			else{
				$sql="SELECT `product_id`, `product_name`, `product_description`, `product_image`, `unit_price`, `available_quantity`, `subcategory_id`, `created_at`, `updated_at`, `added_by`, `is_deleted` FROM `t_product` ;";
				$result = mysqli_query($conn, $sql);
				$TotalRows=mysqli_num_rows($result);
				if( 0<$TotalRows){
					while($row = $result->fetch_assoc()) {
						echo "
						<form method='POST' class='NewSubCategory' action='functions/UpdateProducts.php' id='P".$row["product_id"]."'>
							<tr>

								<td><span style=\"margin:10px;color:white;background-color:black;border:solid 1px black;padding:3px;\" onclick=\"ImageCall('".$row['product_image']."')\">Preview</span></td>
								<td>".$row["product_id"]."</td>
								<td><input name='Product_Name' placeholder='Name' value=".$row["product_name"]."></td>
								<td><span style=\"margin:10px;color:white;background-color:black;border:solid 1px black;padding:3px;\" onclick=\"DescriptionCall(`".$row['product_description']."`)\">Preview</span></td>
								<td><input name='Price' placeholder='Price' value=".$row["unit_price"]."></td>
								<td><input name='Quantity' placeholder='Quantity' value=".$row["available_quantity"]."></td>
								<td>
									<select name='Subcategory'>";
										echo "<option value='".$row['subcategory_id']."'>".$row['subcategory_id']."</option>";
										$sql_for_category="SELECT `category_id`, `category_name`, `is_deleted` FROM `t_categories`;";
										$result_category = mysqli_query($conn, $sql_for_category);
										$TotalRows_category=mysqli_num_rows($result_category);
										if( 0<$TotalRows_category){
											while($r = $result_category->fetch_assoc()) {
												echo "<optgroup label='".$r['category_name']."'>";
												$SubCategoryQuery="SELECT `subcategory_id`,`subcategory_name`,`category`,`is_deleted` FROM `t_subcategories` WHERE `is_deleted`=0 and `category`=".$r['category_id']."";
												$SubCategoryResult = mysqli_query($conn, $SubCategoryQuery);
												$SubCategoryTotalRows=mysqli_num_rows($SubCategoryResult);
												if( 0<$SubCategoryTotalRows){
													while($SubCategory_row = $SubCategoryResult->fetch_assoc()) {
														echo "<option id='".$r['category_id']."'  value=".$SubCategory_row['subcategory_id'].">".$SubCategory_row['subcategory_name']."</option>";
													}
												}
											}
										}
										else{
											echo "0 results";
										}
									echo"</select>
								</td>
								<td>".$row["created_at"]."</td>
								<td>".$row["updated_at"]."</td>
								<input style='display:none;' name='User' value='Boss'>
								</form>
								<td><button onclick='UpdateProductFormSubmit(".$row["product_id"].")'>Update</button></td>
								<form method='POST' action='functions/DeleteProducts.php'>
									<input style='display:none;' name='ID' value='".$row["product_id"]."'>
									<td><button type='submit'>Delete</button></td>
								</form>
							</tr>
						";
					}
				}
				else{
					echo "0 results";
				}
            }

		  ?>
      </table>
  </div>
</center>
</div>



</body>
<button onclick="DescriptionCall('Description')">Preview</button>
<script>
    function DescriptionCall(Description){
    body=document.getElementById("body");
    divContainer=document.createElement("div");
    divContainer.id="ProductDetails";
    centerContainer=document.createElement("center")
    centerContainer.id="Center_description_container";
    Ebutton=document.createElement("button")
    Ebutton.textContent="Edit"
    Ebutton.setAttribute("onclick","Edit_description()");
    Cancel_button=document.createElement("button")
    Cancel_button.textContent="Cancel"
    Cancel_button.onclick=function (){
		console.log("Closing");
		var element=document.getElementById('Center_description_container');
		element.remove();
	}
    content=document.createElement("h1")
    content.style="padding:20px;"
    content.textContent=Description;
    divContainer.appendChild(content);
    divContainer.appendChild(Ebutton);
    divContainer.appendChild(Cancel_button);
    centerContainer.appendChild(divContainer);
    body.appendChild(centerContainer);
    }


	function ImageCall(Description){
    body=document.getElementById("body");
    divContainer=document.createElement("div");
    divContainer.id="ProductDetails";
    centerContainer=document.createElement("center")
    centerContainer.id="Center_description_container";
    Ebutton=document.createElement("button")
    Ebutton.textContent="Edit"
    Ebutton.setAttribute("onclick","Edit_description()");
    Cancel_button=document.createElement("button")
    Cancel_button.textContent="Cancel"
    Cancel_button.onclick=function (){
		console.log("Closing");
		var element=document.getElementById('Center_description_container');
		element.remove();
	}
    content=document.createElement("img")
    content.style="padding:20px;width:50%;height:50%;"
    content.src="functions/"+Description;
    divContainer.appendChild(content);
    divContainer.appendChild(Ebutton);
    divContainer.appendChild(Cancel_button);
    centerContainer.appendChild(divContainer);
    body.appendChild(centerContainer);
    }




	function AssignCategoryValue(num){
		let Element=document.getElementById("NewCategory");
		console.log(Element);
		Element.value=num.id;
		console.log(num.id)
	}


	function ProductFormSubmit(){
		let Current_Time_And_Date=new Date();
		Currently=Current_Time_And_Date.getFullYear().toString()+"-"+Current_Time_And_Date.getMonth().toString()+"-"+Current_Time_And_Date.getDate().toString()+" "+Current_Time_And_Date.getHours().toString()+"-"+Current_Time_And_Date.getMinutes().toString()+"-"+Current_Time_And_Date.getSeconds().toString()
		DateElement= document.getElementById("TimeCreated");
		DateElement.value=Currently;
		let form=document.getElementById('product_form')
		form.submit();
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



	function Delete(id){
		var form=document.createElement('form');
		var user_id=document.createElement('ID')
		user_id.value=id;
		user_id.name='ID';
		form.appendChild(user_id);
		form.action="functions/DeleteProducts.php"
		form.method="POST";
		form.submit()
	}



</script>
</html>
