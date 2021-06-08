<?php
if($_SESSION['tipi']=== "student"){
   echo "<div class='sidenav'>
<p class='heading'>KREU</p>
<a href='?tab=profili'><i class='fa fa-user-circle fa-lg'></i>Shiko Profilin</a>
<hr>
<a href='?tab=pagesat'><i class='fa fa-money-check fa-lg'></i>Shfaq Pagesat</a>
<hr>
<a href='?tab=notat'><i class='fa fa-table fa-lg'></i>Shfaq Notat</a>
<hr>
<a href='?tab=mesazhet'><i class='fa fa-envelope fa-lg'></i>Mesazhet Tuaja</a>
<hr>

</div>";
} else if ($_SESSION['tipi']=== "admin"){
    echo "<div class='sidenav'>
    <p class='heading'>KREU</p>
    <a href='?tab='><i class='fa fa-user-graduate fa-lg'></i>kot Profil</a>
    <a href='#services'><i class='fa fa-money-check fa-lg'></i>test Pagesat</a>
    <a href='#clients'><i class='fa fa-sticky-note fa-lg'></i>loq Notat</a>
    <a href='#contact'><i class='fa fa-envelope fa-lg'></i>s Tuaja</a>
    
    </div>";
} else if ($_SESSION['tipi']=== "sekretar"){
    echo "<div class='sidenav'>
    <p class='heading'>KREU</p>
    <a href='?tab=shikostudent'><i class='fa fa-user-graduate fa-lg'></i>Shiko Studentet</a>
    <hr>
    <a href='?tab=shtopages'><i class='fa fa-money-check fa-lg'></i>Shto Pagese</a>
    <hr>    
    <a href='?tab=shtomesazh'><i class='fa fa-envelope fa-lg'></i>Dergo Njoftime</a>
    <hr>
    </div>";
}
else{
    header("location: index.php");
    exit();
}

?>
