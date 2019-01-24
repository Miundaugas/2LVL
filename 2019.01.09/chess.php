<?php

echo "<div>";
for($i=0; $i < 8; $i++){
    echo "<div class='block' style='display:flex'>";
    for($j=0; $j < 8; $j++){
        if($i % 2 == 0){
            if($j % 2 == 0){
                echo '<div style="background-color: green; width: 100px; height:100px"></div>';
            } else {
               echo '<div style="background-color: black; width: 100px; height:100px"></div>'; 
            }
        } 
        else {
           if($j % 2 == 0){
                echo '<div style="background-color: black; width: 100px; height:100px"></div>';
            } else {
               echo '<div style="background-color: green; width: 100px; height:100px"></div>'; 
            } 
        }
    }
    echo "</div>";
}
echo "</div>";