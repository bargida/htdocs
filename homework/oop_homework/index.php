<?php
class Technology{
   
    public $year ;

    public $inventor ;


    public function __construct($year, $inventor){
        $this->year = $year ;
        $this->inventor = $inventor ;
    }

    public function get_name(){
        echo "year : ". $this ->year."<br>" ;
        echo "inventor : ". $this ->inventor."<br>" ;
       
}
}
class Phone extends Technology{
    public $color ;

    public $brand ;


    public function __construct($color, $brand){
        $this->color = $color ;
        $this->brand = $brand ;
    }

    public function get_name(){
        echo "color : ". $this ->color."<br>" ;
        echo "brand : ". $this ->brand."<br>" ;
       
}
    
}
//Childclass from Phones
class  Apple extends Phone{

    public $brand;
    public $color;

    public function call(){
        return "Phone Ring";
    }

    public function record(){
        return "Rasmga oool";
    }

}
class  Nokia extends Phone{
    
    public $brand;
    public $color;

    public function call(){
        return "Phone Ring";
    }

    public function record(){
        return "Rasmga oool";
    }

}
class  Samsung extends Phone{
    
    public $brand;
    public $color;

    public function call(){
        return "Phone Ring";
    }

    public function record(){
        return "Rasmga oool";
    }

}

class TV extends Technology{
    public $operating_system;
    public $model;

    public function android(){
        return "Android's camera is better<br>";
    }

    public function source(){
        return "Android is based on open source<br>";
    }
}
//Childclass from TV

    class  LG extends TV{

        public $brand;
        public $color;

        public function call(){
            return "Phone Ring";
        }

        public function record(){
            return "Rasmga oool";
        }

    }
    class  Artel extends TV{
        
        public $brand;
        public $color;

        public function call(){
            return "Phone Ring";
        }

        public function record(){
            return "Rasmga oool";
        }

    }
    class  TCL extends TV{
        
        public $brand;
        public $color;

        public function call(){
            return "Phone Ring";
        }

        public function record(){
            return "Rasmga oool";
        }

    }
    $samsung1 = new Samsung("2019", "Lee Byung-chul", "Samsung", "red", "Android", "Samsung A12");
    echo $samsung1->android();
    $samsung2 = new Samsung("2012", "Lee Byung-chul", "Samsung", "Titanium gray", "Android", "Samsung Note2");
    echo $samsung2->source();


class laptop extends Technology{
    public $model ;
    public $memory;

    public function iOs(){
        return "IOs is more secure<br>";
    }

    public function fast(){
        return "IOs works faster<br>";
    }

}

}

$apple1 = new Apple("2019", "Steve Jobs", "Apple", "white", "Iphone x", "64");
echo $apple1->iOs();
$apple2 = new Apple("2012", "Steve Jobs", "Apple", "gold", "Ihpone 13", "512");
echo $apple2->fast() ;