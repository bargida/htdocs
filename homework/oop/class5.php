<?php
class Regions {
   
    public $name ;

    public $city ;

    public $street;

    

    public function __construct($name, $city, $street){
        $this->name = $name ;
        $this->city = $city ;
        $this->street = $street ;
       

    }

    public function get_data(){
        echo "name : ". $this ->name."<br>" ;
        echo "city : ". $this ->city."<br>" ;
        echo "street : ". $this ->street."<br>" ;

    }

}

$region1 = new Regions ("Surkhandarya", "Termiz", "Chegarachi") ;
$region2 = new Regions ("Navoiy", "Zarafshon", "Yangi hayot") ;
$region3 = new Regions ("Sirdaryo", "Guliston", "Bog'i eram",) ;
$region4 = new Regions ("Qarshi", "Kitob", "Yerqo'rg'on") ;


echo $region1->get_data()."<br>" ; 
echo $region2->get_data()."<br>" ; 
echo $region3->get_data()."<br>" ; 
echo $region4->get_data()."<br>" ; 
 

?>