<?php
error_reporting(0);

$con = new mysqli("localhost","root","","ecom");

// $id = $_GET['del_id'];
$id = $_REQUEST['del_id'];

echo $id;


$sql = "delete from users where id =$id";
$delete= $con->query($sql);

if($delete)
{
    
    header("location:form.php");
}
?>