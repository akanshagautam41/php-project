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

foreach($user_cart as $u)
{

    $price = $u->prd_price;
    $qty = $u->qty;
  $subtotal = $price*$qty . " INR";
$arr[] = $subtotal;


}



?>

<?php include 'header.php';?>




<div class="bg-secondary m-5">
<div class="container p-5">

<div class="row justify-content-center text-center">
    <div class="col-6">
    <form action="addcart?btn_add_cart" method="post">
  <div class="card ">
    <img class="card-img-top" src="../bootstrap4/img_avatar1.png" alt="Card image" style="width:100%">
    <div class="card-body p-5">
      <form >
        <div class="form-group" >
          <label >Name : </label>
          <div>
            <input type="text" id="name" name="name" readonly value="<?php echo $_SESSION['fname'] ?>" >
          </div>
          <label >Amount : </label>
          <div>
            <input type="text" id="amount" name="amount" readonly value="<?php print_r(array_sum($arr));?>" >
          </div>
        </div>
       
       
        <input type="button" name="button" onclick="MakePayment()" class="btn btn-primary" value="Pay Now"/>
      
    </div>
  </div>
   <!-- <button onclick="makepayment()" >Pay</button> -->
   
      </form>
     
     
      <!-- <input type="submit" class="btn btn-primary" value="Pay Now"> -->

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>

function MakePayment()
  {

    var name = $("#name").val();
    var amount = $("#amount").val();

  var options = {
    "key": "rzp_test_Wch1kPWtVWFDjr", // Enter the Key ID generated from the Dashboard
    "amount": amount *100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": name, //your business name
    "description": "Test Transaction",
    "image": "https://www.onlinelogomaker.com/blog/wp-content/uploads/2017/11/furniture-logo.jpg",
    // "order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){
      console.log(response.razorpay_payment_id)

      $.ajax({
        type:"post",
        url:"payment",
        data: "pay_id =" + response.razorpay_payment_id + "&amount =" + amount + "&name =" + name,

        success:function(result){
          window.location.href = "success"
        }
      })
    },
    "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information, especially their phone number
        "name": "Gaurav Kumar", //your customer's name
        "email": "gaurav.kumar@example.com", 
        "contact": "9000090000"  //Provide the customer's phone number for better conversion rates 
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){
        alert(response.error.code);
        alert(response.error.description);
        alert(response.error.source);
        alert(response.error.step);
        alert(response.error.reason);
        alert(response.error.metadata.order_id);
        alert(response.error.metadata.payment_id);
});

    rzp1.open();

}
</script>

    </div>
</div>

</form>
</div>
</div>

<?php 
		include 'footer.php';
		?>

<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
	</body>

</html>