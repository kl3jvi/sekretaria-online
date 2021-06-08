<?php
function showStudentData($arr,$id){


   
    $std_emer = $arr[0][10];
    $std_email = $arr[0][11];
    $std_viti = $arr[0][12];
   
    $std_atesia = $arr[0][1];
    $std_nr_matrikulli = $arr[0][2];
    $std_cikli = $arr[0][3];
    $std_dega = $arr[0][4];
    $std_gjinia = $arr[0][5];
    $std_ditelindja = $arr[0][6];
    $std_vendlindja = $arr[0][7];


    echo "<div  style='align-items: center' class='half_prof'>
    <form  action='includes/ndryshoTeDhenat.php' method='post'>
    
    <label for='email'>Emri Studentit</label><br>
    <input type='text' id='email' class='changeable' name='emri' value='$std_emer' required /><br><br>
    <label for='email'>Emaili Studentit</label><br>
    <input type='text' id='email' class='changeable' name='email' value='$std_email' required /><br><br>
    <label for='email'>Viti</label><br>
    <input type='number' id='email' class='changeable' name='viti' value='$std_viti' required /><br><br>
    <label for='email'>Ditelindja e Studentit</label><br>
    <input type='text' id='email' class='changeable' name='ditelindja' value='$std_ditelindja' required /><br><br>
    <label for='email'>Vendlindja e Studentit</label><br>
    <input type='text' id='email' class='changeable' name='vendlindja' value='$std_vendlindja' required /><br><br>    
    
    </div>";

    echo "<div class='half_prof' style='align-items: center'>
    <label for='email'>Atesia e Studentit</label><br>
    <input type='text' id='email' class='changeable' name='atesia' value='$std_atesia' required /><br><br>
    <label for='email'>Numer Matrikullimi i Studentit</label><br>
    <input type='text' id='email' class='changeable' name='nr_matrikullimi' value='$std_nr_matrikulli' required /><br><br>
    <label for='email'>Cikli Studimeve Aktual</label><br>
    <input type='text' id='email' class='changeable' name='cikli' value='$std_cikli' required /><br><br>
    <label for='email'>Dega</label><br>
    <input type='text' id='email' class='changeable' name='dega' value='$std_dega' required /><br><br>
    <label for='email'>Gjinia</label><br>
    <input type='text' id='email' class='changeable' name='gjinia' value='$std_gjinia' required /><br><br>
    <input type='hidden' name='idd' value='$id'/>
    </div>
    <input style='width: 300px; height: 50px; margin-top: 25%' class='btn1' type='submit' name='submit' value='Ndrysho Te Dhenat'/><br><br>
    </form>";
   
    echo "";
}