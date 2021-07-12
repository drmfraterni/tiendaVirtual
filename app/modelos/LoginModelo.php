<?php

	/**
	 * summary
	 */
	class LoginModelo
	{
	    /**
	     * Modelo login
	     */
	    public function __construct()
	    {
	    	//Instanciamos la base de datos libs/MySQLdb
	    	$this->db = new MySQLdb();
	        
	    }

	    public function insertarRegistro($data)
	    {
	    	$r = false;

	    	if ($this->validaCorreo($data["email"])) {

	    		$clave = hash_hmac("sha512", $data["clave1"], "caranfibio");
	    		$sql = "INSERT INTO usuarios VALUES(0,";
	    		$sql .= "'".$data["nombre"]."',";
	    		$sql .= "'".$data["apellidos"]."',";
	    		$sql .= "'".$data["email"]."',";
	    		$sql .= "'".$data["direccion"]."',";
	    		$sql .= "'".$data["ciudad"]."',";
	    		$sql .= "'".$data["codpos"]."',";
	    		$sql .= "'".$data["pais"]."',";
	    		$sql .= "'".$clave."');";


	    		$r = $this->db->queryNoSelect($sql);
	    	}

	    	return $r;
	    }

	    public function validaCorreo($email)
	    {
	    	$sql = "SELECT * FROM usuarios WHERE email='".$email."'";
	    	// accedemos al la libreria MySQLdb al método query y le pasamos la sql
	    	$data = $this->db->query($sql);
	    	return(count($data) == 0) ? true : false;

	    }
	}


?>