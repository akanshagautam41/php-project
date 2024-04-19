<?php

error_reporting(0);

$con = new mysqli("localhost","root","","ecom");

// $id = $_GET['id'];
$id = $_REQUEST['id'];

// echo $id;

$fname = $_REQUEST['fnm'];
$lname = $_REQUEST['lnm'];
$email = $_REQUEST['em'];
$pass = $_REQUEST['pwd'];
$cpass = $_REQUEST['cpwd'];
$gen = $_REQUEST['gender'];
$hby = $_REQUEST['chk'];


$sql = "update users set fname='$fname' where id =$id";
$edit= $con->query($sql);

if($edit)
{
    header("location:form.php");
}
?>

<form method="post" enctype="multipart/form-data">

Firstname: <input name="fnm" id="fnm"><br>
Lastname: <input name="lnm" id="lnm"><br>
Email: <input name="em" id="em"><br>
Password: <input  name="pwd" id="pwd"><br>
Confirm Password: <input name="cpwd" id="cpwd"><br>
Gender: <input type="radio" Name="gender" id="m" value="male" >Male
 <input type="radio" name="gender" id="f" value="female">Female
 
 <br>

<br>
Hobbies:
 <input type="checkbox" name="chk[]" value="music"> Music
 <input type="checkbox" name="chk[]" value="Football" > Football
 <input type="checkbox" name="chk[]" value="Games"> Games
 
 <br>
Upload an Image: <input type="file" name="file" id="file"><br>
 <input type="submit" name="sub" onclick="return validateForm()"><br>



</form>