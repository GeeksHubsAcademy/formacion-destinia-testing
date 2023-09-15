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
*	La letra se calcula haciendo el módulo del alfabeto castellano (sin la 'Ñ','O','I','U') aplicado a los

Existen 2 funciones a resolver:

*   El método 'dni' contiene la resolución de si un input de entrada es correcto o no.
*   El método 'getKeyFromDigits' calcula la letra del DNI.

## Ejemplos

```php
dni("000c0000") // false
dni("46552252E") // true
```