<?php 
class maths{
    public static function add($a,$b){
        return $a + $b;
        
    }
    public static function sub($a,$b){
        
        return $a - $b;
    }
}

echo maths::add(10,15); // output 25
echo maths::sub(20,15); // output 5
?>