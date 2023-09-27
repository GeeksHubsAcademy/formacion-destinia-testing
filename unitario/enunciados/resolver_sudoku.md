# Resolver sudoku

## Descripción

Se quiere desarrollar un pequeño juego llamado 'koso' que traza crucigramas con
números. El objetivo es rellenar una pequeña cuadrícula de 9x9 dividida en
subcruadrículas de 3x3. Se utilizan los números del 1 al 9 partiendo de
posiciones ya ubicadas en el tablero. La finalidad del juego es poder rellenar
todos los huecos y saber si es posible resolver el crucigrama.

Algunas de las restricciones que se deben tener, son las siguientes:

- No se pueden repetir números en la misma subcuadrícula de 3x3
- No se pueden repetir números en una misma fila de la cuadrícula 9x9
- No se pueden repetir números en una misma columna de la cuadrícula 9x9

  Cuadrícula 9x9

  | x | x | x || x | x | x || x | x | x | | x | x | x || x | x | x || x | x | x
  | | x | x | x || x | x | x || x | x | x |

  | x | x | x || x | x | x || x | x | x | | x | x | x || x | x | x || x | x | x
  | | x | x | x || x | x | x || x | x | x |

  | x | x | x || x | x | x || x | x | x | | x | x | x || x | x | x || x | x | x
  | | x | x | x || x | x | x || x | x | x |

  Subcuadrícula 3x3

      | x | x | x |
      | x | x | x |
      | x | x | x |

## Ejemplo

        Subcuadrícula
                        3x3                      Solución 1                   Solución 2

                    | 0 | 0 | 0 |               | 1 | 2 | 3 |               | 6 | 3 | 8 |
                    | 4 | 5 | 0 |               | 4 | 5 | 6 |               | 4 | 5 | 7 |
                    | 0 | 0 | 0 |               | 8 | 9 | 7 |               | 9 | 2 | 1 |


       Cuadrícula
                        9x9

        Para una mejor comprensión, se denotan los números iniciales del crucigrama con corchetes en el primer paso.

            Paso 1

            | 0 | 0 | 0 || 0 | 0 |[9]||[7]| 0 | 0 |
            |[4]|[5]| 0 ||[3]| 0 | 0 || 0 |[8]| 0 |
            | 0 | 0 | 0 ||[4]| 0 |[8]|| 0 | 0 | 0 |

            |[1]| 0 | 0 || 0 | 0 | 0 || 0 | 0 |[6]|
            |[8]| 0 | 0 || 0 | 0 | 0 || 0 |[7]|[1]|
            | 0 | 0 |[3]|| 0 | 0 |[6]||[9]| 0 | 0 |

            | 0 | 0 | 0 || 0 |[3]|[7]||[6]| 0 | 0 |
            | 0 | 0 |[9]|| 0 | 0 | 0 ||[3]| 0 | 0 |
            | 0 |[8]| 0 || 0 |[5]| 0 || 0 |[1]| 0 |

            Paso 2

            | 6 | 3 | 8 || 0 | 0 | 9 || 7 | 0 | 0 |
            | 4 | 5 | 0 || 3 | 0 | 0 || 0 | 8 | 0 |
            | 9 | 0 | 0 || 4 | 0 | 8 || 0 | 0 | 0 |

            | 1 | 0 | 0 || 0 | 0 | 0 || 0 | 0 | 6 |
            | 8 | 0 | 0 || 0 | 0 | 0 || 0 | 7 | 1 |
            | 7 | 0 | 3 || 0 | 0 | 6 || 9 | 0 | 0 |

            | 2 | 0 | 0 || 0 | 3 | 7 || 6 | 0 | 0 |
            | 5 | 0 | 9 || 0 | 0 | 0 || 3 | 0 | 0 |
            | 2 | 8 | 0 || 0 | 5 | 0 || 0 | 1 | 0 |

            Paso 3

            | 6 | 3 | 8 || 0 | 1 | 9 || 7 | 0 | 0 |
            | 4 | 5 | 0 || 3 | 6 | 0 || 0 | 8 | 0 |
            | 9 | 0 | 0 || 4 | 7 | 8 || 0 | 0 | 0 |

            | 1 | 0 | 0 || 0 | 4 | 0 || 0 | 0 | 6 |
            | 8 | 0 | 0 || 0 | 9 | 0 || 0 | 7 | 1 |
            | 7 | 0 | 3 || 0 | 8 | 6 || 9 | 0 | 0 |

            | 2 | 0 | 0 || 0 | 3 | 7 || 6 | 0 | 0 |
            | 5 | 0 | 9 || 0 | 6 | 0 || 3 | 0 | 0 |
            | 2 | 8 | 0 || 0 | 5 | 0 || 0 | 1 | 0 |


            Paso X

            ...


            Resolución

            | 6 | 3 | 8 || 5 | 1 | 9 || 7 | 2 | 4 |
            | 4 | 5 | 7 || 3 | 6 | 2 || 1 | 8 | 9 |
            | 9 | 2 | 1 || 4 | 7 | 8 || 5 | 6 | 3 |

            | 1 | 9 | 2 || 7 | 4 | 5 || 8 | 3 | 6 |
            | 8 | 6 | 5 || 2 | 9 | 3 || 4 | 7 | 1 |
            | 7 | 4 | 3 || 1 | 8 | 6 || 9 | 5 | 2 |

            | 2 | 1 | 4 || 8 | 3 | 7 || 6 | 9 | 5 |
            | 5 | 7 | 9 || 2 | 6 | 1 || 3 | 4 | 8 |
            | 2 | 8 | 6 || 9 | 5 | 4 || 2 | 1 | 7 |


    Ouput = true


    Notas:
    * El algoritmo debe de ser óptimo.
    * No se contemplan cuadrículas que no sean 9x9.
    * Las posiciones vacías se denotan con un 0.
    * El input de entrada es una Array bidimensional.

## Ejemplo

```php
$sudoku = new Sudoku([
            [ 3, 0, 6, 5, 0, 8, 4, 0, 0 ],
            [ 5, 2, 0, 0, 0, 0, 0, 0, 0 ],
            [ 0, 8, 7, 0, 0, 0, 0, 3, 1 ],
            [ 0, 0, 3, 0, 1, 0, 0, 8, 0 ],
            [ 9, 0, 0, 8, 6, 3, 0, 0, 5 ],
            [ 0, 5, 0, 0, 9, 0, 6, 0, 0 ],
            [ 1, 3, 0, 0, 0, 0, 2, 5, 0 ],
            [ 0, 0, 0, 0, 0, 0, 0, 7, 4 ],
            [ 0, 0, 5, 2, 0, 6, 3, 0, 0 ]

])

$sudoku->isValid(); // true


$sudoku = new Sudoku([
            [ 3, 4, 6, 5, 0, 8, 4, 0, 0 ],
            [ 5, 2, 0, 0, 0, 0, 0, 0, 0 ],
            [ 0, 8, 7, 0, 0, 0, 0, 3, 1 ],
            [ 0, 0, 3, 0, 1, 0, 0, 8, 0 ],
            [ 9, 0, 0, 8, 6, 3, 0, 0, 5 ],
            [ 0, 5, 0, 0, 9, 0, 6, 0, 0 ],
            [ 1, 3, 0, 0, 0, 0, 2, 5, 0 ],
            [ 0, 0, 0, 0, 0, 0, 0, 7, 4 ],
            [ 0, 0, 5, 2, 0, 6, 3, 0, 0 ]

])

$sudoku->isValid(); // false


```
