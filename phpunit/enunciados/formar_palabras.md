# Formar Palabras

## Descripción

Considere el siguiente problema:

Escriba una función que permita obtener las letras de los elementos en posición par del array
y devuelva una string con la unión de los mismos

['h', 'o', 'l', 'a', '!']

Resultado

"hl!"

En caso de que el array tenga un 'size' par, debe de contarse la última posición.
En caso de que el array sea nulo, el resultado debe de devolver "nulo".
En caso de que el array sea vacío, el resultado debe de devolver "vacio".
El array no contiene valores nulos, solamente letras.

## Ejemplo

```php
const array = ['h', 'o', 'l', 'a', '!'];
const result = formarPalabras(array);
console.log(result); // hl!
```
