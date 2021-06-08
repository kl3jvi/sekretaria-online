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
        <form action="includes/signup.inc.php" method="post" class="form-signin">
            <h2 class="form-signin-heading">Sekretaria FTI - Krijo Llogari</h2>



            <div>
                <p>Dua të regjistrohem si:</p>
                <input onclick="studentCheck();" required type="radio" id="student" name="profesioni" value="student">
                <label for="contactChoice1">Student</label>

                <input onclick="studentCheck();" required type="radio" id="sekretar" name="profesioni" value="sekretar">
                <label for="contactChoice2">Sekretar</label>
            </div>
            <br>

            <div class="inline-stud">
                <div class='selector-container'>
                    <select name="grup" id="grupi">
                        <option name="grupval" value="0">Zgjidh Grupin:</option>
                        <option name="grupval" value="A">A</option>
                        <option name="grupval" value="B">B</option>
                        <option name="grupval" value="C">C</option>
                        <option name="grupval" value="D">D</option>
                    </select>
                </div>


                <input type="number" id="stud-reg" class="form-control" name="viti" placeholder="Viti" max="3" min="1"
                    required=""  value='1' autofocus=""><br></input>
            </div>

            <br>
            <label for="name" class="label-title">Emër Mbiemër </label><br>
            <input type="text" id="name" class="form-control" name="emri" required="" autofocus="" /><br><br>
            <?php 
                 if(isset($_GET["error"])){
                if($_GET['error']== "invalidname"){
            echo "<small style='color: #CC0000;margin-top: 10px'>Emer i pasakte</small>";
                }
        }?>
            <label for="name" class="label-title">Email </label><br>
            <input type="text" id="email" class="form-control" name="email" required="" autofocus="" /><br>
            <?php     if(isset($_GET["error"])){
                 if($_GET["error"]== "invalidemail"){
            echo "<small style='color: #CC0000;margin-top: 10px'>E-mail i pasakte</small>";
                 }
        }?>
            <br>


            <label for="pass" class="label-title">Krijo një fjalëkalim </label><br>
            <input type="password" id="pass" class="form-control" name="pass" required="" /><br><br>
            
            <label for="retype-pass" class="label-title">Konfirmo fjalëkalimin </label><br>
            <input type="password" id="retype-pass" class="form-control" name="confirm-pass" required="" /><br><br>


            <input class="btn1" type="submit" name="submit" value="Rregjistrohu" />
            <br><br>
            <p id="go-back">Ke një llogari? <a href="index.php">Hyr këtu </a></p>

            <?php
    if(isset($_GET["error"])){
        if($_GET["error"]== "emptyinput"){
            echo "<p style='border: 1px solid #ccc;
            border-radius: 4px; background-color: #CC0000; padding: 12px 20px; color: #fff; text-align: center;'>Ju lutem plotesoni fushat e kerkuara</p>";
        }
        // if($_GET["error"]== "invalidname"){
        //     echo "<p style='border: 1px solid #ccc;
        //     border-radius: 4px; background-color: #CC0000; padding: 12px 20px; color: #fff; text-align: center;'>Ju lutem vendosni emrin ne formatin <br> 'Emer Mbiemer'</p>";
        // }
        // if($_GET["error"]== "invalidemail"){
        //     echo "<small style='border: 1px solid #ccc;
        //     border-radius: 4px; background-color: #CC0000; padding: 12px 20px; color: #fff; text-align: center;'>Ju lutem vendosni emailin ne formatin username@fti.edu.al</small>";
        // }
        if($_GET["error"]== "usernametaken"){
            echo "<p style='border: 1px solid #ccc;
            border-radius: 4px; background-color: #CC0000; padding: 12px 20px; color: #fff; text-align: center;'>Nje llogari ekziston tashme me keto te dhena! <a href='index.php'>Hyni ne Llogari</a></p>";
        }
        if($_GET["error"]== "stmtfailed"){
            echo "<p style='border: 1px solid #ccc;
            border-radius: 4px; background-color: #CC0000; padding: 12px 20px; color: #fff; text-align: center;'>Dicka Shkoi keq :(</p>";
        }
        if($_GET["error"]== "none"){
            echo "<p style='border: 1px solid #ccc;
            border-radius: 4px; background-color: #1cc88a; padding: 12px 20px; color: #fff; text-align: center;'>Llogaria juaj u krijua me sukses</p>";
            
        }
    
        if($_GET["error"]== "passworddontmatch"){
            echo "<p style='border: 1px solid #ccc;
            border-radius: 4px; background-color: #CC0000; padding: 12px 20px; color: #fff; text-align: center;'>Passwordi u konfirmua gabim!</p>";
            
        }
    }
?>
        </form>
    </div>

</body>

</html>

<script src="app/js/app.js"></script>