# Rodamiento Lateral

## Descripción
Escriba una función que permita re-calcular el posicionamiento de los elementos dentro de un array.
La dirección de movimiento debe de ser cíclico de derecha a izquierda ( <-- )


Para los casos excepcionales:
- Si el primer parámetro es cualquier input que no sea un array debe de devolver -1 independientemente del segundo parámetro.
- Si el segundo parámetro es cualquier input que no sea un número entero positivo debe de devolver -1 independientemente del primer parámetro.

## Ejemplo

```php

fn([1,2,3,4,5], 2) // [3,4,5,1,2]

fn([1,2,3,4,5], -2) // [4,5,1,2,3]

```
