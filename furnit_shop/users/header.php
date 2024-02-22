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
            <li><a class="nav-link" href="shop">Shop</a></li>
            <li><a class="nav-link" href="about">About us</a></li>
            <li><a class="nav-link" href="services">Services</a></li>
            <li><a class="nav-link" href="blog">Blog</a></li>
            <li><a class="nav-link" href="register">Register</a></li>

            <?php
if(!isset($_SESSION['fname']))
   { ?>
<li><a class="nav-link" href="login">Login</a></li>
      <?php } else{ ?>
        <li><a class="nav-link" href="logout">Logout</a></li>
        <li><a class="nav-link" href="logout">Welcome <?php echo $_SESSION ['fname']." " .$_SESSION['lname']?></a></li>
     <?php } ?>
     <li><a class="nav-link" href="../admin/index">Admin</a></li>
           

            
            
        </ul>

        <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
            <li><a class="nav-link" href="#"><img src="images/user.svg"></a></li>
            <li><a class="nav-link" href="cart"><img src="images/cart.svg"></a></li>
        </ul>
    </div>
</div>
    
</nav>