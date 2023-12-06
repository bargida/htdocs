<?php
class Phones {
   
    public $name ;

    public $model ;

    public $color;

    

    public function __construct($name, $model, $color){
        $this->name = $name ;
        $this->model = $model ;
        $this->color = $color ;
       

    }

    public function get_data(){
        echo "name : ". $this ->name."<br>" ;
        echo "model : ". $this ->model."<br>" ;
        echo "color : ". $this ->color."<br>" ;

    }

}

$phone1 = new Phones ("Tecno Spark", "blue", "128") ;
$phone2 = new Phones ("Iphone", "black", "256") ;
$phone3 = new Phones ("Redmi", "grey", "32",) ;



echo $phone1->get_data()."<br>" ; 
echo $phone2->get_data()."<br>" ; 
echo $phone3->get_data()."<br>" ; 
 


?>