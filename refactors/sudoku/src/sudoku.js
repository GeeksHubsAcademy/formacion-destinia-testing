class Sudoku {
    #grid;
    set(grid) {
        if (grid.length !== 9) {
            throw new Error('Invalid size');
        }
        for (let i = 0; i < grid.length; i++) {
            if (grid[i].length !== 9) {
                throw new Error('Invalid size');
            }
            for (let j = 0; j < grid[i].length; j++) {
                if (grid[i][j] < 0) {
                    throw new Error('Invalid negative number');
                }
                if (grid[i][j] % 1 !== 0) {
                    throw new Error('Invalid float number');
                }
                if (typeof grid[i][j] !== 'number') {
                    throw new Error('Invalid not a number');
                }
            }
        }
        this.#grid = grid;
    }
    isValid() {
        const grid = this.#grid;
        // check rows
        for (let row = 0; row < grid.length; row++) {
            const numbersFound = new Set();
            for (let col = 0; col < grid[row].length; col++) {
                const number = grid[row][col];
                if (number === 0) {
                    continue;
                }
                if (numbersFound.has(number)) {
                    return false;
                }
                numbersFound.add(number);
            }

        }

        // check cols
        for (let col = 0; col < grid.length; col++) {
            const numbersFound = new Set();
            for (let row = 0; row < grid[col].length; row++) {
                const number = grid[row][col];
                if (number === 0) {
                    continue;
                }
                if (numbersFound.has(number)) {
                    return false;
                }
                numbersFound.add(number);
            }

        }

        // check blocks 3x3
        for (let row = 0; row < grid.length; row += 3) {
            for (let col = 0; col < grid[row].length; col += 3) {
                const numbersFound = new Set();
                for (let i = row; i < row + 3; i++) {
                    for (let j = col; j < col + 3; j++) {
                        const number = grid[i][j];
                        if (number === 0) {
                            continue;
                        }
                        if (numbersFound.has(number)) {
                            return false;
                        }
                        numbersFound.add(number);
                    }
                }
            }
        }
        return true;
    }

}

export default Sudoku;