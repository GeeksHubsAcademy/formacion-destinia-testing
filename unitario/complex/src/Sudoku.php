<?php

class Sudoku
{


    private $sudokuGrid = [];

    public function __construct($sudokuGrid)
    {
        $this->sudokuGrid = $sudokuGrid;
    }

    public function getGrid()
    {
        return $this->sudokuGrid;
    }

    private function isSolvedGeneric($array)
    {
        sort($array);
        $expected = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        return $array == $expected;
    }

    private function isRowSolved($row)
    {

        $currentRow = $this->sudokuGrid[$row];
        return $this->isSolvedGeneric($currentRow);
    }

    private function isColumnSolved($column)
    {
        $currentColumn = $this->getColumn($column);
        return $this->isSolvedGeneric($currentColumn);
    }

    private function isSubgridSolved($index)
    {
        // index 0 is first subgrid 3 x 3 top left
        // index 1 is second subgrid 3 x 3 top middle
        // ...

        $currentSubgrid = $this->getSubgrid($index);

        return $this->isSolvedGeneric($currentSubgrid);
    }

    public function isSolved()
    {
        for ($i = 0; $i < 9; $i++) {
            if (!$this->isRowSolved($i)) {
                return false;
            }
            if (!$this->isColumnSolved($i)) {
                return false;
            }
            if (!$this->isSubgridSolved($i)) {
                return false;
            }
        }

        return true;
    }
    public function isValid()
    {
        for ($i = 0; $i < 9; $i++) {
            if (!$this->isRowValid($i)) {
                return false;
            }
            if (!$this->isColumnValid($i)) {
                return false;
            }
            if (!$this->isSubgridValid($i)) {
                return false;
            }
        }

        return true;
    }
    private function isValidGeneric($array)
    {
        if (count($array) != 9) {
            return false;
        }
        $numbers = [];
        foreach ($array as $value) {
            if ($value === 0) {
                continue;
            }
            if (isset($numbers[$value])) {
                return false;
            }

            if ($value >= 1 && $value <= 9) {
                $numbers[$value] = true;
            } else {
                return false;
            }
        }
        return true;
    }

    private function isRowValid($row)
    {
        $currentRow = $this->sudokuGrid[$row];

        return $this->isValidGeneric($currentRow);
    }
    private function isColumnValid($column)
    {
        $currentColumn = $this->getColumn($column);
        return $this->isValidGeneric($currentColumn);
    }

    private function isSubGridValid($index)
    {
        $currentSubgrid = $this->getSubgrid($index);

        return $this->isValidGeneric($currentSubgrid);
    }
    private function getColumn($column)
    {
        $currentColumn = [];
        foreach ($this->sudokuGrid as $row) {
            $currentColumn[] = $row[$column];
        }
        return $currentColumn;
    }

    private function getSubgrid($index)
    {
        $currentSubgrid = [];
        $rowIndex = floor($index / 3) * 3;
        $columnIndex = ($index % 3) * 3;

        for ($i = $rowIndex; $i < $rowIndex + 3; $i++) {
            for ($j = $columnIndex; $j < $columnIndex + 3; $j++) {
                $currentSubgrid[] = $this->sudokuGrid[$i][$j];
            }
        }
        return $currentSubgrid;
    }
    private function getRestValues($array)
    {
        $restValues = [];
        for ($i = 1; $i <= 9; $i++) {
            if (!in_array($i, $array)) {
                $restValues[] = $i;
            }
        }
        return $restValues;
    }

    private function getSubgridIndex($column, $row)
    {
        $subgridColumn = floor($column / 3);
        $subgridRow = floor($row / 3);
        return $subgridRow * 3 + $subgridColumn;
    }

    private function setCellUniqueValue($column, $row)
    {
        $currentCell = $this->sudokuGrid[$row][$column];
        if ($currentCell !== 0) {
            return false;
        }
        $currentRow = $this->sudokuGrid[$row];
        $restRowValues = $this->getRestValues($currentRow);

        if (count($restRowValues) === 1) {
            $this->sudokuGrid[$row][$column] = array_values($restRowValues)[0];
            return true;
        }


        $currentColumn = $this->getColumn($column);
        $restColumnValues = $this->getRestValues($currentColumn);


        if (count($restColumnValues) === 1) {
            $this->sudokuGrid[$row][$column] = array_values($restColumnValues)[0];
            return true;
        }


        $currentSubgrid = $this->getSubgrid($this->getSubgridIndex($column, $row));
        $restSubgridValues = $this->getRestValues($currentSubgrid);

        if (count($restSubgridValues) === 1) {
            $this->sudokuGrid[$row][$column] = array_values($restSubgridValues)[0];
            return true;
        }
        return false;
    }

    public function solveKnown()
    {
        $changed = true;
        while ($changed === true) {
            $changed = false;
            for ($i = 0; $i < 9; $i++) {
                for ($j = 0; $j < 9; $j++) {
                    if ($this->setCellUniqueValue($i, $j)) {
                        $changed = true;
                    }
                }
            }
        }
        return $changed;
    }
    private function isValidNumber($row, $col, $num) {
        $this->sudokuGrid[$row][$col] = $num;

        $isAllValid = $this->isValid();
        if ($isAllValid) {
            $this->sudokuGrid[$row][$col] = 0;
            return true;
        } else {
            $this->sudokuGrid[$row][$col] = 0;

            return false;
        }



    }
    public function solve()
    {
        for ($row = 0; $row < 9; $row++) {
            for ($col = 0; $col < 9; $col++) {
                if ($this->sudokuGrid[$row][$col] === 0) {
                    for ($num = 1; $num <= 9; $num++) {
                        if ($this->isValidNumber($row, $col, $num)) {
                            $this->sudokuGrid[$row][$col] = $num;
                            if ($this->solve()) {
                                return true;
                            }
                            $this->sudokuGrid[$row][$col] = 0; // Deshacer el intento si no funciona
                        }
                    }
                    return false; // No se puede encontrar una solución válida
                }
            }
        }
        return true; // Se ha completado correctamente
    }
    public function solveOptimum()
    {
        $this->solveKnown();
        $this->solve();
    }
}
