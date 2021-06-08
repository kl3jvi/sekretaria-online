<?php

    include_once 'includes/header.php'
?>


<!DOCTYPE html>
<html>

<head>
    <title>Sekretaria Mesimore</title>
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">

   
</head>


<body class="body-img">



    <div class="wrapper">
        <form action="includes/login.inc.php" method="post" class="form-signin">
            <h2 class="form-signin-heading">Sekretaria FTI - Hyr ne Llogari</h2>

            <label for="email" class="label-title">Adresa Email / Emri</label><br>
            <input type="text" id="email" class="form-control" name="email" required="" autofocus="" /><br><br>
            
            <label for="pass" class="label-title">Fjalekalimi</label><br>
            <input type="password" id="pass" class="form-control" name="pass" required="" />
            <br>
            <br>
            <label class="checkbox">
                <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Ruaj të dhënat
            </label><br><br>
            
            <div class="button-holder">
                <input class="btn1" type="submit" name="submit" value="Hyr" />
            </div>
            <p>Nuk ke një llogari? <a href="signup.php">Regjistrohu këtu </a></p>
            <?php
           if(isset($_GET["error"])){
            if($_GET["error"]== "wronglogin"){
                echo "<p style='border: 1px solid #ccc;
                border-radius: 4px; background-color: #CC0000; padding: 12px 20px; color: #fff; text-align: center;'><strong>Gabim! </strong>Ju lutem kontrolloni kredincialet</p>";
            }
            if($_GET["error"]== "accountdontexist"){
                echo "<p style='border: 1px solid #ccc;
                border-radius: 4px; background-color: #CC0000; padding: 12px 20px; color: #fff; text-align: center;'><strong>Gabim! </strong>Llogaria nuk ekziston. Krijoni nje llogari.</p>";
            }
            if($_GET["error"]== "successverification"){
                echo "<p style='border: 1px solid #ccc;
                border-radius: 4px; background-color: #1cc88a; padding: 12px 20px; color: #fff; text-align: center;'>Llogaria juaj u krijua me sukses</p>";    
            }
            if($_GET["error"]== "passwordchangedsuccesfully"){
                echo "<p style='border: 1px solid #ccc;
                border-radius: 4px; background-color: #1cc88a; padding: 12px 20px; color: #fff; text-align: center;'>Passwordi juaj u nderrua me sukses! Hyni Perseri</p>";    
            }
        }
           ?>
        </form>
    </div>

</body>


</html>