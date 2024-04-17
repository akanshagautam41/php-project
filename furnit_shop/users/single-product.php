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
	</head>

	<body>

		
		<?php 
		include 'header.php';
		?>
		<!-- End Header/Navigation -->

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Shop</h1>
							</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		

		<div class="untree_co-section product-section before-footer-section">
		    <div class="container">
		      	<div class="row">

		      		<!-- Start Column 1 -->
                      <div class="container m-3" >
            <div class="row justify-content-between ">
			<?php
    foreach ($prd_arr as $prd) {
    ?>



   
      <div class="col-md-4">
      <div class="card" style="width:400px">
      <a href="single-product?btn_prd_id=<?php echo $prd->prd_id ?>">
  <img class="card-img-top" src="images/product-1.png" alt="Card image" style="width:100%">
    </a>
  <div class="card-body">
  <form action="addcart?btn_add_cart" method="post">

    <h4 class="card-title">
      <a href="single-product?btn_prd_id=<?php echo $prd->prd_id ?>">
      <?php echo $prd->prd_name ?>
    </a>
  </h4>
    <p class="card-text"><?php echo $prd->prd_price ?></p>
    
    <input type="hidden" name="cate_id" value="<?php echo $prd->cate_id;?>">
						 <input type="hidden" name="prd_id" value="<?php echo $prd->prd_id;?>">
								                          
										Quantity: <input type="number" name="prd_qty" min="1" max="5" value="1">
                    <input type="submit" value="Add to Cart" class="btn btn-primary">
  </form>
  
  </div>
</div>
      </div>



   
   


    <?php } ?>
</div>
        </div>
 
					

		      	</div>
		    </div>
		</div>


		
            </p>
						</div>

						<div class="col-lg-6 text-center text-lg-end">
							<ul class="list-unstyled d-inline-flex ms-auto">
								<li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>

					</div>
				</div>

			</div>
		<!-- </footer>  -->
		<?php 
		include 'footer.php';
		?>
		<!-- End Footer Section -->	


		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
	</body>

</html>
