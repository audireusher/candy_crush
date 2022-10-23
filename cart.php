<?php

@include 'connection.php';

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
   if($update_quantity_query){
      header('location:cart.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
   header('location:cart.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart`");
   header('location:cart.php');
}


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
    <link rel="stylesheet" type="text/css" href="cart.css">
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
                        <a href="product.php" class="nav-item nav-link">Cart</a>
                    </div>
                    <a href="index.php" class="navbar-brand mx-5 d-none d-lg-block">
                        <h1 class="m-0 display-4 text-primary"><span class="text-secondary">c</span>ANDY <span class="text-secondary">r</span>USH</h1>
                    </a>
                    <div class="navbar-nav mr-auto py-0">
                        <a href="registration.php" class="nav-item nav-link">Signup</a>
                        <a href="gallery.php" class="nav-item nav-link">Gallery</a>
                        <a href="contact.php" class="nav-item nav-link">Contact</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


<section class="shopping-cart">
    <table>

      <thead>
         <th>image</th>
         <th>name</th>
         <th>price</th>
         <th>quantity</th>
         <th>total price</th>
         <th>action</th>
      </thead>

      <tbody id='cart_items'>
      </tbody>    

   </table>

   <div class="checkout-btn">
   <form  method='POST' action='functions/AddOrder.php' onsubmit='clear_cart()'>
        <input style='display:none;' id='user_order' name='user_order'>
        <button type='submit' class="btn">proceed to checkout</button>
    </form>
   </div>
</section>



</body>

<script>
    function display_item(id, name,image,amount,unit_price){
        a=document.getElementById("cart_items")
        row=document.createElement('tr')
        
        img=document.createElement('img')
        img.src=image
        img_cell=document.createElement('td')
        img_cell.height='100'
        img_cell.alt=''
        img.style='height:100%;'
        img_cell.appendChild(img)

        name_cell=document.createElement('td')
        name_cell.height='100'
        name_cell.alt=""
        name_cell.textContent=name


        price_cell=document.createElement('td')
        price_cell.height='100'
        price_cell.alt=""
        price_cell.textContent="KSH"+String(unit_price)

        quantity_cell=document.createElement('td')
        quantity_cell.height='100'
        quantity_cell.alt=""
        quantity_value_input=document.createElement('input')
        quantity_value_input.type='number'
        quantity_value_input.style='width:30%;'
        quantity_value_input.value=amount
        quantity_cell.appendChild(quantity_value_input)
        
        totals_cell=document.createElement('td')
        totals_cell.height='100'
        totals_cell.alt=""
        totals_cell.textContent='KSH '+String(unit_price*amount)

        remove_cell=document.createElement('td')
        remove_cell.height='100'
        remove_cell.alt=""
        rmv_button=document.createElement('a')
        rmv_button.className="delete-btn"
        style_component=document.createElement('i')
        style_component.className='fas fa-trash'
        rmv_button.textContent='remove'
        remove_cell.appendChild(rmv_button)

        row.appendChild(img_cell)
        row.appendChild(name_cell)
        row.appendChild(price_cell)
        row.appendChild(quantity_cell)
        row.appendChild(totals_cell)
        row.appendChild(remove_cell)
        a.appendChild(row)
    }


    function totals_row(totals){
        a=document.getElementById("cart_items")
        row=document.createElement('tr')
        row.className="table-bottom"
        row.innerHTML="<td><a href='product.php' class='option-btn' style='margin-top: 0;'>continue shopping</a></td><td colspan='3'>grand total</td><td>KSH"+String(totals)+"/-</td><td><a href='cart.php?delete_all' onclick='return confirm("+"'are you sure you want to delete all?'"+");' class='delete-btn'> <i class='fas fa-trash'></i> delete all </a></td>"
        a.appendChild(row)
    }



    function AddCartItem(Id,ItemName,Image){
		cart=JSON.parse(localStorage.getItem('cart'));
		if(cart==null){
			console.log('The cart is empty')
			new_cart={}
			new_cart[Id]={id:Id,name:ItemName,amount:1,image:Image};
			localStorage.setItem('cart',JSON.stringify(new_cart))
		}
		else{
			item=cart[Id];
			if(item==null){
				console.log('item has not been found');
				cart[Id]={id:Id,name:ItemName,amount:1,image:Image};
				localStorage.setItem('cart',JSON.stringify(cart))
				console.log(localStorage)
			}
			else{
				console.log(item['name'],item['amount']);
				quantity_desired=item['amount']+1
				item['amount']=quantity_desired
				cart[Id]=item
				localStorage.setItem('cart',JSON.stringify(cart))
				console.log(localStorage)
			}
		}
	}
	
	
	function View_cart_items(){
		cart=JSON.parse(localStorage.getItem('cart'));
		if(cart==null){
			console.log('The cart is empty')
		}
		else{
			for (const [id, item] of Object.entries(cart)) {
				display_item(id, item['name'],item['image'],item['amount'],item['unit_price']);
			}
		}		
	}
	
	function calculate_total(){
		var Total=0;
		cart=JSON.parse(localStorage.getItem('cart'));
		if(cart==null){
			console.log('The cart is empty')
		}
		else{
			for (const [id, item] of Object.entries(cart)) {
				Total=Total+(item['unit_price']*item['amount'])
			}
		}
		console.log(Total)
		totals_row(Total)
	}
	
	
	
	function clear_cart(){
		localStorage.removeItem('cart');
	}
	
	
	window.onload= function () {
		View_cart_items();
		calculate_total();
		document.getElementById('user_order').value=localStorage.getItem('cart')
	}

</script>

</html>