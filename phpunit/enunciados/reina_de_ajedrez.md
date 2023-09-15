# Reina de ajedrez

## Descripción


Considere el siguiente problema:

Escriba un programa corto que permita calcular todos los movimientos posibles de la figura de 
la reina en un tablero NxM de ajedrez.

Constantes

N >= 1 && N <= 20
M >= 1 && M <= 20

## Ejemplo

```
1x1 -> 0

[1,1]
R

2x1 -> 2

[1,1]  [1,2]
R      #
#      R

2x2 -> 12

[1,1]  [1,2]  [2,1]  [2,2]
R#     ##     #R     ##
##     R#     ##     #R
```