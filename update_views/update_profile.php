<?php

function updateUserTab($arr){ 
    
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
 



    echo "<form class='half_prof' style='align-items: center' action='includes/ndrysho.php' method='post'>
    <label for='email'>Emri Studentit</label><br>
    <input type='text' id='email' class='changeable' name='emri' placeholder='$std_emer' disabled/><br><br>
    <label for='email'>Emaili Studentit</label><br>
    <input type='email' id='email' class='changeable' name='email' placeholder='$std_email' disabled/><br><br>
    <label for='email'>Kodi Aktual</label><br>
    <input type='password' id='email' class='changeable' name='ndryshoPass' placeholder='******'/><br><br>
    <label for='email'>Kodi i Ri</label><br>
    <input type='password' id='email' class='changeable' name='ndryshoPass-retype' placeholder='******'/><br><br>
    <label for='email'>Viti</label><br>
    <input type='number' id='email' class='changeable' name='viti' placeholder='$std_viti' disabled/><br><br>
    <input style='width: 300px;' class='btn1' type='submit' name='submit' value='Ndrysho Kodin'/>
    </form>";

    echo "<form class='half_prof' style='align-items: center' action='includes/ndrysho.php' method='post'>
    <label for='email'>Atesia e Studentit</label><br>
    <input type='text' id='email' class='changeable' name='emri' placeholder='$std_atesia' disabled/><br><br>
    <label for='email'>Numer Matrikullimi i Studentit</label><br>
    <input type='email' id='email' class='changeable' name='email' placeholder='$std_nr_matrikulli' disabled/><br><br>
    <label for='email'>Cikli Studimeve Aktual</label><br>
    <input type='text' id='email' class='changeable' name='password' placeholder='$std_cikli' disabled/><br><br>
    <label for='email'>Dega</label><br>
    <input type='text' id='email' class='changeable' name='password' placeholder='$std_dega' disabled/><br><br>
    <label for='email'>Gjinia</label><br>
    <input type='text' id='email' class='changeable' name='viti' placeholder='$std_gjinia' disabled/><br><br>
    </form>";

    echo "<form class='half_prof' style='align-items: center' action='includes/ndrysho.php' method='post'>
    <label for='email'>Ditelindja e Studentit</label><br>
    <input type='text' id='email' class='changeable' name='emri' placeholder='$std_ditelindja' disabled/><br><br>
    <label for='email'>Vendlindja e Studentit</label><br>
    <input type='text' id='email' class='changeable' name='emri' placeholder='$std_vendlindja' disabled/><br><br>    
    </form>";
}
?>