<?php 
session_start();
if(($_SESSION['started']) != true){

header("location: login.php");

}
include("layouts/header.php") ;

if(isset($_GET["page"])){
    $page = $_GET["page"] ;
    include($page.".php") ;
}
else 
    include("home.php") ;
include("layouts/footer.php")
?>