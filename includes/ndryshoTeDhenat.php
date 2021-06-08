<?php
if(isset($_POST['submit'])){
    require_once 'dbh.inc.php';
       require_once 'functions.inc.php';

    $std_emer = $_POST['emri'];
    $std_email = $_POST['email'];
    $std_viti = $_POST['viti'];
   
    $std_atesia = $_POST['atesia'];
    $std_nr_matrikulli = $_POST['nr_matrikullimi'];
    $std_cikli = $_POST['cikli'];
    $std_dega = $_POST['dega'];
    $std_gjinia = $_POST['gjinia'];
    $std_ditelindja = $_POST['ditelindja'];
    $std_vendlindja = $_POST['vendlindja'];
    $std_id = $_POST['idd'];
    
    if(sekretarUpdateUser($conn,$std_atesia,$std_nr_matrikulli,$std_cikli,$std_dega,$std_gjinia,$std_ditelindja,$std_vendlindja,$std_id)){

        echo "<script>alert('Studenti u azhornua me sukses!')</script>";
    };
    
}