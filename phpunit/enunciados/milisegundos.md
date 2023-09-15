# Milisegundos

## Descripción

Considere el siguiente problema:

Escriba una función que permita pasar de un formato de tiempo establecido en 3 parámetros (horas, minutos, segundos) a un número entero en Milisegundos.

Los inputs de entrada se restringen de la siguiente manera:

0 <= h <= 23
0 <= m <= 59
0 <= s <= 59

En caso de romperse estas restricciones, el retorno debe de ser -1.


## Ejemplo

```php

toMilliseconds(0,1,1) = 61000

toMilliseconds(1,1,1) = 3661000

toMilliseconds(24,10,10) = -1

```
