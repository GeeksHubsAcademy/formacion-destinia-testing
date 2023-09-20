# DNI avanzado

## Descripción:

Considere el siguiente problema:

Escriba un programa corto que permita validar el formato DNI español con las siguientes
especificaciones.

Dado un input de entrada :

* 	No puede ser nulo o vacío
*	Debe de contener 8 números
*	Debe de tener una sola letra
* 	Su tamaño no puedo ser mayor que 9, ni tampoco menor a éste
*	La letra debe de estar al final de la cadena
*	La letra debe de ser mayúscula
*	La letra se calcula a partir de los 8 números, dividiendo el número entre 23 y el resto le corresponde la letra  correspondiente según la siguiente tabla anexa. Por ejemplo, si el número del DNI es 12345678, dividido entre 23 da de resto 14, luego la letra sería la Z: 12345678Z.

## Input Esperado:

Una cadena de texto con un DNI

## Output Esperado:

Un booleano indicando si el DNI es válido o no


## Ejemplos

```php
dni("000c0000") // false
dni("46552252E") // true
```

# Anexo


| Resto | Letra |
|-------|-------|
| 0     | T     |
| 1     | R     |
| 2     | W     |
| 3     | A     |
| 4     | G     |
| 5     | M     |
| 6     | Y     |
| 7     | F     |
| 8     | P     |
| 9     | D     |
| 10    | X     |
| 11    | B     |
| 12    | N     |
| 13    | J     |
| 14    | Z     |
| 15    | S     |
| 16    | Q     |
| 17    | V     |
| 18    | H     |
| 19    | L     |
| 20    | C     |
| 21    | K     |
| 22    | E     |
