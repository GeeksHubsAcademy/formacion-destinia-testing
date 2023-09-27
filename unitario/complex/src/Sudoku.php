<?php

class Sudoku
{

    private $rows;

    public function __construct($rows)
    {
        $this->rows = $rows;
    }

    public function isSolvedGeneric($array) {
        sort($array);
        $expected = [1,2,3,4,5,6,7,8,9];
        return $array == $expected;
    }

    public function isRowSolved($row)
    {

        $currentRow = $this->rows[$row];
        return $this->isSolvedGeneric($currentRow);


    }

    public function isColumnSolved($column) {
        $currentColumn = [];
        foreach ($this->rows as $row) {
            $currentColumn[] = $row[$column];
        }

        return $this->isSolvedGeneric($currentColumn);
    }

    public function isSubgridSolved($index) {
        // index 0 is first subgrid 3 x 3 top left
        // index 1 is second subgrid 3 x 3 top middle
        // ...

        $currentSubgrid = [];
        $rowIndex = floor($index / 3) * 3;
        $columnIndex = ($index % 3) * 3;

        for ($i = $rowIndex; $i < $rowIndex + 3; $i++) {
            for ($j = $columnIndex; $j < $columnIndex + 3; $j++) {
                $currentSubgrid[] = $this->rows[$i][$j];
            }
        }

        return $this->isSolvedGeneric($currentSubgrid);



    }

    public function isSolved() {
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
}
