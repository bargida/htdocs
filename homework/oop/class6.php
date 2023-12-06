<?php

class Books {
   
    public $name ;

    public $author ;

    public $price;

    public $shop_name;

    

    public function __construct($name, $author, $price, $shop_name){
        $this->name = $name ;
        $this->author = $author ;
        $this->price = $price ;
        $this->shop_name = $shop_name ;
       

    }

    public function get_info(){
        echo "name : ". $this ->name."<br>" ;
        echo "author : ". $this ->author."<br>" ;
        echo "price : ". $this ->price."<br>" ;
        echo "shop_name : ". $this ->shop_name."<br>" ;

    }

}

$book1 = new Books ("Choliqushi", "Rashod Nuri Guntekin", "45 000", "Asaxiy") ;
$book2 = new Books ("Dardingni sev", "Deyl karnegi", "25 000", "Zulmar") ;
$book3 = new Books ("Raqamli xotira", "R", "65 000", "") ;
$book4 = new Books ("Tong sexri", "", "44 000", "Qamar") ;


echo $book1->get_info()."<br>" ; 
echo $book2->get_info()."<br>" ; 
echo $book3->get_info()."<br>" ; 
echo $book4->get_info()."<br>" ; 


?>