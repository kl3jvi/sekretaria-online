  <?php

function updateNotat($nota){
    echo "<table id='tabela-e-notave'>
    <tr>
      <th>Lenda</th>
      <th>Nota</th>
      <th>Statusi</th>
    </tr>";
    for ($x = 0; $x <= count($nota)-1; $x++) {
        
        $titulli = $nota[$x][0];
        $notaVal = $nota[$x][1];
        echo "<tr>
        <td><b>$titulli</b></td>
        <td id='nota' class='$x'>$notaVal</td>
        <td>";
        if($notaVal>4){
            echo "<p id='s' style='border: 1px solid #ccc;
            border-radius: 4px; background-color: #1cc88a;  width: 50px; margin-left: 10px; padding: 12px 20px; color: #fff; text-align: center;'>Kalues</p></td>
          </tr>";
        } else {
            echo "<p id='s' style='border: 1px solid #ccc;
            border-radius: 4px; background-color: #e74a3b;  width: 50px; margin-left: 10px; padding: 12px 20px; color: #fff; text-align: center;'>Mbetes</p></td>
          </tr>";
        }
      } 
      echo "</table><br>";
       echo "</div>";
      echo "<p id='mesatare' style='margin-left: 270px; color: #29394b'></p>";
      echo "<button style='width: 350px; margin-left:300px;' onclick='downloadPDFWithBrowserPrint()' class='btn1'>Printo Listen e Notave </button>";
}
