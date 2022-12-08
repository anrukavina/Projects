<?php

echo '<div class="table-responsive">';
 echo '<table class="table">';    

    $rowNumber = isset($_GET['row']) ? $_GET['row'] : 0;
    $colNumber = isset($_GET['col']) ? $_GET['col'] : 0;

    $top = 0;
    $bottom = $rowNumber - 1;
    $left = 0;
    $right = $colNumber - 1;

    switch(isset($_GET['index']) ? $_GET['index'] : 1) {
      case '1':
        $indexValue = 0;
        break;
      
      case '2':
        $indexValue = 1;
        break;

      default:
        $indexValue = 1;
  }

      while($rowNumber !=0 && $colNumber !=0) {
          
          for($i=$right; $i >= $left; $i--) {
              $matrix[$top][$i] = $indexValue++;
          }
          $top++;

            if($top > $bottom) {
                break;
            }

          for($i=$top; $i <= $bottom; $i++) {
              $matrix[$i][$left] = $indexValue++;
          }
          $left++;

            if($left > $right) {
                break;
            }

          for($i=$left; $i <= $right; $i++) {
              $matrix[$bottom][$i] = $indexValue++;
          }
          $bottom--;

            if($top > $bottom) {
                break;
            }

          for($i=$bottom; $i >= $top; $i--) {
              $matrix[$i][$right] = $indexValue++;
          }
          $right--;

            if($left > $right) {
                break;
            }
      }

      if($_GET['index'] == 2) {
        for ($i = 0; $i < $rowNumber; $i++) {
          echo '<tr>';
            for ($j = 0; $j < $colNumber; $j++) {
              
                if ($matrix[$i][$j] == $colNumber * $rowNumber) {
                  echo '<td style="background-color: red">';
                    echo $matrix[$i][$j];
                  echo '</td>';
                } 
              
                elseif ($matrix[$i][$j] == $matrix[0][$colNumber - 1] ) {
                  echo '<td style="background-color: gray">';
                    echo $matrix[$i][$j];
                  echo '</td>';
                }
                else {
                  echo '<td>';
                    echo $matrix[$i][$j];
                  echo '</td>';
                }
              
            }
          echo '</tr>';
              
        }
      } elseif($_GET['index'] == 1) {
          for ($i = 0; $i < $rowNumber; $i++) {
            echo '<tr>';
              for ($j = 0; $j < $colNumber; $j++) {
                
                  if ($matrix[$i][$j] == ($colNumber * $rowNumber) - 1){
                    echo '<td style="background-color: red">';
                      echo $matrix[$i][$j];
                    echo '</td>';
                  } 
                
                  elseif ($matrix[$i][$j] == $matrix[0][$colNumber - 1] ) {
                    echo '<td style="background-color: gray">';
                      echo $matrix[$i][$j];
                    echo '</td>';
                  }
                  else {
                    echo '<td>';
                      echo $matrix[$i][$j];
                    echo '</td>';
                  }
                
              }
            echo '</tr>';
         }
        }

 echo '</table>';
echo '</div>';

?>