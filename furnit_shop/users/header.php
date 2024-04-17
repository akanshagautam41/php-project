

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

<div class="container">
    <a class="navbar-brand" href="/index">Furni<span>.</span></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsFurni">
        <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
            <li class="nav-item active">
                <a class="nav-link" href="index">Home</a>
            </li>


            <?php

foreach($cate_arr as $cate)
{
   
?>


            <li><a class="nav-link"  href="subcategory?btn_cate_id=<?php echo $cate->cate_id?>" >
                <?php echo $cate->cate_name ?></a></li>

            <?php }?>


            <li><a class="nav-link" href="about">About us</a></li>
            <!-- <li><a class="nav-link" href="services">Services</a></li>
            <li><a class="nav-link" href="blog">Blog</a></li> -->
            
            
           <!-- <li class="nav-item"><a href="subcategory" class="nav-link"> subcategory</a></li>

<li class="nav-item"><a href="products" class="nav-link"> Products</a></li> -->
<ul class="custom-navbar-cta navbar-nav mb-1 mb-md-0 ms-5">
           
            <li><a class="nav-link" href="cart"><img src="images/cart.svg"><b>
            <?php
              if(isset($_SESSION['uid']))
              {

                if(empty($total_cart))
                {
                    echo "0";
                }
            
                else {
                    echo $total_cart;
                }
              
                }
              ?>
              </b>
               </a></li>
       </ul>
        
        <li><a class="nav-link" href="register">Register</a></li>
            <?php

if (!isset( $_SESSION['uid'])) { ?>
  <li class="nav-item"><a href="login" class="nav-link">Login</a></li>

<?php } else {
?>
        <li><a class="nav-link" href="logout">Logout</a></li>
        <li><a class="nav-link" href="">Welcome <?php echo $_SESSION['fname']. " " .$_SESSION['lname']?></a></li>
     <?php } ?>
     <li><a class="nav-link" href="../admin/index"><button>Admin Login</button></a></li>
           

            
            
        </ul>

        
    </div>
</div>
    
</nav>
</body>
</html>