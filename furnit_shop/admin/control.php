<?php

require "model.php";
class control extends model
{

    function __construct()
    {

        error_reporting(0);
        model::__construct();
        session_start();
        $url = $_SERVER['PATH_INFO'];

        switch ($url) {
            case "/index":
                if (isset($_REQUEST['submit'])) {
                    $username = $_REQUEST['username'];
                    $password = $_REQUEST['password'];



                    if(!empty($_POST["remember"])) {
                        setcookie ("username",$username,time()+ 10);
                        setcookie ("password",$password,time()+ 10);

                    }


                    $where = array(
                        "username" => $username,
                        "password" => $password
                    );
                    $res = $this->select_where("admin", $where);

                    $fetch = $res->fetch_object();

                    $uname = $fetch->username;
                    $upass = $fetch->password;

                    $_SESSION['uname'] = $uname;

                    if ($username == $uname && $upass == $password) {

                        echo "<script> alert('Welcome Admin.....!');
                                    window.location = 'dashboard';
                    </script>";

                    } else {
                        echo "<script> alert('Invalid Password/username......!');</script>";
                    }
                }

                // echo "<script>
                // function preventBack() { 
                //     window.history.forward();  
                // } 



                // window.onunload = preventBack(); 
                // </script>";
                include "index.php";

                break;

            case '/dashboard':


                include "dashboard.php";
                break;


            case '/logout':

                unset($_SESSION['uname']);

                echo "<script>                          
                       
    
                                    alert('Logot Success ');
                                    window.location='index';
                                </script>";
                break;

            

            case '/adduser':

                if(isset($_REQUEST['create']))
                {                          
                    $fname = $_REQUEST['firstname'];
                    $lname =  $_REQUEST['lastname'];
                    $email =  $_REQUEST['email'];
                    $pass =  $_REQUEST['password'];
                    $where = array(
                        "email"=>$email
                    );                    
                    $res = $this->select_where("users",$where);

                   $fetch =  $res->fetch_object();
                   $uemail= $fetch->email;

                    if($email==$uemail)
                    {                           
                       echo "<script>alert('already exits...!')</script>";//ankit@gmail.com                          
                    }

                    else
                    {                     

                       $data = array(
                        "firstname"=>$fname,
                        "lastname"=>$lname,
                        "email"=>$email,
                        "password"=>$pass                
                        
                       );

                       if($fname!=="")
                       {
                        $ins =   $this->insert('users',$data);
                      if($ins)
                      {
                        echo "<script> alert('Records Inserted...!');</script>";
                      }
                    }
                    }
                }
            
             
             

                include "adduser.php";
                break;

            case '/viewuser':

                $user_arr = $this->select("users");
                include "viewuser.php";
                break;
                

                case '/add-category':

                    if(isset($_REQUEST['create']))
                    {
                     $cateName = $_REQUEST['cate_name'];
 
                     $data = array(
                         "cate_name"=>$cateName
                     );
                    $ins =  $this->insert('category',$data);
 
                    if($ins)
                    {
                     echo "
                     <script>
                     alert('Category Added...!')
                     </script>";//anki
                    }
                    }
                     include "category.php";
                     break;

                    case '/add-subcategory':

                        include "subcategory.php";
                        break;

                        case '/add-product':

                          
                            include "product.php";
                            break;
                            case '/edit':
                                if($_REQUEST['editId'])
                                {
                                 $id = $_REQUEST['editId'];
                                 $where = array(
                                     "user_id"=>$id
                                 );
         
         
                                 $run = $this->select_where("users",$where);
         
                                 $fetch = $run->fetch_object();
                                 // echo $fetch->name;
         
                                 if(isset($_REQUEST['submit']))
                                 {
                                     $firstname = $_REQUEST['fname'];
                                     $lastname = $_REQUEST['lname'];
                                     $email = $_REQUEST['em'];
                                     $pass = $_REQUEST['pwd'];
                                     
                 
                                     $data = array(
                                         "firstname"=>$firstname,
                                         "lastname"=>$lastname,
                                         "email"=>$email,
                                         "password"=>$pass,
                                         
                                         
                                     );
                 
                                    $res =  $this->update("users",$data,$where);
                                    if($res)
                                    {
                                     echo "
                                     
                                     <script>
                                     alert('data updated...!');
                                     window.location='viewuser';
                                     </script>
                                     ";
                                    }
                                 }
         
                                }
                                 
                          
                                include "edit.php";
                                break;
                                
                                    case '/delete':

                          
                                        include "delete.php";
                                        break;



        }
    }
}

$obj = new control;