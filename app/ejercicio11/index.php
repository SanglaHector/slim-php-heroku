<?php
/*
Aplicación No 11 (Potencias de números)
Mostrar por pantalla las primeras 4 potencias de los números del uno 1 al 4 (hacer una función
que las calcule invocando la función pow).
*/
$mensaje ="";
for($i = 1; $i ++ ; $i < 5)
{
    for($j = 1 ; $j++ ; $j < 5)
    {
        $mensaje = $mensaje.calcularPow($j,$i)."<br>";
    }
}
echo $mensaje;

function calcularPow($base, $exponente)
{
    return pow($base, $exponente);
}