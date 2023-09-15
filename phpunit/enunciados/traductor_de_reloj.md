# Traductor de reloj

## Descripción

Escriba un programa corto que permita traducir una hora (CEST) determinada en texto plano.
	
Las premisas que debe de usar son las siguientes :
	- Minuto 00 -> en punto
	- Minutos comprendidos entre 01 y 30 (inclusives)
		- 01 -> y un minuto 
		- 10 -> y diez minutos
		- 15 -> y cuarto 
		- 25 -> y veinticinco minutos
		- 29 -> y veintinueve minutos
		- 30 -> y media
	- Minutos comprendidos entre 31 y 59 (inclusive)
		- 31 -> menos veintinueve minutos
		- 40 -> menos veinte minutos
		- 58 -> menos dos minutos

Constantes

Minutos, comprendidos entre 00 y 59 (inclusive)
Horas, comprendidos entre 01 y 12 (inclusive)

## Ejemplo

05:15 -> cinco y quarto
12:15 -> doce y dos
06:17 -> seis y diecisiete
10:00 -> diez en punto
01:59 -> una menos uno
