<?php 

$con = new mysqli("localhost","root","","ecom");



if(isset($_POST['sub']))
{
   $fname =  $_POST['fnm'];
   $lname =  $_POST['lnm'];
   $email = $_POST['em'];
   $pass =  $_POST['pwd'];
   $cpass =  $_POST['cpwd'];
   $gen =  $_POST['gender'];

     $ch =$_POST['chk'];  

     $hbk="";
     foreach($ch as $akansha)
    {
        $hbk = $hbk. $akansha.",";
    }

    

   $file = $_FILES["file"]["name"];
   $temp_file = $_FILES["file"]["tmp_name"];
   $location = "images/".$file;
    move_uploaded_file( $temp_file,$location);

// move_uploaded_file(file,location);


   $sql = "insert into users (fname,lname,email,password,confirm_pwd,gender,hobby,image)
   values('$fname','$lname','$email','$pass','$cpass','$gen','$hbk',' $file')";

   $ins = $con->query($sql);  


   

   if($ins)
   {
    echo ' <script>
    alert("Records Inserted...!")
</script>';
   }
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

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

    <h1> DATABASE RECORDS </h1>

    <table border="1" cellspacing="0" cellpadding="5px">
        <tr>
            <td>ID</td>
            <td>Firstname</td>
            <td>Lastname</td>
            <td>Email</td>
            <td>Password</td>
            <td>confirm_pwd</td>
            <td>Gender</td>
            <td>HObbies</td>
            <td>Image</td>
            <td>Actions</td>

        </tr>

        <?php
        
        $fetch="select * from users";
        $res = $con->query($fetch); 

        while($row = mysqli_fetch_array($res))
        {

        
        
        ?>

        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['fname'] ?></td>
            <td><?php echo $row['lname'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['password'] ?></td>
            <td><?php echo $row['confirm_pwd'] ?></td>
            <td><?php echo $row['gender'] ?></td>
            <td><?php echo $row['hobby'] ?></td>
            <td>
                <img src="images/<?php echo $row['image'] ?>" height="100px"/>
            </td>
            <td>
                <a href="edit.php?id=<?php echo $row['id']; ?>"><button>Edit</button></a>
                <a href="delete.php?del_id=<?php echo $row['id']; ?>"><button>Delete</button></a>
            </td>

        </tr>

       <?php  } ?>
    </table>

   
    <script>

fname=  document.getElementById('fnm');
lname=  document.getElementById('lnm');
email=  document.getElementById('em');

image=  document.getElementById('file');
       pass=  document.getElementById('pwd');
    cpass = document.getElementById('cpwd');


    gen = document.getElementsByName('gender');
    console.log(gen[1])

    function validateForm()
    {

        if(fname.value =="")
        {
            alert("Firstname required...!");
            return false;
        }

        if(lname.value =="")
        {
            alert("Lastname required...!");
            return false;
        }

        if(email.value =="")
        {
            alert("email required...!");
            return false;
        }

        if(pass.value =="")
        {
            alert("password required...!");
            return false;
        }


        

        if(pass.value != cpass.value)
        {
            alert("Passwords do not match..!");
            return false;
        }

        if(gen[0].checked == false && gen[1].checked== false)
        {
            alert("select gender...!");
            return false;
        }

        if(file.value =="")
        {
            alert("select at least 1 file...!");
            return false;
        }
    }

  
    </script>



    
</body>
</html>