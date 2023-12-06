<?php
class Computers {
   
    public $name ;

    public $year ;

    public $price ;

    public $color ;

    public function __construct($name, $year, $price, $color){
        $this->name = $name ;
        $this->year = $year ;
        $this->price = $price ;
        $this->color = $color ;

    }

    public function get_info(){
        echo "name : ". $this ->name."<br>" ;
        echo "year : ". $this ->year."<br>" ;
        echo "price : ". $this ->price."<br>" ;
        echo "memory : ". $this ->color."<br>" ;
    }

}

$computer1 = new Computers("macbook", "2005", "1200$", "grey") ;
$computer2 = new Computers("acer", "2007", "650$", "white") ;
$computer3 = new Computers("hp", "2002", "750$", "blue") ;
$computer4 = new Computers("lenovo", "2000", "550$", "white") ;


echo $computer1->get_info()."<br>" ; 
echo $computer2->get_info()."<br>" ; 
echo $computer3->get_info()."<br>" ; 
echo $computer4->get_info()."<br>" ; 
echo $computer5->get_info()."<br>" ; 

?>