<?php


function fizzbuzzStep($number) {
  if ($number % 15 === 0) {
    return 'GeeksHubs';
  }
  if ($number % 3 === 0) {
    return 'Geeks';
  }
  if ($number % 5 === 0) {
    return 'Hubs';
  }
  return $number;
}

function fizzbuzz($iterations) {
  $result = '';
  for ($i = 1; $i <= $iterations; $i++) {
    $result .= fizzbuzzStep($i) . '\n';
  }
  return $result;
}
