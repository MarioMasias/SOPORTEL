<?php 

   $horai = "17:01";
   $horaac = "17:03";
   
   $hi = intval($horai[3].$horai[4]);
   $hc= intval($horaac[3].$horaac[4]);
   
   if($hi + 15 > $hc and  $hi < $hc){
    echo "si es menor";
   }else {
    echo "no es menor";
   }
?>