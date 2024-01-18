<?php
function calcularDescuento($esEstudiante, $esVeterano, $rubio) {
    $extra = 0;
    if ($rubio) {
         $extra = 0.05;
    }

   if ($esEstudiante) {
       return $extra* 0.2;
   }

   if ($esVeterano) {
       return $extra * 0.1;
   }

   return 0;
}
