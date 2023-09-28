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


    static function gridsDataProvider()
    {

        // all commented code above is replaced by this dataProvider
        return           [
            'all empty' =>
            [
                true,
                [
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0]
                ]
            ],
            'diagonal' =>
            [
                true,
                [
                    [1, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 2, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 3, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 4, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 5, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 6, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 7, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 8, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 9],

                ]
            ],
            'solved and Valid' =>
            [
                true,
                [
                    [1, 2, 3, 4, 5, 6, 7, 8, 9],
                    [4, 5, 6, 7, 8, 9, 1, 2, 3],
                    [7, 8, 9, 1, 2, 3, 4, 5, 6],

                    [3, 1, 2, 6, 4, 5, 9, 7, 8],
                    [6, 4, 5, 9, 7, 8, 3, 1, 2],
                    [9, 7, 8, 3, 1, 2, 6, 4, 5],

                    [2, 3, 1, 5, 6, 4, 8, 9, 7],
                    [5, 6, 4, 8, 9, 7, 2, 3, 1],
                    [8, 9, 7, 2, 3, 1, 5, 6, 4],

                ]
            ],

            'almost solved' => [
                true,
                [
                    [1, 2, 3, 4, 5, 6, 7, 8, 9],
                    [4, 5, 6, 7, 8, 9, 1, 2, 3],
                    [7, 8, 0, 1, 2, 3, 4, 5, 6],

                    [3, 1, 2, 6, 4, 5, 9, 7, 8],
                    [6, 4, 5, 0, 7, 8, 3, 0, 2],
                    [9, 7, 8, 0, 1, 2, 6, 4, 5],

                    [2, 3, 1, 5, 6, 4, 8, 9, 7],
                    [5, 0, 4, 8, 9, 7, 0, 3, 1],
                    [8, 9, 7, 2, 3, 1, 5, 6, 4],

                ]
            ],

            'almost solved but invalid' => [
                false,
                [
                    [1, 2, 3, 4, 5, 6, 7, 8, 9],
                    [4, 5, 6, 7, 8, 9, 1, 2, 3],
                    [7, 8, 0, 1, 2, 3, 4, 5, 6],

                    [3, 1, 2, 6, 4, 5, 9, 7, 8],
                    [6, 4, 5, 3, 7, 8, 3, 0, 2],
                    [9, 7, 8, 9, 1, 2, 6, 4, 5],

                    [2, 3, 1, 5, 6, 4, 8, 9, 7],
                    [5, 0, 4, 8, 9, 7, 0, 3, 1],
                    [8, 9, 7, 2, 3, 1, 5, 6, 4],
                ]

            ],
            'invalid Repeated subgrid' => [
                false,
                [
                    [1, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 1, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 1, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 1, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 1, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 1, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 1, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 1, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 1],

                ]
            ],

            'invalid miss match length ' => [
                false,
                [
                    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],

                ]
            ],
            'invalid miss match length 2' => [
                false,
                [
                    [0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                ]
            ],
            'invalid out of range' => [
                false,
                [
                    [0, 0, 0, 10, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],

                ]
            ],
            'invalid repeated column' => [
                false,
                [
                    [0, 0, 0, 9, 0, 0, 0, 0, 0],
                    [0, 0, 0, 9, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],

                ]
            ],
            'invalid repeated row' => [

                false,
                [
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 9, 9, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0, 0, 0, 0],

                ]
            ]



        ];
    }

    /**
     * @dataProvider gridsDataProvider
     */
    public function testIsValid($expected, $grid)
    {

        $sudoku = new Sudoku($grid);

        $this->assertEquals($expected, $sudoku->isValid());
    }



    static function restDataProvider()
    {

        return           [
            'none' =>
            [
                [0, 0, 0, 0, 0, 0, 0, 0, 0],
                [1, 2, 3, 4, 5, 6, 7, 8, 9]
            ],
            'all' =>
            [
                [1, 2, 3, 4, 5, 6, 7, 8, 9],
                []
            ],
            'some' =>
            [
                [1, 0, 3, 4, 0, 6, 7, 8, 9],
                [2, 5]
            ],


        ];
    }

    /**
     * @dataProvider restDataProvider
     */
    public function testGetRestValues($input, $output)
    {

        $sudoku = new Sudoku([]);
        $this->assertEquals($output, $sudoku->getRestValues($input));
    }



    public function testGetSubgridIndex()
    {
        $sudoku = new Sudoku([]);
        $this->assertEquals(0, $sudoku->getSubgridIndex(0, 0));
        $this->assertEquals(1, $sudoku->getSubgridIndex(3, 2));
        $this->assertEquals(8, $sudoku->getSubgridIndex(8, 8));
    }

    public function testSetCellUniqueValue()
    {
        $sudoku = new Sudoku([
            [0, 2, 3, 4, 5, 6, 7, 8, 9],
            [4, 5, 6, 7, 8, 9, 1, 2, 3],
            [7, 8, 9, 1, 2, 3, 4, 5, 6],

            [3, 1, 2, 6, 4, 5, 9, 7, 8],
            [6, 4, 5, 9, 7, 8, 3, 1, 2],
            [9, 7, 8, 3, 1, 2, 6, 4, 5],

            [2, 3, 1, 5, 6, 4, 8, 9, 7],
            [5, 6, 4, 8, 9, 7, 2, 3, 1],
            [8, 9, 7, 2, 3, 1, 5, 6, 4],
        ]);

        $hasBeenSet = $sudoku->setCellUniqueValue(8, 8);
        $this->assertEquals(false, $hasBeenSet);

        $this->assertEquals(4, $sudoku->getGrid()[8][8]);

        $hasBeenSet = $sudoku->setCellUniqueValue(0, 0);
        $this->assertEquals(true, $hasBeenSet);

        $this->assertEquals(1, $sudoku->getGrid()[0][0]);
    }

    public function testSetCellUniqueValueImposible()
    {
        $sudoku = new Sudoku([
            [0, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0],

        ]);

        // must return false if is imposible to set a value
        $this->assertEquals(false, $sudoku->setCellUniqueValue(0, 0));
    }
    public function testSolveKnown_posible()
    {
        $sudoku = new Sudoku([
            [0, 2, 3, 4, 5, 6, 7, 8, 9],
            [4, 5, 6, 7, 8, 9, 1, 2, 3],
            [7, 8, 9, 1, 2, 3, 4, 5, 6],

            [3, 1, 2, 6, 4, 5, 9, 7, 8],
            [6, 4, 5, 9, 0, 8, 3, 1, 2],
            [9, 7, 8, 3, 1, 2, 6, 4, 5],

            [2, 3, 1, 5, 6, 4, 8, 9, 7],
            [5, 6, 4, 8, 9, 7, 0, 3, 1],
            [8, 9, 7, 2, 3, 1, 5, 6, 4],
        ]);

        $sudoku->solveKnown();

        $this->assertEquals(true, $sudoku->isSolved());

        $this->assertEquals(
            $sudoku->getGrid(),
            [
                [1, 2, 3, 4, 5, 6, 7, 8, 9],
                [4, 5, 6, 7, 8, 9, 1, 2, 3],
                [7, 8, 9, 1, 2, 3, 4, 5, 6],

                [3, 1, 2, 6, 4, 5, 9, 7, 8],
                [6, 4, 5, 9, 7, 8, 3, 1, 2],
                [9, 7, 8, 3, 1, 2, 6, 4, 5],

                [2, 3, 1, 5, 6, 4, 8, 9, 7],
                [5, 6, 4, 8, 9, 7, 2, 3, 1],
                [8, 9, 7, 2, 3, 1, 5, 6, 4],
            ]

        );
    }

    public function testSolveKnown_imposible()
    {
        $sudoku = new Sudoku([
            [0, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0],
        ]);


        $sudoku->solveKnown();

        $this->assertEquals(false, $sudoku->isSolved());
    }

    public function testSolve()
    {
        $sudoku = new Sudoku([
            [0, 2, 3, 4, 5, 6, 7, 8, 9],
            [4, 5, 6, 7, 8, 9, 1, 2, 3],
            [7, 8, 9, 1, 2, 3, 4, 5, 6],

            [3, 1, 2, 6, 4, 5, 9, 7, 8],
            [6, 4, 5, 9, 0, 8, 3, 1, 2],
            [9, 7, 8, 3, 1, 2, 6, 4, 5],

            [2, 3, 1, 5, 6, 4, 8, 9, 7],
            [5, 6, 4, 8, 9, 7, 0, 3, 1],
            [8, 9, 7, 2, 3, 1, 5, 6, 4],
        ]);

        $sudoku->solve();

        $this->assertEquals(true, $sudoku->isSolved());

        $this->assertEquals(
            $sudoku->getGrid(),
            [
                [1, 2, 3, 4, 5, 6, 7, 8, 9],
                [4, 5, 6, 7, 8, 9, 1, 2, 3],
                [7, 8, 9, 1, 2, 3, 4, 5, 6],

                [3, 1, 2, 6, 4, 5, 9, 7, 8],
                [6, 4, 5, 9, 7, 8, 3, 1, 2],
                [9, 7, 8, 3, 1, 2, 6, 4, 5],

                [2, 3, 1, 5, 6, 4, 8, 9, 7],
                [5, 6, 4, 8, 9, 7, 2, 3, 1],
                [8, 9, 7, 2, 3, 1, 5, 6, 4],
            ]

        );
    }

    public function testSolve_imposible()
    {
        $sudoku = new Sudoku([
            [0, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0],
        ]);


        $sudoku->solve();

        $this->assertEquals(true, $sudoku->isSolved());
    }

    public function testSolveHard()
    {

        $sudoku = new Sudoku([
            [0, 3, 7, 0, 9, 0, 0, 0, 0],
            [4, 0, 0, 0, 0, 5, 6, 0, 0],
            [0, 0, 0, 0, 0, 0, 9, 7, 0],

            [3, 0, 0, 5, 0, 6, 0, 8, 4],
            [0, 2, 5, 0, 7, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0],

            [0, 0, 0, 3, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 4, 0],
            [8, 5, 0, 0, 2, 9, 0, 6, 0]
        ]);

        $sudoku->solve();
        $this->assertEquals(true, $sudoku->isSolved());
    }

    public function testSolveHard2()
    {

        $sudoku = new Sudoku([

            [6, 0, 0, 0, 0, 0, 4, 0, 0],
            [0, 8, 0, 0, 0, 7, 0, 0, 0],
            [0, 0, 0, 2, 0, 0, 5, 7, 0],

            [0, 0, 9, 7, 0, 5, 0, 0, 4],
            [0, 0, 6, 0, 4, 0, 9, 0, 0],
            [3, 0, 0, 9, 0, 0, 0, 0, 0],

            [0, 2, 1, 4, 0, 0, 7, 0, 0],
            [0, 0, 0, 8, 0, 0, 0, 2, 0],
            [0, 0, 0, 5, 3, 0, 0, 0, 0]
        ]);
        $sudoku->solveOptimum();
        $this->assertEquals(true, $sudoku->isSolved());
    }
}
