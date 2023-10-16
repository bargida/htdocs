
<?php 
include "./assets/header.php" ;

if(isset($_GET["about"])){
    include "assets/about.php";
}
elseif(isset($_GET["contact"])){
    include "assets/contact.php";
}
elseif(isset($_GET["faq"])){
    include "assets/faq.php";
}
elseif(isset($_GET["product"])){
    include "assets/product.php";
}
else{
    include "./assets/home.php" ;
}


include "./assets/footer.php" ;


