<?php

class Sudoku
{

    private $rows;

    public function __construct($rows)
    {
        $this->rows = $rows;
    }

    public function isRowSolved($row)
    {
        // sort($this->rows[$row]);
        // $rowAsString = implode('', $this->rows[$row]);
        // return preg_match('/^[1-9]{9}$/', $rowAsString) === 1;

        $currentRow = $this->rows[$row];
        sort($currentRow);
        $expectedRow = [1,2,3,4,5,6,7,8,9];
        return $currentRow == $expectedRow;


        // $currentRow = $this->rows[$row];
        // $uniqueNumbers = array_unique($currentRow);
        // if (count($uniqueNumbers) != 9) {
        //     return false;
        // }
        // foreach ($uniqueNumbers as $number) {
        //     if ($number < 1 || $number > 9) {
        //         return false;
        //     }
        // }
        // return true;
    }
}
