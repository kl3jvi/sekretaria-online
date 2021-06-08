<?php

$otp_global;
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);



function emptyInputSignup($name,$email,$password,$viti,$retypePass,$type){
    $result=false;

    if(empty($name) || empty($email) || empty($password) || empty($viti) || empty($retypePass) || empty($type) ) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function invalidName($name){
    $result = false;

//     $rexSafety = "/^[^<,\"@/{}()*$%?=>:|;#]*$/i";
// if (!preg_match($rexSafety, 'marcus')) {
//    $result= false;
// } else {
//     $result = true;
// }
   
    return false;
}

function invalidEmail($email){
    $result = false;

    $domains = array('fti.edu.al');
    $pattern = "/^[a-z0-9._%+-]+@[a-z0-9.-]*(" . implode('|', $domains) . ")$/i";

    if (preg_match($pattern, $email)) {
        $result = false;
    } else {
        $result = true;
    }
    
    return $result;
}


function userExists($conn,$name,$email){
    $sql = "SELECT * FROM user WHERE std_emri = ? OR std_email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ss", $name,$email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($result)){
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}


function sendOtp($conn,$email){

    error_reporting(E_ALL);
    ini_set('display_errors', 'on');

    $otp = rand(100000,999999);
    $_SESSION['otp'] = $otp;
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $message = '<html><body style="border-radius: 8px;
    padding: 15px 35px 45px;
    margin: 0 auto;
    background-color: #ffff;
    border: 1px solid rgba(0, 0, 0, 0.1);
    box-shadow: 0 2px 4px rgba(0, 0, 0, .1), 0 8px 16px rgba(0, 0, 0, .1);">';
    $message .= '<h2 style="font-size: 19px;color:#292E31 ;">Pershendetje!</h1>';
    $message .= '<p style="color:#839197;font-size:13px;">Faleminderit qe u rregjistruat ne Sekretarine e FTI. Aktivizoni llogarine tuaj duke perdorur kodin e meposhtem.</p>';
    $message .= '<div style="width: 100%;">';
    $message .= '<h3 style="text-align: center;">'.$otp.'</h3>';
    $message .= '</div>';
    $message .= '<hr style="margin: 5px 10px 5px 10px"';
    $message .= '<div style="width: 100%;">';
    $message .= '<small style="text-align: center; font-size: 8px;">Copyright © 2010-2021 Universiteti Politeknik i Tiranës (UPT)<br>
    Fakulteti i Teknologjisë së Informacionit (FTI)<br>
    Sheshi Nënë Tereza 4, Tiranë<br>
    Telefon: +355.42.278159</small>';
    $message .= '</div>';
    $message .= '</body></html>';
    $subject = "Verifikimi Email - Sekretaria FTI";
    if(mail($email,$subject,$message,$headers) && !userExists($conn,$email,$email)){
        header("location: ../otp.php");
        return "true";
        exit();
    } else {
       return "false";
    }

}


function userVerified($otp,$givenOtp){
    $result;
    if($otp == $givenOtp){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}



function createUser($conn,$name,$email,$viti,$grup,$password,$type){
    // error_reporting(E_ALL);
    // ini_set('display_errors', 'on');


    $result;

    
    $user_verified = userVerified($_SESSION['otp'],$_SESSION['user_otp']);

    if($user_verified){
   
    $sql = "INSERT INTO user  (std_emri, std_email, std_viti, std_grupi, std_kodi, std_tipi) VALUES (?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
        $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, 'ssssss', $name, $email, $viti, $grup, $hashedPassword, $type);
        mysqli_stmt_execute($stmt);   
        mysqli_stmt_close($stmt);
        // $otp_global = $otp; 
        header("location: ../signup.php?error=successverification");
        exit(); 
        $result=true;      
    } else {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    return $result;


}

function userIsSekretar($type){
    $result = false;
    if($type === "sekretar"){
        $result = true;
    }
    return $result;
}

function userIsAdmin($type){
    $result = false;
    if($type === "admin"){
        $result = true;
    }
    return $result;
}

function userIsStudent($type){
    $result = false;
    if($type === "student"){
        $result = true;
    }
    return $result;
}

function loginUser($conn,$email,$password){

    
    $user_data = userExists($conn,$email,$email);

    // var_dump($user_data);
    if($user_data === false){
        header("location: ../index.php?error=accountdontexist");
        exit();
    }

    $pwdHashed = $user_data["std_kodi"];
    $checkPass = password_verify($password,$pwdHashed);

    if($checkPass === false){
        header("location: ../index.php?error=wronglogin");
        exit();
    } else if($checkPass === true){
        session_start();
        $_SESSION["id"] =$user_data["std_id"];
        $_SESSION["emri"] =$user_data["std_emri"];
        $_SESSION["tipi"] = $user_data["std_tipi"];
        $_SESSION['viti'] = $user_data['std_viti'];
        $_SESSION['email'] = $user_data['std_email'];
        $_SESSION['kodi'] = $user_data['std_kodi'];

          if(userIsStudent($_SESSION["tipi"])){
            header("location: ../dashboard.php?tab=profili");
        } else if(userIsSekretar($_SESSION["tipi"])){
            header("location: ../dashboard.php?tab=shikostudent");
            exit();
        }

    }
}



function merLendet($conn,$vit){

    error_reporting(E_ALL);
    ini_set('display_errors', 'on');

   
    $sql = "SELECT * FROM lendet WHERE viti = $vit;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../dashboard.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    return mysqli_fetch_all($result);
    
}


function merNoten($conn,$logedInId,$vit){

    error_reporting(E_ALL);
    ini_set('display_errors', 'on');

    // SELECT nota.vlera FROM nota INNER JOIN user ON user.std_id = nota.user INNER JOIN lendet ON lendet.lenda_id = nota.lenda WHERE user.std_id = 2 AND lendet.viti = 1
   
    $sql = "SELECT lendet.lenda_emri,nota.vlera FROM nota INNER JOIN user ON user.std_id = nota.user INNER JOIN lendet ON lendet.lenda_id = nota.lenda WHERE user.std_id = $logedInId AND lendet.viti =$vit";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../dashboard.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    return mysqli_fetch_all($result);

   
}


function updateUser($conn,$password,$id){
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
      

    $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
    $sql = "UPDATE user SET std_kodi = '".$hashedPassword."' WHERE std_id = $id ";

    // "UPDATE user SET std_kodi = '"$hashedPassword"' WHERE std_id = 8";

    
    mysqli_query($conn, $sql);
    if (mysqli_query($conn, $sql)) {
        echo "updated successfuly";
        header("location: ../index.php?error=passwordchangedsuccesfully");
        exit();
      } else {
        echo "Error updating record: " . mysqli_error($conn);
        // echo $id;
      }
      
      mysqli_close($conn);
    
    
}



function merTeDhenatPerUser($conn,$usrId){
    $sql ="SELECT * FROM usr_data INNER JOIN user ON user.std_id = usr_data.std_id WHERE user.std_id =$usrId";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../dashboard.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    return mysqli_fetch_all($result);
}


function merPagesat($conn,$usrId){
         
    // error_reporting(E_ALL);
    // ini_set('display_errors', 'on');
    
    $sql = "SELECT pagesat.cmimi,pagesat.viti,pagesat.fushaEStudimit,pagesat.status FROM pagesat INNER JOIN user ON user.std_id = pagesat.std_id WHERE user.std_id = $usrId";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../dashboard.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    return mysqli_fetch_all($result);
}



function merMesazhet($conn,$usrId){
         
    // error_reporting(E_ALL);
    // ini_set('display_errors', 'on');
    
    $sql = "SELECT * FROM `mesazhet` WHERE mesazhet.student_id =  $usrId";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../dashboard.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    return mysqli_fetch_all($result);
}


function merNxenesit($conn,$grupi_stud,$viti_stud){
  

    $viti_s = (int) $viti_stud;
    $gr = (String) $grupi_stud;

    $sql = "SELECT * FROM user WHERE std_viti = $viti_s AND std_grupi = '".$gr."'";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../dashboard.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_report(MYSQLI_REPORT_ALL); 
    return mysqli_fetch_all($result);
}


function merTeGjithNxenesit($conn){
  

    
    $gr = "student";

    $sql = "SELECT * FROM user WHERE std_tipi = '".$gr."'";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../dashboard.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_report(MYSQLI_REPORT_ALL); 
    return mysqli_fetch_all($result);
}




function shtoPageseTeRe($conn,$cmimi,$viti,$fushaStudimit,$std_id){
    

    $sql= "INSERT INTO `pagesat` (`pagesaId`, `cmimi`, `viti`, `status`, `fushaEStudimit`, `std_id`) VALUES (NULL, '".$cmimi."', '".$viti."', 0, '".$fushaStudimit."', '".$std_id."') ;";
    
    // "INSERT INTO `pagesat` (`pagesaId`, `cmimi`, `viti`, `status`, `fushaEStudimit`, `std_id`) VALUES (NULL, '15000', '3', '0', 'Inxhinieri Informatike', 43);"
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../dashboard.php?error=stmtfailed");
        exit();
    } else 
        
    

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    echo $result;
   
}

function  dergoMesazh($conn,$useri,$titulli,$msg){
    $sql= "INSERT INTO `mesazhet` (`msg_id`, `msg_title`, `msg_description`, `student_id`) VALUES (NULL, '".$titulli."', '".$msg."',  '".$useri."');";
    
    // "INSERT INTO `pagesat` (`pagesaId`, `cmimi`, `viti`, `status`, `fushaEStudimit`, `std_id`) VALUES (NULL, '15000', '3', '0', 'Inxhinieri Informatike', 43);"
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../dashboard.php?error=stmtfailed");
        exit();
    } else 
        
    

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    echo $result;
}



