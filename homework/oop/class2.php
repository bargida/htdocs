<?php
class Clothes {
   
    public $size ;

    public $color ;

    public $brand ;

    public function __construct($size, $color, $brand){
        $this->size = $size ;
        $this->color = $color ;
        $this->brand = $brand ;
    }

    public function get_name(){
        echo "size : ". $this ->size."<br>" ;
        echo "color : ". $this ->color."<br>" ;
        echo "brand : ". $this ->brand."<br>" ;
    }

}

$clothe1 = new Clothes("xl", "yellow", "dior") ;
$clothe2 = new Clothes("2xl", "green", "chanel") ;
$clothe3 = new Clothes("L", "red", "gucci") ;
$clothe4 = new Clothes("M", "black", "vltn") ;
$clothe5 = new Clothes("xl", "white", "polo") ;

echo $clothe1->get_name()."<br>" ; 
echo $clothe2->get_name()."<br>" ; 
echo $clothe3->get_name()."<br>" ; 
echo $clothe4->get_name()."<br>" ; 
echo $clothe5->get_name()."<br>" ; 

?>