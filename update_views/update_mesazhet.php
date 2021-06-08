<?php
function updateMesazhet($msg){





    if(empty($msg)){
        echo "<div style='width: 100%; background-color: border: 1px solid #b8daff; background-color: #cce5ff;'>
        <p style='text-align: center; color: #425b76;'>Nuk ka Asnje Mesazh.</p>
        </div>";
    } else {
        

    echo "<div class='kto'>";
   
    for($x=0; $x<= count($msg)-1; $x++){
        $msg_title = $msg[$x][1];
        $msg_body = $msg[$x][2];
        $msg_priority =$msg[$x][3];
        
        echo "<div class='notification'>
        <div>
            <i id='mail' style='color: #004085; font-size: 1.5em;' class='fa fa-envelope' aria-hidden='true'></i>
        
    </div>
    
        <div>
            <p style='color: #004085; margin: 0px;'>$msg_title</p>
            <p style='color: #004085; margin: 0px; font-size: 12px'>$msg_body</p>
        </div>  
    
    </div>
    <div class='break'></div>";

    }

    echo "</div>";
    }
}

