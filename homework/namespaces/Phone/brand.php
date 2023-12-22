<?php
namespace Phone ;
class Brand{
    public $phone_brand;
    public function __construct($phone_brand)
    {
        $this->phone_brand=$phone_brand;
    }
    public function phoneBrand_data(){
        echo "it is".$this->phone_brand." brand<br>";
    }
}

?>