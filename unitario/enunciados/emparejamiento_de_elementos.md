# Emparejamiento de elementos

## Descripción

Dada una secuencia de caracteres formados por tres elementos se pide la reducción de los mismos hasta llegar a la última secuencia.
La reducción de la fila se hace a través del emparejamiento de dos de ellos en cada fila.
Si el emparejamiento contiene los mismos elementos, el resultado es el mismo elemento en la siguiente fila.
Si los elementos son diferentes, el resultado es el elemento que falta en la siguiente fila.
El algoritmo finaliza cuando la reducción llega a un solo elemento.

Elementos: X Y Z

## Ejemplo
```php
    Z X X 
     Y X
      Z
```