<?php
class Usuario{
    private $nombre;
    private $mail;
    private $clave;

    public function __construct($nombre = null,$mail,$clave){
        if($nombre != null)
        {
            
            $this->__set('nombre',$nombre);
        }
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
            $retorno = "$usuario->nombre,$usuario->mail,$usuario->clave"."\n";
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
        $retorno = false;
        if(isset($registro[1]))
        {
            $retorno = new Usuario($registro[0],$registro[1],$registro[2]);
        }
        return $retorno; //esto es con getCsv
        /*
        $retorno = false;
        $atributos = explode(',',$registro);
        if(isset($atributos[1]))
        {
            $retorno = new Usuario($atributos[0],$atributos[1],$atributos[2]);
        }
        return $retorno;*///esto es si leo con gets
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
                if($u != null)
                {
                    array_push($usuarios,$u);
                }
            }
        }
        return $usuarios;
    }
    public function __toString()
    {
        $retorno = "";
        $retorno = $retorno."Nombre: ".$this->__get('nombre').'<br>';
        $retorno = $retorno."Mail: ".$this->__get('mail').'<br>';
        $retorno = $retorno."**********************************".'<br>';
        return $retorno;
    }
    public static function LogIn($usuario)
    {
        if(Usuario::Equal($usuario))
        {
            $retorno = false;
            $usuarios = Usuario::getAll();
            foreach ($usuarios as $u) {
                if($usuario->mail == $u->mail && $usuario->clave == $u->clave)
                {
                    $retorno = true;
                }else if($usuario->mail == $u->mail)
                {
                    echo "usuario clave: $usuario->clave".'<br>';
                    echo "u clave: $u->clave".'<br>';
                    echo "el comparr: ".strcmp($usuario->clave,$u->clave).'<br>'; 
                    echo strlen($usuario->clave).'<br>';
                    echo strlen($u->clave).'<br>';
            
                    if(strcmp($usuario->clave,$u->clave)== 0)
                    {
                        echo 'si son iguales';
                        
                        $retorno = true;
                    }
                }
            }
            return $retorno;
        }
    }
}