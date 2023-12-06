<?php
class Learning_centers {
   
    public $name ;

    public $class ;

    public $price ;

    public $location ;

    public $time ;

    public function __construct($name, $class, $price, $location, $time ){
        $this->name = $name ;
        $this->class = $class ;
        $this->price = $price ;
        $this->location = $location ;
        $this->time = $time ;
    }

    public function get_all(){
        echo "name : ". $this ->name."<br>" ;
        echo "class : ". $this ->class."<br>" ;
        echo "price : ". $this ->price."<br>" ;
        echo "location : ". $this ->location."<br>" ;
        echo "time : ". $this ->time."<br>" ;
    }

}

$center1 = new Learning_centers("Everest", "English", "550 000", "Drujba", "9:00am") ;
$center2= new Learning_centers("Cambridge", "English", "750 000", "Chilonzor", "5:00pm") ;
$center3 = new Learning_centers("Internation", "Math", "650 000", "Mustaqillik maydoni", "6:30am") ;
$center4 = new Learning_centers("Lets_animate", "Motiongrafika", "2 250 000", "Beruniy station", "14:30pm") ;
$center5 = new Learning_centers("Najot ta'lim", "SMM", "1 250 000", "Novza", "9:30am") ;

echo $center1->get_all()."<br>" ; 
echo $center2->get_all()."<br>" ; 
echo $center3->get_all()."<br>" ; 
echo $center4->get_all()."<br>" ; 
echo $center5->get_all()."<br>" ; 

?>