<?php
/*Recibe qué listado va a retornar(ej:usuarios,productos,vehículos,...etc),por ahora solo tenemos
usuarios).
En el caso de usuarios carga los datos del archivo usuarios.csv.
se deben cargar los datos en un array de usuarios.
Retorna los datos que contiene ese array en una lista
<ul>
<li>Coffee</li>
<li>Tea</li>
<li>Milk</li>
</ul>
Hacer los métodos necesarios en la clase usuario*/
include './clases/usuario.php';
include './clases/archivo.php';

$usuarios = Usuario::getAll();
$mensaje = "";
if(count($usuarios)== 0)
{
    $mensaje = "no hay usuarios";
}
foreach ($usuarios as $usuario) {
    $mensaje = $mensaje.$usuario->__toString();
}
echo $mensaje;