<?php
class MyClass
{
    public $val1 = 'value 8 <br>' ;
    public $val2 = 'value 10 <br>';
    public $val3 = 'value 12 <br>';

    protected $protected = 'protected val <br>';
    private   $private   = 'private val <br>';

    function iterateVisible() {
       echo "MyClass::iterateVisible:\n";
       foreach ($this as $key => $value) {
           print "$key => $value\n";
       }
    }
}

$class = new MyClass();

foreach($class as $key => $value) {
    print "$key => $value\n";
}
echo "\n";


$class->iterateVisible();

?>