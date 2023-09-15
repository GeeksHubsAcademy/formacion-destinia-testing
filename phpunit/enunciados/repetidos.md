# Repetidos

## Descripción

Considere el siguiente problema:

Escriba una función que permita filtrar todos los elementos de un array sin mostrar posibles repeticiones de esos elementos.

El orden de los elementos del array devuelto por la función debe de respetar el orden de los elementos del array original.
Atienda a números, letras y palabras.

El resultado debe ser un array mostrando todos los elementos del array original, pero sin repeticiones de esos elementos (en caso de existir repeticiones).

## Ejemplo

```js
repetidos([6, 6, 9, 'a', 'a']) // [6, 9, 'a']

repetidos([6, 6, 9, 'a', 'a', 6, 6, 9, 'a', 'a']) // [6, 9, 'a']
```