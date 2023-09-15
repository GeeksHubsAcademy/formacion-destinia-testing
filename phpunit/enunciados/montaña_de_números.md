# Montaña de números

## Descripción

Considere el siguiente problema:

Dado un número entero que actúa como el límite máximo del tamaño de la secuencia, se desea calcular una 
montaña de números.

Cada escalón se genera a través del emparejamiento de dos de ellos en cada fila excepto la primera fila.
En este caso base, ésta siempre empezará en 1. Por otro lado, el primer elemento y el último siempre será 1.
La suma del elemento se hace a través de parejas de dos números consecutivos.

MUY IMPORTANTE: Tener en cuenta los espacios entre elementos.

## Ejemplo

```php

Entrada :     2              3                   4

Resultado:

                1              1                   1 
              1   1          1   1               1   1
                           1   2   1           1   2   1
                                             1   3   3   1
```

