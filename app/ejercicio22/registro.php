<?php
/*Recibe los datos del usuario(nombre, clave,mail )por POST ,
crear un objeto y utilizar sus métodos para poder hacer el alta,
guardando los datos en usuarios.csv.
retorna si se pudo agregar o no.
Cada usuario se agrega en un renglón diferente al anterior.
Hacer los métodos necesarios en la clase usuario*/
include './clases/archivo.php';
include './clases/usuario.php';
$nombre ="";
$clave ="";
$mail = "";
$mensaje = "";
if(isset($_POST['nombre']) && isset($_POST['clave']) && isset($_POST['mail']))
{
    $nombre = $_POST['nombre'];
    $mail = $_POST['mail'];
    $clave = $_POST['clave'];
    $usuario = new Usuario($nombre,$mail,$clave);
    $mensaje = Usuario::Add('./usuarios.csv',$usuario);
    if($mensaje == true)
    {
        $mensaje = 'Alta correcta';
    }else{
        $mensaje = 'Alta incorrecta';
    }
}else{
    $menaje = 'Faltan datos';
}

echo $mensaje;