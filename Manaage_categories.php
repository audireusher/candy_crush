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
    </style>
</head>
<body>


<div class="row">
    <center>
      <div class="CategoriesHolder" >
          <h5>Available categories</h5>
          <div>
              <form action="functions/AddCategory.php" method="POST">
                  <input id="Category" name="Category" placeholder="Add Category">
                  <button type="submit">+ Add</button>
              </form>
          </div>


      </div>
    </center>







<center>
  <div class="Main">
      <table>
          <tr>
              <th>Sub category id</th>
              <th>Sub category</th>
              <th>Category</th>
          </tr>
          <form class="NewSubCategory" method="POST" action='functions/AddSubcategory.php'>
          <tr>
               <td></td>
               <td><input placeholder="Sub category name" name="Sub_Category"></td>
               <td>
               <select name='Category'>
              <?php
              $conn = mysqli_connect("localhost", "root", "", "candy_rush");
              if (!$conn) {die("Connection failed: " . mysqli_connect_error());}
              $sql="SELECT `category_id`, `category_name`, `is_deleted` FROM `t_categories`;";
              $result = mysqli_query($conn, $sql);
              $TotalRows=mysqli_num_rows($result);
              if( 0<$TotalRows){
              while($row = $result->fetch_assoc()) {
              echo "<option value=".$row['category_id'].">".$row['category_name']."</option>";
              }
              }
              else{
              echo "0 results";
              }
              ?>

              </select>
                  </td>
                  <td><button>Add</button></td>
              </tr>
          </form>
          <?php

				$conn = mysqli_connect("localhost", "root", "", "candy_rush");
				if (!$conn) {die("Connection failed: " . mysqli_connect_error());}
				$sql="SELECT `subcategory_id`, `subcategory_name`, `category`, `is_deleted` FROM `t_subcategories` where `is_deleted`=0;";
				$result = mysqli_query($conn, $sql);
				$TotalRows=mysqli_num_rows($result);
				if( 0<$TotalRows){
				while($row = $result->fetch_assoc()) {
					echo "<tr>
					<form method='POST' action='functions/UpdateSubcategory.php' >
					<td>".$row['subcategory_id']."</td>
					<input style='display:none;' name='Id' value='".$row['subcategory_id']."'>
					<td><input name='name' value=".$row['subcategory_name']."></td>
					<td>
					<select name='category'>";
						echo "<option value='".$row['category']."'>".$row['category']."</option>";
						echo
							$sql_for_category="SELECT `category_id`, `category_name`, `is_deleted` FROM `t_categories`;";
							$result_category = mysqli_query($conn, $sql_for_category);
							$TotalRows_category=mysqli_num_rows($result_category);
							if( 0<$TotalRows_category){
								while($r = $result_category->fetch_assoc()) {
									echo "<option value='".$r['category_id']."' label='".$r['category_name']."'>";
								}
							}
					echo "</select>
					</td>
					<td><button type='submit'>Update</button></td>
					</form>
					<td><button>Delete</button></td>
					</tr>";
				}
				}
              else{
              echo "0 results";
              }
              ?>

      </table>
  </div>
</center>
</div>




<script>
    function AddNewCategory(){
    var Cat=document.getElementById("Category");
    var formData = new FormData();
    formData.action="AddCategory.php";
    formData.method="POST";
    formData.append("Category",Cat);
    formData.submit();
    }
</script>
</body>
</html>
