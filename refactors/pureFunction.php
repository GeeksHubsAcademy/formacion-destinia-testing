<?php

function upFirst($string) {
    return ucfirst($string);
}


function iAmPure($a, $b, $fn ) {


    return $fn( 'hola' . $a . ' ' . $b);
}




echo iAmPure(1, 2, 'upFirst');