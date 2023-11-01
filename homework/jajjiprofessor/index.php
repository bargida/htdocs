
<?php include "assets/header.php" ; 

    if (isset($GET["page"])){
        include $_GET["page"]."php" ;
    }
    else
    include "home.php" ;
 
    include "assets/footer.php" ; ?>

