# Resolver sudoku

## Descripción

Se quiere desarrollar un pequeño juego llamado 'koso' que traza crucigramas con
números. El objetivo es rellenar una pequeña cuadrícula de 9x9 dividida en
subcruadrículas de 3x3. Se utilizan los números del 1 al 9 partiendo de
posiciones ya ubicadas en el tablero.

Algunas de las restricciones que se deben tener, son las siguientes:

- No se pueden repetir números en la misma subcuadrícula de 3x3
- No se pueden repetir números en una misma fila de la cuadrícula 9x9
- No se pueden repetir números en una misma columna de la cuadrícula 9x9

**El objetivo de este ejercicio es desarrollar un algoritmo que diga si una
posición es válida o no.**

- El algoritmo no debe de ser óptimo.
- No se contemplan cuadrículas que no sean 9x9.
- Las posiciones vacías se denotan con un 0.
- El input de entrada es una Array bidimensional.

## Ejemplo

```php
$input  = [
            [ 3, 0, 6, 5, 0, 8, 4, 0, 0 ],
            [ 5, 2, 0, 0, 0, 0, 0, 0, 0 ],
            [ 0, 8, 7, 0, 0, 0, 0, 3, 1 ],
            [ 0, 0, 3, 0, 1, 0, 0, 8, 0 ],
            [ 9, 0, 0, 8, 6, 3, 0, 0, 5 ],
            [ 0, 5, 0, 0, 9, 0, 6, 0, 0 ],
            [ 1, 3, 0, 0, 0, 0, 2, 5, 0 ],
            [ 0, 0, 0, 0, 0, 0, 0, 7, 4 ],
            [ 0, 0, 5, 2, 0, 6, 3, 0, 0 ]
        ];
isValidSudoku($input); // true
```
