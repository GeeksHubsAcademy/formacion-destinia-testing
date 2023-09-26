# Diagonal secundaria de matriz

## Descripción


Considere el siguiente problema:

Escriba un programa corto que permita multiplicar los valores de la diagonal secundaria de una matriz cuando N >= 1

    N = 2 

        6 1
        6 0

    Resultado
    
        6


Observe que su base y altura son ambas iguales.
En caso de no cumplirse esta premisa, el resultado debe de ser -1.

El resultado se debe de ser un Int con el cálculo de la diagonal.


## Ejemplo
```
N = 1     N = 2      N = 3      N = 4       ...    N
    
    6       2 4      1 2 3     1 2 3 4         
            3 2      2 3 4     1 2 3 4      
                     4 5 6     2 3 4 5     
                               2 3 4 5   
Resultado:

    6	     12         36	        72
```