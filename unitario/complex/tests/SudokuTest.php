<?php

require_once 'src/Sudoku.php';

use PHPUnit\Framework\TestCase;

class SudokuTest extends TestCase
{


    static function dataProvider()
    {
        return [
            [[1, 2, 3, 4, 5, 6, 7, 8, 9], true],
            [[2, 3, 4, 5, 6, 7, 8, 9, 1], true],
            [[3, 4, 5, 6, 7, 8, 9, 2, 1], true],
            [[9, 9, 8, 7, 6, 5, 4, 3, 2, 1], false],
            [[10, 9, 8, 7, 6, 5, 4, 3, 2, 1], false],
            [[9, 9, 8, 7, 6, 5, 4, 3, 2], false],
            [[2, 3, 4, 5, 6, 7, 8, 9, 10], false]
        ];
    }

    /**
     * @dataProvider dataProvider
     */
    public function testRowSolved($row, $expected)
    {
        $sudoku = new Sudoku([$row]);

        $this->assertEquals($expected, $sudoku->isRowSolved(0));
    }

    public function testValidDifferentRows()
    {
        $sudoku = new Sudoku([[0, 2, 3, 4, 5, 6, 7, 8, 9], [2, 3, 4, 5, 6, 7, 8, 9, 1]]);
        $this->assertEquals(false, $sudoku->isRowSolved(0));
        $this->assertEquals(true, $sudoku->isRowSolved(1));
    }


    /**
     * @dataProvider dataProvider
     */
    public function testColumnSolved($array, $expected)
    {
        $grid = [];
        foreach ($array as $value) {
            $grid[] = [$value];
        }
        $sudoku = new Sudoku($grid);
        $this->assertEquals($expected, $sudoku->isColumnSolved(0));
    }



    /**
     * @dataProvider dataProvider
     */
    public function testSubGridSolved($array, $expected)
    {
        $grid3x3 = [];
        for ($i = 0; $i < 3; $i++) {
            $grid3x3[] = array_slice($array, $i * 3, 3);
        }
        $sudoku = new Sudoku($grid3x3);
        $this->assertEquals($expected, $sudoku->isSubGridSolved(0));
    }

    public function testSubGridSolvedEspecialCases()
    {
        $sudoku = new Sudoku([
            [1, 2, 3, 4, 5, 6, 7, 8, 9],
            [4, 5, 6, 7, 8, 9, 1, 2, 3],
            [7, 8, 9, 1, 2, 3, 4, 5, 6],

            [1, 2, 3, 4, 5, 6, 7, 8, 9],
            [1, 2, 3, 4, 5, 6, 7, 8, 9],
            [4, 5, 6, 7, 8, 9, 1, 2, 3],

            [4, 5, 6, 7, 8, 9, 1, 2, 3],
            [7, 8, 9, 1, 2, 3, 4, 5, 6],
            [7, 8, 9, 1, 2, 3, 4, 5, 6],

        ]);

        $this->assertEquals(true, $sudoku->isSubGridSolved(0));
        $this->assertEquals(true, $sudoku->isSubGridSolved(1));
        $this->assertEquals(true, $sudoku->isSubGridSolved(2));

        $this->assertEquals(false, $sudoku->isSubGridSolved(3));
        $this->assertEquals(false, $sudoku->isSubGridSolved(4));
        $this->assertEquals(false, $sudoku->isSubGridSolved(5));

        $this->assertEquals(false, $sudoku->isSubGridSolved(6));
        $this->assertEquals(false, $sudoku->isSubGridSolved(7));
        $this->assertEquals(false, $sudoku->isSubGridSolved(8));
    }


    public function testIsSolvedTrue()
    {
        $sudoku = new Sudoku([
            [1, 2, 3, 4, 5, 6, 7, 8, 9],
            [4, 5, 6, 7, 8, 9, 1, 2, 3],
            [7, 8, 9, 1, 2, 3, 4, 5, 6],

            [3, 1, 2, 6, 4, 5, 9, 7, 8],
            [6, 4, 5, 9, 7, 8, 3, 1, 2],
            [9, 7, 8, 3, 1, 2, 6, 4, 5],

            [2, 3, 1, 5, 6, 4, 8, 9, 7],
            [5, 6, 4, 8, 9, 7, 2, 3, 1],
            [8, 9, 7, 2, 3, 1, 5, 6, 4],

        ]);

        $this->assertEquals(true, $sudoku->isSolved());
    }

    public function testIsSolvedFalse2()
    {
        $sudoku = new Sudoku([
            [1, 2, 3, 4, 5, 6, 7, 8, 9],
            [4, 5, 6, 7, 8, 9, 1, 2, 3],
            [7, 8, 9, 1, 2, 3, 4, 5, 6],

            [3, 1, 2, 6, 4, 5, 9, 7, 8],
            [6, 4, 5, 9, 7, 8, 3, 1, 2],
            [9, 7, 8, 3, 1, 2, 6, 4, 5],

            [2, 3, 1, 5, 6, 4, 8, 9, 7],
            [5, 6, 4, 8, 9, 7, 2, 3, 1],
            [8, 9, 7, 4, 3, 1, 5, 6, 2],

        ]);

        $this->assertEquals(false, $sudoku->isSolved());
    }

    public function testIsSolvedFalse()
    {
        $sudoku = new Sudoku([
            [1, 2, 3, 4, 5, 6, 7, 8, 9],
            [4, 5, 6, 7, 8, 9, 1, 2, 3],
            [7, 8, 9, 1, 2, 3, 4, 5, 6],

            [1, 2, 3, 4, 5, 6, 7, 8, 9],
            [1, 2, 3, 4, 5, 6, 7, 8, 9],
            [4, 5, 6, 7, 8, 9, 1, 2, 3],

            [4, 5, 6, 7, 8, 9, 1, 2, 3],
            [7, 8, 9, 1, 2, 3, 4, 5, 6],
            [7, 8, 9, 1, 2, 3, 4, 5, 6],

        ]);

        $this->assertEquals(false, $sudoku->isSolved());
    }
}
