<?php
namespace Laptop ;

class Model{
    public $laptop_model;
    public function __construct($laptop_model)
    {
        $this->laptop_model=$laptop_model;
    }
    public function laptopModel_data(){
        echo "This laptop  ".$this->laptop_model."<br>";
    }
}

?>
