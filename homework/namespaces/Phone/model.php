<?php
namespace Phone ;
class Model{
    public $phone_model;
    public function __construct($phone_model)
    {
        $this->phone_model=$phone_model;
    }
    public function phoneModel_data(){
        echo "This phone is ".$this->phone_model."<br>";
    }
}

?>