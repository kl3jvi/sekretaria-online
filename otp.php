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
        <form action="includes/otp.inc.php" method="post" class="form-signin">
            <h2 class="form-signin-heading">Sekretaria FTI - Hyr ne Llogari</h2>
            <br>

            <label for="email" class="label-title">Vendos Kodin 6-Shifror</label><br>
            <input type="text" id="email" class="form-control" name="otp" required="" autofocus="" /><br><br>

            <?php 
            
                if($_GET["error"]== "errorcode"){
                   

                    echo "<a onClick='javascript:timer();' ><small id='resendCode' class='hint'></small></a>
                    <br>
            <br>";
                
            }else {
                echo "<small class='hint'>Nje kod 6 shifror eshte derguar ne emailin tuaj. Ju lutem vendosni kodin per te
                verifikuar llogarine dhe per te perdorur sherbimin e sekretarise mesimore.</small><br>
            <br>";
            }
            ?>

            <div class="button-holder">
                <input class="btn1" type="submit" name="submit" value="Vazhdo" />
            </div>

        </form>
    </div>

</body>


</html>

<script src='app/js/countdown.js'></script>