<?php
class Car {
   
    public $name ;

    public $color ;

    public function __construct($name, $color){
        $this->name = $name ;
        $this->color = $color ;
    }

    public function getAll(){
        echo "name : ". $this ->name."<br>" ;
        echo "color : ". $this ->color."<br>" ;
    }

}

$car1 = new Car("Gelik", "white") ;
echo $car1->getAll(); 


?>