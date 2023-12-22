<?php

require "Laptop/Brand.php";
require "Laptop/Model.php";
require "Phone/Brand.php";
require "Phone/Model.php";

use Laptop\Brand as LaptopBrand;
use Laptop\Model as Laptop_Model;
use Phone\Brand as Phone_Brand;
use Phone\Model as Phone_Model;

$phone= new Phone_Brand("Samsung");
$phone1= new Phone_Model("Redmi 12");
$laptop= new LaptopBrand("Asus");
$laptop1= new Laptop_Model("Asus i 5");

$laptop->laptopBrand_data();
$laptop1->laptopModel_data();
$phone->phoneBrand_data();
$phone1->phoneModel_data();


?>