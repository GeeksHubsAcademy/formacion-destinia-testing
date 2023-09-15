# Dni

## Descripción

Escriba una función que valida un número de DNI.

Debe devolver `true` o `false`

Dado un input de entrada, la función debe de validar que el input cumpla con las siguientes condiciones:

* No puede ser nulo o vacío
* Puede contener números
* Debe de tener una sola letra
* Su tamaño no puedo ser mayor que 9, ni tampoco menor a éste
* La letra debe de estar al final de la cadena
* La letra debe de ser mayúscula

## Ejemplo

```js
validate('12345678A') // true
validate('') // false
```