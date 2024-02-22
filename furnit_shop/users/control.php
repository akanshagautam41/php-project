

<?php

require "model.php";
class Control extends model
{

    function __construct()
    {
        error_reporting(0);
        session_start();
        model::__construct();
        $url = $_SERVER['PATH_INFO'];

        switch($url)
        {
         
            case "/index":
            include "index.php";
            break;

            case "/about":
                include "about.php";
                break;

                case "/blog":
                    include "blog.php";
                    break;
                    
                case "/cart":
                include "cart.php";
                break;

                case "/checkout":
                include "checkout.php";
                break;

                case "/login":
                if(isset( $_REQUEST['create']))
                {

                  $email =  $_REQUEST['email'];
                  $pass =  $_REQUEST['password'];

                  if(!empty($_POST['remember']))
				  {
					  setcookie('username',$email,time()+10);
					  setcookie('password',$pass,time()+ 10);

				  }
                  $where = array(
                  "email"=>$email,
                 "password"=>$pass
                                    );
                $res = $this->select_where('users',$where);
     
                $fetch = $res->fetch_object();
                $uemail = $fetch->email; 
                $upassword = $fetch->password; 
               $ufname = $fetch->firstname;
               $ulname = $fetch->lastname;

                $_SESSION['unm'] = $uemail;
                $_SESSION['fname']= $ufname;
                $_SESSION['lname']= $ulname;

                if($uemail==$email && $upassword==$pass)
                                              {
                echo "<script>alert('Welcome user.....!')
                                                
                window.location = 'index';
                </script>";
                //   header("location:index");
                }
                echo "<script>
                function test()
                {
                    history.forward();
                }
                test()
                </script>";
                    }
                include "login.php";
                break;

                case "/register":
                            
                if(isset( $_REQUEST['create']))
             {
                 $fname =  $_REQUEST['firstname'];
                $lname =  $_REQUEST['lastname'];
                $email =  $_REQUEST['email'];
                 $pass =  $_REQUEST['password'];
                 $where = array(
                 "email"=>$email
                                 );
                 $res = $this->select_where("users",$where);
     
                $fetch = $res->fetch_object();
                 $uemail = $fetch->email; 
                                            

                if($email==$uemail)
                {
                 echo "
                    <script>
                    alert('alerdy exit...')
                     </script>
                        " ; 
                        }
                        else{
                                            
          
                        $data = array(
                         "firstname"=>$fname,
                        "lastname"=>$lname,
                        "email"=>$email,
                        "password"=>$pass
                                    );
                                           
          
                    if($fname!==""){
                    $ins = $this->insert('users',$data);

                    if($ins)
                        {
                        echo "<script>alert('Records inserted.....!')</script>";
                        }
                         }
                            }
                            }
                                   
            include "register.php";
            break;

         case "/logout":
            unset($_SESSION['unm']);
            echo "<script>alert('logout succesfully.....!')
                                                
             window.location = 'login';
            </script>";
             break;

             case "/forgot_pass":
             if(isset( $_REQUEST['create']))
                {
        
                $email =  $_REQUEST['email'];
                $pass =  $_REQUEST['password'];
                $cpassword =  $_REQUEST['cpassword'];
                                                    
                $where = array(
                "email"=>$email
                                );

                 $res = $this->select_where("users",$where);
                 $fetch = $res->fetch_object();
                 $uemail =  $fetch->email;

                 if($uemail != $email )
                 {
                  echo "<script>
                  alert('We dont have this record in our database.....!');
                  window.location='login';
                  
                  </script>";
                 }

                 else if($pass!=$cpassword)
                 {
                  echo "<script>
                  alert('Passwords do not match....!');
                  window.location='login';
                  
                  </script>";
                 }

                 else
                 {
                  $data = array(
                      "password"=>$pass
                  );

                 $update =  $this->update("users",$data,$where);
                 if($update)
                 {
                  echo "<script>
                  alert('Password updated......!');
                  window.location='login';
                  
                  </script>";
                 }
                    }

                    }
                    include "forgot_pass.php";
                    break;

                    case "/services":
                    include "services.php";
                     break;

                    case "/shop":

                        
                    include "shop.php";
                    break;

                    case "/thankyou":
                    include "thankyou.php";
                    break;

    }
}


}

$obj = new Control;
?>