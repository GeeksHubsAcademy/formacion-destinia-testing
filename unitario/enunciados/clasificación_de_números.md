
# Clasificación de números

## Descripción

Escriba un programa corto donde se tenga un array de enteros como parámetro de entrada y otro como resultado de salida.
Se necesita calcular las siguientes operaciones.

Clasifica :
Números positivos.
Números negativos.
Números igual a 0.

Calcula el número de elementos de cada clasificación, dividido por el tamaño del array.
Represente el número de cada operación con un redondeo de 4 decimales.
Devuelva un array de salida con cada operación en el siguiente orden [Npositivos, Nnegativos, Nzero]

## Ejemplo

Array: [1, 2 ,-8, -2, 0, 9]

Números positivos = 1, 2, 9
Números negativos = -8, -2
Números igual a 0 = 0

Resultado: [(Npositivios/Array.size), (Nnegativos/Array.size), (Nzero/Array.size)]

```javascript
numeros([1, 2 ,-8, -2, 0, 9]) // [ "0.5000","0.3333","0.1667"]
```
