<?php
/*Aplicación No 12 (Invertir palabra)
Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden
de las letras del Array.
Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.*/

$string = "hola";
$mensaje ="";
for ($i = strlen($string)-1; $i >= 0 ; $i--) {
    $mensaje = $mensaje.$string[$i];
}
echo $mensaje;
