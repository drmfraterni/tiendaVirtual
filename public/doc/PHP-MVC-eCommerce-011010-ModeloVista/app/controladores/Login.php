<?php
/**
 * Controlador Login
 */
class Login extends Controlador{
  private $modelo;

  function __construct()
  {
    $this->modelo = $this->modelo("LoginModelo");
  }

  function caratula(){
    $datos = [];
    $this->vista("loginVista",$datos);
  }
}
?>