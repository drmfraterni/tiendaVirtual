<?php

/**
 *  Manejo de la base de datos MySQL con mysqli
 */

class MySQLdb
{
    /**
     * Conexión a la base de datos en Mysqli
     * En el archivo config/config.php están las constantes
     */

    private $host = HOST;
    private $usuario = USER;
    private $clave = PASSWORD;
    private $db = DB;
    private $puerto = ""; // MAMP en Windows necesitamos el puerto
    private $conn; // la conexión


    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->usuario, $this->clave, $this->db);

        /**
         * Comprobamos que la conexión es exitosa
         */
        if (mysqli_connect_errno()) {

        	//printf("Error en la conexión a la base de datos %s", mysqli_connect_errno());
        	exit();
        	
        }else{

            //$mensaje = new Mensajes('Conexión exitosa');
            //$mensaje->menPeligro();
             
        	//print("Conexión exitosa"."<br/>");
        }

        /**
         * Comprobamos que los caracteres de la DB son los correctos
         */

        if (!mysqli_set_charset($this->conn, "utf8")) { 

        	//printf("Error en la conversión de caracteres %s", mysqli_connect_error());
        	exit();
        	
        }else{

        	//print("El conjunto de caracteres es : ". mysqli_character_set_name($this->conn) . "<br/>");

        }
    }

    // Query regresa un sólo registro en un arreglo asociado
    public function query($sql){
        $data = array();
        $r = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($r) > 0) {
            $data = mysqli_fetch_assoc($r);
        }
        return $data;
    }

    // Query regresa un valor booleano
    public function queryNoSelect($sql){
        $r = mysqli_query($this->conn, $sql);
        return $r;
    }


}


?>