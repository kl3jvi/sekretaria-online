<?php
    function rregullo($tegjith){
        require 'includes/dbh.inc.php';

    echo"<div style='width: 99%'>
    <div class='selector-container'>
    <form action='' method='post'>

    <select name='vit' id='vitiStudenteve'>
        <option name='vitiStud' value='0'>Zgjidh Vitin:</option>
        <option name='vitiStud' value='1'>1</option>
        <option name='vitiStud' value='2'>2</option>
        <option name='vitiStud' value='3'>3</option>
    </select>
    
    <div class='selector-container'>
    <select name='fushaStd' id='vitiStudenteve'>
        <option name='vitiStud' value='0'>Zgjidh Degen:</option>
        <option name='vitiStud' value='Inxhinieri Informatike'>Inxhinieri Informatike</option>
        <option name='vitiStud' value='Inxhinieri Elektronike'>Inxhinieri Elektronike</option>
        <option name='vitiStud' value='Inxhinieri Telekomunikacioni'>Inxhinieri Telekomunikacioni</option>
    </select>
    </div>
    <div class='selector-container'>
    <select name='shuma' id='vitiStudenteve'>
        <option name='vitiStud' value='1'>Zgjidh Shumen:</option>
        <option name='vitiStud' value='30000'>30000 Lek</option>
        <option name='vitiStud' value='15000'>15000 Lek</option>
        <option name='vitiStud' value='0'>0 Lek</option>
    </select>
    </div>
    <div class='selector-container'>
    <select name='studenti' id='studentat'>
    <option name='vitiStud' value='1'>Zgjidh Student:</option>";

    for($x = 0; $x < count($tegjith) - 1; $x++){
        $val = $tegjith[$x][0];
        echo "<option name='vitiStud' value='$val'>".$tegjith[$x][1]."</option>";
    }
        echo "</select>";
    echo "</div>
    
    <input style='margin-left: 45%; border-radius: 8px' type='submit' name='submit' value='Shto Pagese_' class='kerko'/>
    </form>
    </div>";

    if(isset($_POST['submit'])){
        $viti = $_POST['vit'];
        $cmimi = $_POST['shuma'];
        $fushaStudimit = $_POST['fushaStd'];
        $std_id = $_POST['studenti'];
        echo $std_id;
        shtoPageseTeRe($conn,$cmimi,$viti,$fushaStudimit,$std_id);
echo "<script>alert('Pagesa u shtua ne sistem!')</script>";
        // var_dump(shtoPageseTeRe($conn,$cmimi,$viti,$fushaStudimit,$std_id));
}

    }