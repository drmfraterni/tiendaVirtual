<?php

/**
 * Control maneja la URL y lanza los procesos
 * tiendaVirtual.test/cesta/total/35
 * 
 * Primer elemento: es el objeto o controlador: cesta
 * Segundo elemento: es el métido o acción: total
 * Tercero y siguiente: los parámetros o variables: 35 id del usuario
 */
class Control
{
    /**
     * Distribuye el control de la aplicación
     */

    protected $controlador = "Login"; // un controlador por omisión
    protected $metodo = "caratula";   // método por omisión
    protected $parametros = [];

    public function __construct()
    {
        
        /**
         * A través de la CONEXIÓN DE PDO
         * archivos utilizados: Database.php y el de config/config.php
         */

        //$this->db = new Database();
        //$query = $this->db->connect()->prepare("SELECT * FROM usuarios");
        //var_dump($query);


        /**
         * A través de la CONEXIÓN MYSQLI
         */

         //$db = new MySQLdb();

        $url = $this->separaURL();


        /**
         * CONTROLADOR: URL[0]
         */

        if ($url != "" && file_exists('../app/controladores/'.ucwords($url[0]).".php")) 
        {
            $this->controlador = ucwords($url[0]);
            unset($url[0]);
   
            
        }

        // Cargando la clase del controlador
        require_once("../app/controladores/" . ucwords($this->controlador).".php" );
        // Instanciando la clase del controlador
        $this->controlador = new $this->controlador;

        /**
         * MÉTODO: URL[1]
         */

        // Vamos a verificar y cargar en el caso que tengamos un método

        if (isset($url[1])) {

            if (method_exists($this->controlador, $url[1])) {
                $this->metodo = $url[1];
                unset($url[1]);
            }

            
        }

        /**
         * PARAMETROS Y VARIABLES: URL[3] EN ADELANTE
         * Esto pasa porque el 0 y 1 los quita con el unset
         */


        $this->parametros = $url ? array_values($url) : [];

        call_user_func_array([$this->controlador, $this->metodo], $this->parametros);




    }

    public function separaURL()
    {
        $url = "";

        /**
         * la url viene del archivo .htaccess
         */ 
        if (isset($_GET['url'])) {

            // Limpiamos la url de caracteres 

            // limpiamos la diagonal de la url
            $url = rtrim($_GET['url'], '/'); 
            $url = rtrim($_GET['url'], '\\');


            // limpiamos caracteres no propios para la URL
            $url = filter_var($url, FILTER_SANITIZE_URL);


            // Separamos en un array

            $url = explode('/', $url);

            return $url;            
        }
    }

}



?>