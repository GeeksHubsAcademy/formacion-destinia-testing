<?php

function upFirst($string) {

    return ucfirst($string);
}


function iAmPure($a, $b, $fn ) {

    $output =  $fn( 'hola' . $a . ' ' . $b);
    return $output;
}




echo iAmPure(1, 2, 'upFirst');