<?php
class Usuario{
    private $nombre;
    private $mail;
    private $clave;

    public function __construct($nombre,$mail,$clave){
        $this->__set('nombre',$nombre);
        $this->__set('mail',$mail);
        $this->__set('clave',$clave);
    }
    public function __get($name) {
        return $this->$name;
    }
    public function __set($name, $value)
    {
        return  $this->$name = $value;
    }
    static function Add($path,$usuario)
    {
        $retorno = false;
        if(Usuario::toCSV($usuario) != null && !Usuario::Equal($usuario))
        {
            $csv = Usuario::toCSV($usuario);
            Archivo::Guardar($path,$csv);
            $retorno = true;
        }
        return $retorno;
    }
    static private function toCSV($usuario)
    {
        $retorno = null;
        if(is_a($usuario,'Usuario'))
        {
            $retorno = "$usuario->nombre,$usuario->mail,$usuario->clave";
        }
        return $retorno;
    }
    static function Equal($usuario)
    {
        $retorno = false;
        $usuarios = Usuario::getAll();
        foreach ($usuarios as $u) {
            if($usuario->mail == $u->mail)
            {
                $retorno = true;
            }
        }
        return $retorno;
    }
    static private function toClass($registro)
    {
        $atributos = explode(',',$registro);
        return new Usuario($atributos[0],$atributos[1],$atributos[2]);
    }
    public static function getAll()
    {
        $path = './usuarios.csv';
        $datos = Archivo::Leer($path);
        $usuarios = array();
        if(count($datos) != 0)
        {
            foreach ($datos as $registro) {
                $u = Usuario::toClass($registro);
                array_push($usuarios,$u);
            }
        }
        return $usuarios;
    }
}