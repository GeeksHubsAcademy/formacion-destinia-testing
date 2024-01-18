import Sudoku from "../../src/sudoku"

describe('Sudoku', () => {

  describe('set', () => {
    it('should validate the size', () => {
      const sudoku = new Sudoku();
      expect(() => {
        sudoku.set([[1]])
      }).to.throw('Invalid size');

    });
    it('should validate the content negative numbers', () => {
      const sudoku = new Sudoku();
      expect(() => {
        sudoku.set([
          [-1, 0, 0, 0, 0, 0, 0, 0, 0],
          [0, 0, 0, 0, 0, 0, 0, 0, 0],
          [0, 0, 0, 0, 0, 0, 0, 0, 0],
          [0, 0, 0, 0, 0, 0, 0, 0, 0],
          [0, 0, 0, 0, 0, 0, 0, 0, 0],
          [0, 0, 0, 0, 0, 0, 0, 0, 0],
          [0, 0, 0, 0, 0, 0, 0, 0, 0],
          [0, 0, 0, 0, 0, 0, 0, 0, 0],
          [0, 0, 0, 0, 0, 0, 0, 0, 0],
        ])
      }).to.throw('Invalid negative number');
    });

    it('should validate the content float number', () => {
      const sudoku = new Sudoku();
      expect(() => {
        sudoku.set([
          [1.1, 0, 0, 0, 0, 0, 0, 0, 0],
          [0, 0, 0, 0, 0, 0, 0, 0, 0],
          [0, 0, 0, 0, 0, 0, 0, 0, 0],
          [0, 0, 0, 0, 0, 0, 0, 0, 0],
          [0, 0, 0, 0, 0, 0, 0, 0, 0],
          [0, 0, 0, 0, 0, 0, 0, 0, 0],
          [0, 0, 0, 0, 0, 0, 0, 0, 0],
          [0, 0, 0, 0, 0, 0, 0, 0, 0],
          [0, 0, 0, 0, 0, 0, 0, 0, 0],
        ])
      }).to.throw('Invalid float number');
    });
    it('should validate the content not numbers', () => {
      const sudoku = new Sudoku();
      expect(() => {
        sudoku.set([
          ['1', 0, 0, 0, 0, 0, 0, 0, 0],
          [0, 0, 0, 0, 0, 0, 0, 0, 0],
          [0, 0, 0, 0, 0, 0, 0, 0, 0],
          [0, 0, 0, 0, 0, 0, 0, 0, 0],
          [0, 0, 0, 0, 0, 0, 0, 0, 0],
          [0, 0, 0, 0, 0, 0, 0, 0, 0],
          [0, 0, 0, 0, 0, 0, 0, 0, 0],
          [0, 0, 0, 0, 0, 0, 0, 0, 0],
          [0, 0, 0, 0, 0, 0, 0, 0, 0],
        ])
      }).to.throw('Invalid not a number');
    });
  });

  describe('isValid', () => {
    it('should validate a empty sudoku', () => {
      const sudoku = new Sudoku();
      const emptySudoku = [
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
      ];
      sudoku.set(emptySudoku);
      expect(sudoku.isValid()).to.be.true;

    });
    it('should validate a solved sudoku', () => {
      const sudoku = new Sudoku();
      const solvedSudoku = [
        [1, 2, 3, 4, 5, 6, 7, 8, 9,],
        [7, 8, 9, 1, 2, 3, 4, 5, 6,],
        [4, 5, 6, 7, 8, 9, 1, 2, 3,],
        [3, 1, 2, 8, 4, 5, 9, 6, 7,],
        [6, 9, 7, 3, 1, 2, 8, 4, 5,],
        [8, 4, 5, 6, 9, 7, 3, 1, 2,],
        [2, 3, 1, 5, 7, 4, 6, 9, 8,],
        [9, 6, 8, 2, 3, 1, 5, 7, 4,],
        [5, 7, 4, 9, 6, 8, 2, 3, 1,]
      ];
      sudoku.set(solvedSudoku);
      expect(sudoku.isValid()).to.be.true;

    });
    it('should validate a incomplete sudoku', () => {
      const sudoku = new Sudoku();
      const solvedSudoku = [
        [1, 2, 0, 4, 5, 6, 7, 8, 9,],
        [7, 8, 9, 1, 2, 3, 4, 5, 6,],
        [4, 5, 6, 0, 0, 9, 1, 2, 3,],
        [3, 1, 2, 8, 4, 5, 9, 6, 7,],
        [6, 9, 7, 3, 1, 2, 8, 4, 5,],
        [8, 4, 5, 6, 9, 7, 3, 1, 2,],
        [2, 3, 1, 5, 7, 4, 6, 9, 8,],
        [9, 6, 8, 2, 3, 1, 0, 7, 4,],
        [5, 7, 4, 9, 6, 8, 2, 0, 1,]
      ];
      sudoku.set(solvedSudoku);
      expect(sudoku.isValid()).to.be.true;
    });

    it('should validate a sudoku with a invalid row', () => {
      const sudoku = new Sudoku();
      const solvedSudoku = [
        [0, 0, 0, 4, 4, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
      ];
      sudoku.set(solvedSudoku);
      expect(sudoku.isValid()).to.be.false;
    });
    it('should validate a sudoku with a invalid column', () => {
      const sudoku = new Sudoku();
      const solvedSudoku = [
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [4, 0, 0, 0, 0, 0, 0, 0, 0],
        [4, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
      ];
      sudoku.set(solvedSudoku);
      expect(sudoku.isValid()).to.be.false;
    });
    it('should validate a sudoku with a invalid block', () => {
      const sudoku = new Sudoku();
      const solvedSudoku = [
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 4, 0, 0, 0, 0, 0, 0, 0],
        [4, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0],
      ];
      sudoku.set(solvedSudoku);
      expect(sudoku.isValid()).to.be.false;
    });
  });

})