<?php
class  Universities{
   
    public $name ;

    public $location ;

    public $profession;

    public $total_scoolarship;

    public $insLink;

    

    public function __construct($name, $location, $profession, $total_scoolarship, $insLink){
        $this->name = $name ;
        $this->location = $location ;
        $this->profession = $profession ;
        $this->total_scoolarship = $total_scoolarship ;
        $this->insLink = $insLink ;
       

    }

    public function getAll(){
        echo "name : ". $this ->name."<br>" ;
        echo "location : ". $this ->location."<br>" ;
        echo "profession : ". $this ->profession."<br>" ;
        echo "total_scoolarship : ". $this ->total_scoolarship."<br>" ;
        echo "insLink : ". $this ->insLink."<br>" ;

    }

}

$univer1 = new Universities ("IDU", "Darhon", "IT", "90$", "idu.uz") ;
$univer2 = new Universities ("Team", "", "Bussiness", "100%", "team") ;
$univer3 = new Universities ("Bristol", "The UK", "Science", "100%", "bristol") ;
$univer4 = new Universities ("Webster", "Cinema Palace", "Bussiness", "100%", "webster") ;


echo $univer1->getAll()."<br>" ; 
echo $univer2->getAll()."<br>" ; 
echo $univer3->getAll()."<br>" ; 
echo $univer4->getAll()."<br>" ; 

?>