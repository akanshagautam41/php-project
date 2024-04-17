<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="css/tiny-slider.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<title>Furni Free Bootstrap 5 Template for Furniture and Interior Design Websites by Untree.co </title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	</head>

	<body>

    <?php
include_once('header.php');
?>
		 <!-- End Header/Navigation -->
		<div class="untree_co-section product-section before-footer-section">
		    <div class="container">
		      	<div class="row">

		<!-- Start Hero Section  -->
			<div class="container align-items-center text-center" >
            <div class="col-12  mb-5 border border-3 border-secondary m-6 ">

		

<div class="container">
	
<h1>Product Cart</h1>
<table class="table ">
    <thead>
      <tr>
        <th>Image</th>
        <th>Product Name</th>
        <th>Price</th>
		<th>Product description</th>
		<th>Quantity</th>
		<th>Remove</th>
		<th>Subtotal</th>
      </tr>
    </thead>
    <tbody>
   
	<?php
	
	if(!empty($user_cart))
	{
		foreach($user_cart as $u)
		{
			?>
			<tr>
			<td>image</td>
			<td><?php echo $u->prd_name; ?></td>
			<td><?php echo $u->prd_price; ?></td>
			<td><?php echo $u->prd_description; ?></td>
			<td><?php echo $u->qty; ?></td>
			<td>
			<a href="deleteCart?delId=<?php echo $u->cart_id;?>">
			<i class="fa-solid fa-trash"></i>
			</a>
			</td>
			<td>
			<?php
				$price = $u->prd_price;
				$qty = $u->qty;
			echo  $subtotal = $price*$qty . " INR";
			$arr[] = $subtotal;
								
			

			?>
		</td>
			
		  </tr>
	<?php 	}
	}
	?>


	<tr>
		<td>
		<b>
		<?php echo "Total : INR ";
				print_r(array_sum($arr));?>
		</b>
		</td>
	</tr>

	<tr>
		<td>
		<a href="checkout" class="btn btn-primary">Produced To Buy</a>
		</td>
	</tr>
      
    </tbody>
  </table>
</div>


		




            </div>
            </div>
                </div>
            </div>
        </div>
        
		<?php
include_once('footer.php');
?>
</body>
</html>