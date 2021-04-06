<?php
class Archivo
{
    static public function Guardar($path,$objeto)
    {
        $archivo = fopen($path,'a+');
        fwrite($archivo,$objeto);
        fclose($archivo);
    }
    static public function Leer($path)
    {
        $array = array();
        $elemento = "";
        if(file_exists($path))
        {
            $archivo = fopen($path,'r');
            while(!feof($archivo))
            {
                $elemento = fgets($archivo);
                array_push($array,$elemento);
            }
            fclose($archivo);
        }
        return $array;
    }
}