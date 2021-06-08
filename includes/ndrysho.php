<?php
if(isset($_POST['submit'])){
        
    session_start();
        // $userId = $_SESSION['userId'];
       $password = $_POST['ndryshoPass'];
        $userId=$_SESSION["id"];

       require_once 'dbh.inc.php';
       require_once 'functions.inc.php';

       
       updateUser($conn,$password,$userId);
}