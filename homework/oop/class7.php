<?php
class Musics {
   
    public $name ;

    public $author ;

    public $style;

    

    public function __construct($name, $author, $style){
        $this->name = $name ;
        $this->author = $author ;
        $this->style = $style ;
       

    }

    public function get_data(){
        echo "name : ". $this ->name."<br>" ;
        echo "author : ". $this ->author."<br>" ;
        echo "style : ". $this ->style."<br>" ;

    }

}

$music1 = new Musics ("Balki", "Mohlaroyim vs Jasur", "rap") ;
$music2 = new Musics ("Mockingbird", "Eminem", "rep") ;
$music3 = new Musics ("Losing interest", "Ambition", "pop",) ;
$music4 = new Musics ("Do'ppi tikdim", "Dilnoza.I", "classic") ;


echo $music1->get_data()."<br>" ; 
echo $music2->get_data()."<br>" ; 
echo $music3->get_data()."<br>" ; 
echo $music4->get_data()."<br>" ; 
 

?>