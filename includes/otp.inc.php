<?php
session_start();


$generated_otp= $_SESSION['otp'] ;
$user_otp;


if(isset($_POST['submit'])){
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    $user_otp = $_POST['otp'];
    $_SESSION['user_otp'] = $user_otp;

    if($user_otp ==  $generated_otp){
        
        if($_SESSION['profesioni']=="sekretar"){
            if(createUser($conn,$_SESSION['emri'], $_SESSION['email'], "-1", "A", $_SESSION['pass'], $_SESSION['profesioni'])){
                header("location: ../index.php?error=successverification");
                exit();
            } 
        } else {

            if(createUser($conn,$_SESSION['emri'], $_SESSION['email'], $_SESSION['grvitiup'], $_SESSION['grup'], $_SESSION['pass'], $_SESSION['profesioni'])){
                header("location: ../index.php?error=successverification");
                exit();
            } 
        }

        
    }  else {
        header("location: ../otp.php?error=errorcode");
        exit();
    }
}
