<?php
class FizzBuzz {
  public function step($number) {
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

  public function run($iterations) {
    $result = '';
    for ($i = 1; $i <= $iterations; $i++) {
      $result .= $this->step($i) . '\n';
    }
    return $result;
  }
}