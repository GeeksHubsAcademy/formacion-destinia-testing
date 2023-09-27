<?php

require_once 'src/Sudoku.php';
use PHPUnit\Framework\TestCase;

class SudokuTest extends TestCase {



    static function rowProvider()
    {
        return [
            [[1,2,3,4,5,6,7,8,9], true],
            [[2,3,4,5,6,7,8,9,1], true],
            [[3,4,5,6,7,8,9,2,1], true],
            [[10,9,8,7,6,5,4,3,2,1], false],
            [[9,9,8,7,6,5,4,3,2], false],
            [[2,3,4,5,6,7,8,9,10], false]
        ];
    }

    /**
     * @dataProvider rowProvider
     */
    public function testRowSolved($row, $expected)
    {
        $sudoku = new Sudoku([$row]);
        $this->assertEquals($expected, $sudoku->isRowSolved(0));
    }

    public function testValidDifferentRows()
    {
        $sudoku = new Sudoku([[1,2,3,4,5,6,7,8,9], [2,3,4,5,6,7,8,9,1]]);
        $this->assertEquals(true, $sudoku->isRowSolved(0));
        $this->assertEquals(true, $sudoku->isRowSolved(1));
    }





}