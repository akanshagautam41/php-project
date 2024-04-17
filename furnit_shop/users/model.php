
<?php

class model 
{
    public $conn="";
    function __construct()
    {
       $this->conn =  new mysqli("localhost","root","","furnit_shop");

    
    }

    function select($tbl)
	{
		$sel="select * from $tbl";	 
		$run=$this->conn->query($sel);  
		while($fetch=$run->fetch_object()) 
		{
			$arr[]=$fetch;
		}
		if(!empty($arr))
		{
			return $arr;
		}
	}

    function insert($table,$data)  
    {
       $col_arr= array_keys($data);
       $col = implode(",", $col_arr);

       $val_arr = array_values($data);
       $val = implode("','",$val_arr);

     
       $query = "insert into $table ($col) values ('$val')";

       $run = $this->conn->query($query);

      
        return $run;
       

       
   }

   function select_where($tbl,$where)
   {
       $col_arr = array_keys($where);
       $val_arr = array_values($where);

       

       $sel=  "select * from $tbl where 1=1";

       $i=0;
       foreach($where as $w)
       {
           $sel .= " and $col_arr[$i] = '$val_arr[$i]'";
           $i++;
       }


       $run = $this->conn->query($sel);

      
        return $run;
        
   }

   function select_where_multidata($tbl,$where)
	{
		$sel="select * from $tbl where 1=1";
		$col_arr=array_keys($where);	
		$val_arr=array_values($where);
		$i=0;
		foreach($where as $c)
		{
			$sel.=" and $col_arr[$i]='$val_arr[$i]'";
			$i++;
		}
		$run=$this->conn->query($sel);  
		while($fetch=$run->fetch_object()) 
		{
			$arr[]=$fetch;
		}
		if(!empty($arr))
		{
			return $arr;
		}
	}


    function select_join_where_multidata($tbl1,$tbl2,$on,$where)
	{
		$sel="select * from $tbl1 join $tbl2 on $on where 1=1";
		$col_arr=array_keys($where);	
		$val_arr=array_values($where);
		$i=0;
		foreach($where as $c)
		{
		    $sel.=" and $col_arr[$i]='$val_arr[$i]'";
			$i++;
		}
		$run=$this->conn->query($sel);  
		while($fetch=$run->fetch_object()) 
		{
			$arr[]=$fetch;
		}
		if(!empty($arr))
		{
			return $arr;
		}
	}
   function update($tbl,$data,$where)
   {
       $col_arr=array_keys($data);
       $val_arr=array_values($data);
       
       $upd="update $tbl set ";
       $j=0;
       $count=count($data);
       foreach($data as $c)
       {
           if($count==$j+1)
           {
           $upd.=" $col_arr[$j]='$val_arr[$j]'";	
           }	
           else
           {
           $upd.=" $col_arr[$j]='$val_arr[$j]',";
           $j++;
           }
       }
       
       $upd.="where 1=1";
       $wcol_arr=array_keys($where);	
       $wval_arr=array_values($where);
       $i=0;
       foreach($where as $c)
       {
           $upd.=" and $wcol_arr[$i]='$wval_arr[$i]'";
           $i++;
       }
       $run=$this->conn->query($upd);  
       return $run;
   }

   function delete_where($tbl,$where)
	{
		$del="delete from $tbl where 1=1";
		$col_arr=array_keys($where);	
		$val_arr=array_values($where);
		$i=0;
		foreach($where as $c)
		{
			$del.=" and $col_arr[$i]='$val_arr[$i]'";
			$i++;
		}
		$run=$this->conn->query($del);  
		return $run;

		
	}
   
}