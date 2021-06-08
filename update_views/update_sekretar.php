<?php
function shfaqStudentetNgaViti($data){

$html = "<div style='width: 100%;margin-top: 10px;margin-right:100px' id='tabela-e-studenteve'>";
$html .= "<table>
<tr>
  <th>Studenti</th>
  <th>Viti</th>
  <th>Grupi</th>
  <th>Azhorno</th>
</tr>";
for ($x = 0; $x <= count($data)-1; $x++) {
  
    $emri_studentit = $data[$x][1];
    $viti_studentit = $data[$x][3];
    $grupi_studentit = $data[$x][4];
    $test = $data[$x][0];
   

    $html .= "<tr>
    <td><b>$emri_studentit</b></td>
    <td id='nota' class=''>$viti_studentit</td>
    <td>$grupi_studentit</td>
    <form action='includes/changeStudent.php' method='post'>
    <td><input type='submit' style='font-size: 14px'  name='ndrysho' value='Ndrysho' class='kerko'/></td>
    <input type='hidden' name='idd' value='$test'/>
    </form>";
}

$html .= "</div>";
echo $html;








// echo count($data);


}