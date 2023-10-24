<?php
session_start() ;
if(!isset($_SESSION["login"]) );
    header("location:login.php") ;

?>
<ul>
    <li><a href="about.php">about</a></li>
    <li><a href="exit.php">Logout</a></li>
</ul>
<div>
    <h1>About PAge</h1>
    <h3>Name</h3>
</div>

<?php 
    include "sections/index.php";
?>