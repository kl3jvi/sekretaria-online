<?php
    function updateMesazh($arr){
        require 'includes/dbh.inc.php';
    echo "<div class='selector-container'>
    <form action='' method='post'>
    <select name='studenti' id='studentat'>
    <option name='vitiStud' value='1'>Zgjidh Student:</option>";

    for($x = 0; $x < count($arr) - 1; $x++){
        $val = $arr[$x][0];
        echo "<option name='vitiStud' value='$val'>".$arr[$x][1]."</option>";
    }
        echo "</select>";
        echo "<label for='titulli'>Titulli: </label>";
        echo "<input placeholder='Shkruaj titullin e mesazhit' type='text' id='titulli-njoftimit' name='titulli' type ='text'/><br><br>";
        echo "<label for='msg'>Mesazhi: </label>";
        echo "<textarea style='height:46px; width:800px; padding: 10px; border: 1px solid rgba(0, 0, 0, 0.1); border-radius:50px;' id='mesazhi' placeholder='Shkruaj nje mesazh per studentin' name='msg' rows='1' cols='50'></textarea>";
        echo "<input style='border-radius:8px; margin-left: 10px;' type='submit' name='submit' class='kerko' value='Dergo Mesazh'/>
        </form>";

        if(isset($_POST['submit'])){
            $useri = $_POST['studenti'];    
            $titulli = $_POST['titulli'];
            $msg = $_POST['msg'];
            dergoMesazh($conn,$useri,$titulli,$msg);
            echo "<script>alert('Mesazhi u dergua me sukses!')</script>";
        }
    }
