<?php
    session_start();
    include_once 'includes/functions.inc.php';
    include_once 'includes/sidebar.php';
    include_once 'includes/dbh.inc.php';
   
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard <?php echo $_SESSION['tipi'] ?></title>
    <link rel='stylesheet' href="css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">



</head>


<body>

    <div class="navigation-bar">
        <div id="navigation-container">
            <img src="images/fti_logo_whit.png">
            <div id="tp" onclick="logOut()" style="cursor:pointer" class="my-fancy-container">
                <span class='my-icon icon-file-text'><i class="fa fa-user-circle fa-lg"></i></span>
                <span class='my-text'><?php echo $_SESSION["emri"]?></span>

                <div id="myDropdown" class="dropdown-content">
                    <a href="includes/logout.inc.php">DILNI</a>
                </div>
            </div>

        </div>


    </div>

    <div id="printable" class="main">
        <?php
            $vit = $_SESSION['viti'];
            $emri = $_SESSION['emri'];
            $email = $_SESSION['email'];
            $kodi = $_SESSION['kodi'];
            $loggedInID = $_SESSION["id"];

                if(isset($_GET['tab'])){
                    if($_GET["tab"]== "notat"){
                            $nota = merNoten($conn,$loggedInID,$vit);
                            include_once 'update_views/update_notat.php';
                            updateNotat($nota);                        
                    }
                    if($_GET["tab"]== "profili"){
                       $student_data_array = merTeDhenatPerUser($conn,$loggedInID);
                       include_once 'update_views/update_profile.php';
                       updateUserTab($student_data_array);
                    }
                
                    if($_GET["tab"]== "pagesat"){
                        $pagesat = merPagesat($conn,$loggedInID);
                        // var_dump($pagesat);
                        include_once 'update_views/update_pagesat.php';
                        updatePagesen($pagesat);
                    }
                    if($_GET["tab"]== "mesazhet"){
                        $mesazhet = merMesazhet($conn,$loggedInID);
                        include_once 'update_views/update_mesazhet.php';
                        updateMesazhet($mesazhet);
                    }
                    if($_GET["tab"]== "shikostudent"){

                        $html = "<form method='post' action='' class='wrapIt'>";
                            $html .= "<div>";
                            $html .= "<h3>Lista E Studenteve</h3>";
                            $html .= "<div class='in-line'>";
                            $html .= "<div class='selector-container'>
                            <select name='vit' id='vitiStudenteve'>
                                <option name='vitiStud' value='0'>Zgjidh Vitin:</option>
                                <option name='vitiStud' value='1'>1</option>
                                <option name='vitiStud' value='2'>2</option>
                                <option name='vitiStud' value='3'>3</option>
                            </select>";
                            $html .= "</div>";
                            $html .= "<div class='selector-container'>
                            <select name='grup' id='grupiStudenteve'>
                                <option name='grupval' value='0'>Zgjidh Grupin:</option>
                                <option name='grupval' value='A'>A</option>
                                <option name='grupval' value='B'>B</option>
                                <option name='grupval' value='C'>C</option>
                                <option name='grupval' value='D'>D</option>
                            </select>";
                            $html .= "</div>";
                            $html .= "</div>";
                            $html .= "<input type='submit' name='submit' value='Kerko >' class='kerko'/>";
                            $html .= "</form>";
                            echo $html;
                            if(isset($_POST['submit'])){
                                
                                include 'update_views/update_sekretar.php'; 
                                $viti_studentit = $_POST['vit'];
                                $grupi_studentit = $_POST['grup']; 
                                $all_stud = merNxenesit($conn,$grupi_studentit,$viti_studentit);
                                shfaqStudentetNgaViti($all_stud);
                            }                            
                    }

                    if($_GET["tab"]== "shtopages"){
                        $teGjithNxenesit = merTeGjithNxenesit($conn);
                      include 'update_views/update_sek_shtopages.php';
                        rregullo($teGjithNxenesit);
                    }
                    if($_GET["tab"]== "shtomesazh"){
                        $teGjithNxenesit = merTeGjithNxenesit($conn);
                        include 'update_views/update_sek_mesazh.php';
                        updateMesazh($teGjithNxenesit);   
                    }
                
                    if($_GET["tab"]== "editstudent"){
                        $id = intval($_GET['id']);
                        // echo $id;
                        $student_data_array = merTeDhenatPerUser($conn,$id);
                        include 'update_views/changeable_student_view.php';
                        showStudentData($student_data_array,$id);

                    }

                    
                }
            ?>
                    


    </div>




</body>
</html>


<script src='app/js/app.js'></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>