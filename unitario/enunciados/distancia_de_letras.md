# Distancia de letras

Dado el siguiente abecedario de letras:

`abcdefghijklmnopqrstuvwxyz`

Se quiere calcular el número de posiciones de cada letra respecto a la última aparición de la misma en la formación de una cadena indicándolo en la salida de un array con las posiciones del abecedario.


Input => 'abacba'
Resultado => [6, 4, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]

Explicación:

La letra a = 6 dado que la palabra empieza por 'a' y acaba por 'a'.
El número de posición desde la primera aparición hasta la última son 6
a(1),b(2),a(3),c(4),b(5),a(6)

La letra b = 4 dado que la letra 'b' está en la segunda posición y la última aparición en la quinta.
b(1),a(2),c(3),b(4)

La letra c = 1 dado que la letra 'c' solo aparece una vez.
c(1)

Las letras restantes no aparecen en la cadena por lo que su valor es 0.


## Ejemplo

```php
distancia('abacba') // [6, 4, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]

distancia('z')      // [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,0, 0, 0, 1]

distancia('zyz')      // [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,0, 0, 1, 3]
```