function sekretarUpdateUser($conn,$atesia,$nr_matrikulli,$cikli,$dega,$gjinia,$ditelindja,$vendlindja,$id){
    
    // return $conn.$atesia.$nr_matrikulli.$cikli.$dega.$gjinia.$ditelindja.$vendlindja;
    $sql = "UPDATE usr_data SET  usr_atesia = '".$atesia."', usr_nr_matrikullimi = '".$nr_matrikulli."', usr_cikli = '".$cikli."', usr_dega = '".$dega."', usr_gjinia = '".$gjinia."', usr_datelindja = '".$ditelindja."', usr_vendlindja = '".$vendlindja."' WHERE std_id = $id;";
$result;

    // $sql= "INSERT INTO `usr_data` (`usr_data_id`, `usr_atesia`, `usr_nr_matrikullimi`, `usr_cikli`, `usr_dega`, `usr_gjinia`, `usr_datelindja`, `usr_vendlindja`, `std_id`)
    //                        VALUES (NULL, '".$atesia."', '".$nr_matrikulli."', '".$cikli."', '".$dega."', '".$gjinia."', '".$ditelindja."', '".$vendlindja."', $id ) ;";
    
    // "INSERT INTO `pagesat` (`pagesaId`, `cmimi`, `viti`, `status`, `fushaEStudimit`, `std_id`) VALUES (NULL, '15000', '3', '0', 'Inxhinieri Informatike', 43);"  $emer,$atesia,$nr_matrikulli,$cikli,$dega,$gjinia,$ditelindja,$vendlindja
    $stmt = mysqli_stmt_init($conn);
    // if(!mysqli_stmt_prepare($stmt,$sql)){
        
    // } else 
        
    if (mysqli_query($conn, $sql)) {
        header("location: ../dashboard.php?tab=shikostudent");
        $result = true;
        exit();
      } else {
        echo "Error updating record: " . mysqli_error($conn);
        header("location: ../dashboard.php?error=stmtfailed");
        $result = false;
        exit();
      }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    return $result;
   
}