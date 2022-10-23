
<?php 
@include 'connection.php';

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = 'product added to cart succesfully';
   }

}

session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Candy Rush</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Candy Rush" name="keywords">
    <meta content="Candy Rush" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="products.css">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-primary py-3 d-none d-md-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-white pr-3" href="">FAQs</a>
                        <span class="text-white">|</span>
                        <a class="text-white px-3" href="">Help</a>
                        <span class="text-white">|</span>
                        <a class="text-white pl-3" href="">Support</a>
                    </div>
                </div>
                <div class="col-md-6 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-white px-3" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-white px-3" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-white px-3" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-white px-3" href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-white pl-3" href="">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-white navbar-light shadow p-lg-0">
                <a href="index.html" class="navbar-brand d-block d-lg-none">
                    <h1 class="m-0 display-4 text-primary"><span class="text-secondary">c</span>ANDY<span class="text-secondary">r</span>RUSH</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="about.php" class="nav-item nav-link">About</a>
                        <a href="cart.php" class="nav-item nav-link">Cart <span id='item-count' style='color:red; '></span> </a>
                    </div>
                    <a href="index.php" class="navbar-brand mx-5 d-none d-lg-block">
                        <h1 class="m-0 display-4 text-primary"><span class="text-secondary">c</span>ANDY <span class="text-secondary">r</span>USH</h1>
                    </a>
                    <div class="navbar-nav mr-auto py-0">
                        <a href="registration.php" class="nav-item nav-link">Signup</a>
                        <a href="gallery.php" class="nav-item nav-link">Gallery</a>
                        <a href="contact.php" class="nav-item nav-link">Contact</a>
                        <?php
                        if(isset($_SESSION['user_name'])==true) {
                            echo "<a href='registration.php' class='nav-item nav-link'>".$_SESSION["user_name"]."| Settings </a>";
                        }else{
                            echo "<a href='registration.php' class='nav-item nav-link'>Signup | Login</a>";
                        }
                        ?>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

<div class="container">

<section class="products">
    
   <div class="box-container">

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

                     
                        <div class='box'>
                            <img style='width:100%;' src='functions/".$row['product_image']."' alt=''>
                            <h5>".$row['product_name']."</h5>
                            <div class='price'>KSH ".$row['unit_price']."/-</div>
                            <input type='submit' onclick=\"AddCartItem(".$row['product_id'].",'".$row['product_name']."','functions/".$row['product_image']."',".$row['unit_price'].")\" class='btn' value='add to cart' name='add_to_cart'>
                        </div>
                       
						
						
						";
					}
				}
				else{
					echo "0 results";
				}
            }
            
		?>



   </div>











</section>




</div>
<script>
	function AddCartItem(Id,ItemName,Image,price){
		cart=JSON.parse(localStorage.getItem('cart'));
		if(cart==null){
			console.log('The cart is empty')
			new_cart={}
			new_cart[Id]={id:Id,name:ItemName,amount:1,image:Image,unit_price:price};
			localStorage.setItem('cart',JSON.stringify(new_cart))
		}
		else{
			item=cart[Id];
			if(item==null){
				console.log('item has not been found');
				cart[Id]={id:Id,name:ItemName,amount:1,image:Image,unit_price:price};
				localStorage.setItem('cart',JSON.stringify(cart))
				console.log(localStorage)
			}
			else{
				console.log(item['name'],item['amount']);
				quantity_desired=item['amount']+1
				item['amount']=quantity_desired
				item['unit_price']=price
				cart[Id]=item
				localStorage.setItem('cart',JSON.stringify(cart))
				console.log(localStorage)
			}
		}
        calculate_item_count();
	}
	
	
	function View_cart_items(){
		cart=JSON.parse(localStorage.getItem('cart'));
		if(cart==null){
			console.log('The cart is empty')
		}
		else{
			for (const [id, item] of Object.entries(cart)) {
				console.log(id, item['name'],item['amount']);
			}
		}		
	}


    function calculate_item_count(){
		var Total=0;
		cart=JSON.parse(localStorage.getItem('cart'));
		if(cart==null){
			console.log('The cart is empty')
		}
		else{
			for (const [id, item] of Object.entries(cart)) {
				Total=Total+item['amount'];
			}
		}
		console.log(Total)
		document.getElementById('item-count').textContent=Total
	}


    window.onload= function () {
		calculate_item_count();
	}
</script>










