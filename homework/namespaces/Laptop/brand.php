<?php 

namespace Laptop ;

class Brand{
    public $laptop_brand;
    public function __construct($laptop_brand)
    {
        $this->laptop_brand=$laptop_brand;
    }
    public function laptopBrand_data(){
        echo "This is brand of ".$this->laptop_brand."<br>";
    }
}
?>