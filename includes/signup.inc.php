<?php

if(isset($_POST['submit']) && !empty($_POST['submit'])) {
        
  ini_set('display_errors', '1');
  ini_set('display_startup_errors', '1');
  error_reporting(E_ALL);

      session_start();

       $name = $_POST['emri'];
       $email= $_POST['email'];
       $password = $_POST['pass'];
       $viti= $_POST['viti'];
       $grup = $_POST['grup'];
       $retypePass = $_POST['confirm-pass'];
       $type = $_POST['profesioni'];

       $_SESSION['emri'] = $name;
       $_SESSION['email'] = $email;
       $_SESSION['pass'] = $password;
       $_SESSION['grup'] = $grup;
       $_SESSION['viti'] = $viti;
       $_SESSION['profesioni'] = $type;
       
       

    

       require_once 'dbh.inc.php';
       require_once 'functions.inc.php';
       echo $name;
       if(emptyInputSignup($name,$email,$password,$viti,$retypePass,$type) !== false){
         header("location: ../signup.php?error=emptyinput");
         exit();
        }
        
        if(invalidName($name) !== false){
          header("location: ../signup.php?error=invalidname");
          exit();
        }
        
        if(invalidEmail($email) !== false){
          header("location: ../signup.php?error=invalidemail");
          exit();
        }
        
      

       if($_POST['pass']!==$_POST['confirm-pass']){
           header("location: ../signup.php?error=passworddontmatch");
        exit();
       }
     

       if(userExists($conn,$name,$email) !== false){
        header("location: ../signup.php?error=usernametaken");
        exit();
       }
       if(userIsSekretar($type) !==false){
        // sendOtp($conn,$email); 
        // echo sendOtp($conn,$email);  

       
          if(createUser($conn,$_SESSION['emri'], $_SESSION['email'], "-1", "S", $_SESSION['pass'], $_SESSION['profesioni'])){
            echo "lol";  
          }else {
            echo "Sss";
          }
                  
        


      }
      if(userIsStudent($type)){  
        echo sendOtp($conn,$email);
      }
    } else {
        header("location: ../signup.php");
        exit();
    }