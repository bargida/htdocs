
      <?php include "assets/header.php" ; ?>

      <?php 
      if(isset($_GET["about"])){

         include "assets/about.php" ;
      }
      elseif(isset($_GET["contact"])){

         include "assets/contact.php" ;
      }
      elseif(isset($_GET["design"])){

         include "assets/design.php" ;
      }
      elseif(isset($_GET["shop"])){

         include "assets/shop.php" ;
      }
      else
      include "home.php" ;
      ?>
      <?php
         include "assets/footer.php" ;
      ?>
      <!-- copyright section start -->
      