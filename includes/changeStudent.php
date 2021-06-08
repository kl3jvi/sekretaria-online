<?php

if(isset($_POST['ndrysho'])){
    // $_SESSION['edit_ID'] = $_POST['idd'];
    // echo  $_SESSION['edit_ID'];
    $id = $_POST['idd'];
    header("location: ../dashboard.php?tab=editstudent&id=$id");
    exit();
  }
  