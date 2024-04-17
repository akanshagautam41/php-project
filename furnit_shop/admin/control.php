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
                    $fetch =  $ins->fetch_object();
                    $ucate_name = $fetch->cate_name;
 
                    if($ucate_name)
                    {
                     echo "
                     <script>
                     alert('Category Added...!')
                     window.location = 'dashboard.php'; 
                     </script>";
                    }
                    }
                     include "category.php";
                     break;

                    case '/add-subcategory':

                        if(isset($_REQUEST['create']))
                    {
                     $subcateName = $_REQUEST['subcate_name'];
 
                     $data = array(
                         "subcate_name"=>$subcateName
                     );
                    $ins =  $this->insert('subcategory',$data);
                  

 
                    if($ins)
                    {
                     echo "
                     <script>
                     alert('subCategory Added...!')
                     </script>";
                    }
                    }

                        include "subcategory.php";
                        break;

                        case '/add-product':

                          
                            include "product.php";
                            break;

                            case '/view-product':
                                $prd_arr = $this->select("product");
                          
                                include "viewproduct.php";
                                break;

                            case '/edit':
                                if($_REQUEST['editId'])
                                {
                                 $id = $_REQUEST['editId'];
                                 $where = array(
                                     "u_id"=>$id
                                 );
         
         
                                 $run = $this->select_where("users",$where);
         
                                 $fetch = $run->fetch_object();
                                 // echo $fetch->name;
         
                                 if(isset($_REQUEST['submit']))
                                 {
                                     $firstname = $_REQUEST['fname'];
                                     $lastname = $_REQUEST['lname'];
                                     $email =  $_REQUEST['email'];
                                     $pass =  $_REQUEST['password'];
                                     
                 
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
                                
                                case "/delete":
                                    if(isset($_REQUEST['deleteId']))
                                    {
                                        $id= $_REQUEST['deleteId'];
                                        $where = array(
                                            "u_id"=>$id
                                        );
        
                                        $res = $this->delete_where("users",$where);
                                        if($res)
                                        {
                                         echo "
                                         
                                         <script>
                                         alert('data deleted...!');
                                         window.location='viewuser';
                                         </script>
                                         ";
                                        }
                                    }

                                    
                                        case "/deleteproduct":

                                            if(isset($_REQUEST['delId']))
                                            {
                                                $prd_id = $_REQUEST['delId'];
                                                $cate_id = $_REQUEST['delId'];
                                                $subcate_id = $_REQUEST['delId'];

                                                $where = array(
                                                    "prd_id"=>$prd_id,
                                                    "cate_id"=>$cate_id,
                                                    "subcate_id"=>$subcate_id,
                                                );
                            
                                                $re = $this->delete_where('product',$where);
                            
                                                if($re){
                                                    echo "<script>
                                                    alert('remove product');
                                                    window.location='view-product';
                                                    </script>";
                                                }
                            
                                            }
                            
                                            
                                            break;

        


        }
    }
}

$obj = new control;