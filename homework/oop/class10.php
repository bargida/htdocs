<?php
class Restaurants {
   
    public $name ;

    public $location ;

    public $time;

    

    public function __construct($name, $location, $time){
        $this->name = $name ;
        $this->location = $location ;
        $this->time = $time ;
       

    }

    public function get_data(){
        echo "name : ". $this ->name."<br>" ;
        echo "location : ". $this ->location."<br>" ;
        echo "time : ". $this ->time."<br>" ;

    }

}

$restaurant1 = new Restaurants ("Shdevr", "Termiz", "8:00") ;
$restaurant2 = new Restaurants ("Malika", "Yakkasaroy", "9:00") ;
$restaurant3 = new Restaurants ("Breadly", "Darhon", "7:00",) ;
$restaurant4 = new Restaurants ("Bon", "Yakkasaroy", "9:00") ;


echo $restaurant1->get_data()."<br>" ; 
echo $restaurant2->get_data()."<br>" ; 
echo $restaurant3->get_data()."<br>" ; 
echo $restaurant4->get_data()."<br>" ; 


?>