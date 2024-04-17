

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

        if(isset($_SESSION['uid']))
		{
		$uid=$_SESSION['uid'];
		$where=array("u_id"=>$uid);
		$cate_arr=$this->select_where_multidata('cart',$where);
			if(!empty($cate_arr))
			{
			$total_cart = count($cate_arr);
			}
		}

       $cate_arr = $this->select('category');
       
        switch($url)
        {
         
            case "/index":
            include "index.php";
            break;

            case "/about":
                include "about.php";
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
               $uid = $fetch->u_id;

                // $_SESSION['unm'] = $uemail;
                $_SESSION['fname']= $ufname;
                $_SESSION['lname']= $ulname;
                $_SESSION['uid']= $uid;

                if($uemail==$email && $upassword==$pass)
                                              {
                echo "<script>alert('Welcome user.....!')
                                                
                window.location = 'index';
                </script>";
                //   header("location:index");
                }
                else 
                {
                 echo "<script> alert('Invalid Password/Email......!');</script>";
                }
                
                    }
                    echo "<script>
                        function preventBack() { 
                            window.history.forward();  
                        } 
                        
                      
                        
                        window.onunload = preventBack(); 
                        </script>";

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

         case '/logout':

                            unset($_SESSION['fname']);
                            unset($_SESSION['lname']);
                            unset( $_SESSION['uid']);
                            echo "<script>  
                            alert('Logout Success ');
                                    window.location='index';
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

                    case "/subcategory":
               if(isset($_REQUEST['btn_cate_id']))
               {
                $cate_id = $_REQUEST['btn_cate_id'];
                $where = array(
                    "cate_id"=>$cate_id
                );
                $subcate_arr = $this->select_where_multidata('subcategory',$where);

               }
                  
include "subcategory.php";
                    break;

                    case "/products":

                        if(isset($_REQUEST['btn_subcate_id']))
               {
                $subcate_id = $_REQUEST['btn_subcate_id'];
                $where = array(
                    "subcate_id"=>$subcate_id
                );
                $prd_arr = $this->select_where_multidata('product',$where);

               }
                        include "products.php";
                        break;

                        case "/single-product":

                            if(isset($_REQUEST['btn_prd_id']))
                            {
                               $pid = $_REQUEST['btn_prd_id'];

                               $where = array("prd_id"=>$pid);
                              $prd_arr=$this->select_join_where_multidata('product','category','product.cate_id=category.cate_id',$where);

                            }
                               include "single-product.php";
                               break;

                             case "/addcart":
                                if(isset($_SESSION['uid']))
                                    {
                                        
                                        if(isset($_REQUEST['btn_add_cart']))
                                        {
                                            $uid=$_SESSION['uid'];
                                            $pro_id=$_REQUEST['prd_id'];
                                            $pro_qty=$_REQUEST['prd_qty'];

                                            $cate_id = $_REQUEST['cate_id'];;

                                            	
                                            $where = array(
                                                "u_id"=>$uid,
                                            "prd_id"=>$pro_id
                                        );

                                            $res=$this->select_where('cart',$where);
					                        $fetch=$res->fetch_object();
                                          
                                                                                    
                                          if(!empty($fetch))
                                          { 
                                            $dbQty = $fetch->qty;

                                            $main_qty =$pro_qty+$dbQty;
                                            $data = array(
                                                'qty'=>$main_qty
                                            );
                                            $update = $this->update('cart',$data,$where);
                                            if($update)
                                            {
                            
                                                echo "<script>
                                                alert('Product Add Success');
                                                 window.location='products?btn_subcate_id=$cate_id';
                                                </script>";
                                            }

                                          }
                                          else
                                          {
                                            $data=array(
                                                "prd_id"=>$pro_id,
                                                "qty"=>$pro_qty,
                                                "u_id"=>$uid
                                            );
                                            $res_ins=$this->insert('cart',$data);
                                            if($res_ins)
                                            {
                            
                                                echo "<script>
                                                alert('Product Add Success');
                                                 window.location='products?btn_subcate_id=$cate_id';
                                                </script>";
                                            }
                                          }

                                        }
                                    }
                                    else 
                                    {
                                        echo "<script> 
                                        alert('Please login first...! ');
                                        window.location='login';
                                    </script>";
                                        
                                    }
                                    

                                    include "single-product.php";
                                    break;

            case '/cart';
			if(isset($_SESSION['uid']))
			{
				$uid=$_SESSION['uid'];
				$where=array(
                    "u_id"=>$uid
                );
				$user_cart=$this->select_join_where_multidata('cart','product','cart.prd_id=product.prd_id',$where);
			}
            include_once('cart.php');
			break;
			
            case '/checkout':
			if(isset($_SESSION['uid']))
			{
				$uid=$_SESSION['uid'];
				$where=array(
                    "u_id"=>$uid
                );
				$user_cart = $this->select_join_where_multidata('cart','product','cart.prd_id=product.prd_id',$where);
			}
			
			
			include_once('checkout.php');
			break;

            case "/payment":
            if (isset($_POST['pay_id']) && isset($_POST['name']) && isset($_POST['amount'])) {
                    $pay_id = $_POST['pay_id'];
                    $name = $_POST['name'];
                    $amount = $_POST['amount'];

                    $data = array(
                        "pay_id" => $pay_id,
                        "name" => $name,
                        "amount" => $amount,
                        "pay_status" => "success"
                    );
                    $res =  $this->insert('payment', $data);
       
       }

    
       break;

       
       case "/emptycart":

                            if(isset($_SESSION['uid']))
        			{
        				$uid = $_SESSION['uid'];
        				$where=array(
                            "u_id"=>$uid
                        );
                        $res = $this->delete_where('cart',$where);
                        if($res)
        {
            $total_cart = 0;
            echo $total_cart;
        }
    }
    include "emptycart.php";
    break;

        

            case "/success":
			
                echo "<script>
            alert('payment done !...');
            window.location = 'emptycart';
            </script>";

            include "success.php";
			break;


            case "/deleteCart":

                if(isset($_REQUEST['delId']))
                {
                    $cart_id = $_REQUEST['delId'];
                    $where = array(
                        "cart_id"=>$cart_id
                    );

                    $re = $this->delete_where('cart',$where);

                    if($re){
                        echo "<script>
                        alert('remove product');
                        window.location='cart';
                        </script>";
                    }

                }

                
                break;

                    case "/thankyou":
                    include "thankyou.php";
                    break;

    }
}


}

$obj = new Control;
?>