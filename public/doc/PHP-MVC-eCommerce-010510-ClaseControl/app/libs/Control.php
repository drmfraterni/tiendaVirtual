<?php
/**
 * Control maneja la URL y lanza los procesos
 el primer elemento es el objeto o controlador
 el segundo elemento es el metodo o accion
 el tercero y posteriores son los parametros
 */
class Control{
  
  function __construct(){
    $url = $this->separarURL();
    var_dump($url);
  }

  function separarURL(){
    $url = "";
    if(isset($_GET["url"])){
      //eliminamos el caracter final
      $url = rtrim($_GET["url"],"/");
      $url = rtrim($_GET["url"],"\\");
      //Limpiamos caracteres no propios para la URL
      $url = filter_var($url, FILTER_SANITIZE_URL);
      //Separamos
      $url = explode("/",$url);
    }
    return $url;
  }
}