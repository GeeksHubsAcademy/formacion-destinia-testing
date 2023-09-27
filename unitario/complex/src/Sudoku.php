<?php

class Sudoku
{

    private $rows;

    public function __construct($rows)
    {
        $this->rows = $rows;
    }

    public function isSolvedGeneric($array)
    {
        sort($array);
        $expected = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        return $array == $expected;
    }

    public function isRowSolved($row)
    {

        $currentRow = $this->rows[$row];
        return $this->isSolvedGeneric($currentRow);
    }

    public function isColumnSolved($column)
    {
        $currentColumn = $this->getColumn($column);
        return $this->isSolvedGeneric($currentColumn);
    }

    public function isSubgridSolved($index)
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
        $currentRow = $this->rows[$row];

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
        foreach ($this->rows as $row) {
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
                $currentSubgrid[] = $this->rows[$i][$j];
            }
        }
        return $currentSubgrid;
    }
    public function getRestValues($array) {
        $restValues = [];
        for ($i = 1; $i <= 9; $i++) {
            if (!in_array($i, $array)) {
                $restValues[] = $i;
            }
        }
        return $restValues;
    }
}
