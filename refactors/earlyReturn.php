<?php

function run()
{


    $is_first_thing_working = true;
    $is_second_thing_working = true;
    $is_third_thing_working = true;
    $is_fourth_thing_working = true;

    // if( $is_first_thing_working === true ) {
    // 	if( $is_second_thing_working === true ) {
    // 		if( $is_third_thing_working === true ) {
    // 			if( $is_fourth_thing_working === true ) {
    // 				return 'Working properly!';
    // 			}
    // 			else {
    // 				return 'Fourth thing broken.';
    // 			}
    // 		}
    // 		else {
    // 			return 'Third thing broken.';
    // 		}
    // 	}
    // 	else {
    // 		return 'Second thing broken.';
    // 	}
    // }
    // else {
    // 	return 'First thing broken.';
    // }

    if (!$is_first_thing_working) {
        throw new Exception('First thing broken.');
    }
    if (!$is_second_thing_working) {
        throw new Exception('Second thing broken.');
    }
    if (!$is_third_thing_working) {
        throw new Exception('Third thing broken.');
    }
    if (!$is_fourth_thing_working) {
        throw new Exception('Fourth thing broken.');
    }

    return 'Working properly!';
}

function run2($esEstudiante, $esVeterano)
{


    // if ($esEstudiante) {
    //     return 0.2;
    // } else {
    //     if ($esVeterano) {
    //         return 0.1;
    //     } else {
    //         return 0;
    //     }
    // }
    $discount = 0;
    if ($esVeterano) {
        $discount = 0.1;
    }

    if ($esEstudiante) {
        $discount = 0.2;
    }

    return $discount;

    // if ($esEstudiante) {
    //     return 0.2;
    // }
    // if ($esVeterano) {
    //     return 0.1;
    // }
    // return 0;



}
