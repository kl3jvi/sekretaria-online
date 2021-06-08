<?php
function updatePagesen($pagesat){
    
    $std_cmimi = $pagesat[0][0];
    $std_viti = $pagesat[0][1];
    $std_fushaEStudimit = $pagesat[0][2];
    $std_paguar = $pagesat[0][3];



    
    echo "<table id='tabela-e-pagesave'>
                            <tr>
                              <th>Çmimi</th>
                              <th>Viti akademik</th>
                              <th>Fusha e Studimit</th>
                              <th>Paguar</th>
                            </tr>";

                            for ($x = 0; $x <= count($pagesat)-1; $x++) {
                                
                                
                                echo "<tr>
                                <td><b>$std_cmimi</b></td>
                                <td id='nota' class='$x'>$std_viti</td>
                                <td id='nota' class='$x'>$std_fushaEStudimit</td>
                                <td>";
                                if($std_paguar===1){
                                  echo "<p id='s' style='border: 1px solid #ccc;
                                  border-radius: 4px; background-color: #1cc88a;  width: 50px; margin-left: 10px; padding: 12px 20px; color: #fff; text-align: center;'>Paguar</p></td>";
                                } else if ($std_paguar===0) {
                                  echo "<p id='s' style='border: 1px solid #ccc;
                                  border-radius: 4px; background-color: #e74a3b;  width: 50px; margin-left: 10px; padding: 12px 20px; color: #fff; text-align: center;'>Pa Paguar</p></td>";
                                }
                              echo "</tr>";
                              } 

                              echo "</table>";
}