<?php

if(isset($_POST['submit'])){
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    
    $email = $_POST['email'];
    $password= $_POST['pass'];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(empty($email)||empty($password)){
        header("location: ../index.php?error=emptyinput");
        exit();
    }

    loginUser($conn,$email,$password);    
    
} else{
    
    header("location: ../index.php");
    exit();
    
}



// per te maarre te gjth notat e user "SELECT nota.vlera FROM nota INNER JOIN user where user.std_id = nota.user"

// id psh mund te jet 1; dhe nota.user esht klejvi 
// per vitin bejm inner join dhe lendet 

// SELECT nota.vlera, lendet.lenda_emri, user.std_emri FROM nota INNER JOIN user ON user.std_id = nota.user INNER JOIN lendet ON lendet.lenda_id = nota.lenda WHERE user.std_id = 2 AND lendet.viti = 1