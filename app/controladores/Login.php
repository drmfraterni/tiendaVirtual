<?php

	/**
	 * Controlador Login
	 */
	class Login extends Controlador
	{
	    /**
	     * Controlador Login
	     */

	    private $modelo;

	    public function __construct()
	    {
	     	$this->modelo = $this->modelo('LoginModelo'); 
	    }

	    public function caratula()
	    {
	    	$datos = [
	    		"titulo" => "Login",
	    		"menu" => false
	    	];
	    	$this->vista("loginVista", $datos);
	    }

	    public function olvido()
	    {
	    	print "Hola desde el olvido";
	    	//$this->vista("loginVista", $datos);
	    }

	    public function registro()
	    {
	    	$errores = array();
	    	$data = array();
	    	if ($_SERVER['REQUEST_METHOD'] == "POST") {

	    		$nombre = isset($_POST["nombre"])?$_POST["nombre"]:"";
	    		$apellidos = isset($_POST["apellidos"])?$_POST["apellidos"]:"";
	    		$email = isset($_POST["email"])?$_POST["email"]:"";
	    		$clave1 = isset($_POST["clave1"])?$_POST["clave1"]:"";
	    		$clave2 = isset($_POST["clave2"])?$_POST["clave2"]:"";
	    		$direccion = isset($_POST["direccion"])?$_POST["direccion"]:"";
	    		$ciudad = isset($_POST["ciudad"])?$_POST["ciudad"]:"";
	    		$codpos = isset($_POST["codpos"])?$_POST["codpos"]:"";
	    		$pais = isset($_POST["pais"])?$_POST["pais"]:"";
	    		$data = [

	    			"nombre" => $nombre,
	    			"apellidos" => $apellidos,
	    			"email" => $email,
	    			"clave1" => $clave1,
	    			"clave2" => $clave2,
	    			"direccion" => $direccion,
	    			"ciudad" => $ciudad,
	    			"codpos" => $codpos,
	    			"pais" => $pais,

	    		];

	    		// validación

	    		if($nombre ==""){
	    			array_push($errores, "El nombre es requerido");
	    		}

	    		if($apellidos ==""){
	    			array_push($errores, "El apellidos es requerido");
	    		}

	    		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	    			array_push($errores, "El correo no es válido");
	    		}

	    		if($clave1 ==""){
	    			array_push($errores, "El clave1 es requerido");
	    		}

	    		if($clave2 ==""){
	    			array_push($errores, "El clave2 es requerido");
	    		}

	    		if($direccion ==""){
	    			array_push($errores, "El direccion es requerido");
	    		}

	    		if($ciudad ==""){
	    			array_push($errores, "El ciudad es requerido");
	    		}

	    		if($codpos ==""){
	    			array_push($errores, "El codpos es requerido");
	    		}

	    		if($pais ==""){
	    			array_push($errores, "El pais es requerido");
	    		}

	    		if ($clave1 != $clave2) {
	    			array_push($errores, "Las claves de acceso no coinciden");
	    		}

	    		if (count($errores) == 0){

	    			$r = $this->modelo->insertarRegistro($data);

	    			if ($r) {

	    				//subtítulo, color, texto, url, colorBoton, textoBoton
	    				//$textoConsent: viene del metodo bienvenida

	    				$textoConsent = $this->bienvendia($data['nombre'], $data['apellidos']);

	    				$datos = [
		    				"titulo" => "Bienvenido a la tienda virtual",
		    				"menu" => false,
		    				"errores" => [],
		    				"data" => [],
		    				"subtitulo" => "Bienvenid@ a nuestra tienda virtual",
		    				"color" => "alert-success",
		    				"texto" => $textoConsent,
		    				"url" => "menu",
		    				"colorBoton" => "btn-success",
		    				"textoBoton" => "Iniciar",
	    				];


	    				$this->vista("mensajeVista", $datos);

	    			}else{

	    				$textoConsent = "Existió un error en el registro, posiblemente ya existe ese correo en nuestras 
	    				base de datos, por favor verifíque los datos ";

	    				$datos = [
		    				"titulo" => "Error en el registro",
		    				"menu" => false,
		    				"errores" => [],
		    				"data" => [],
		    				"subtitulo" => "Error en el registro",
		    				"color" => "alert-danger",
		    				"texto" => $textoConsent,
		    				"url" => "login",
		    				"colorBoton" => "btn-danger",
		    				"textoBoton" => "Regresar",
	    				];


	    				$this->vista("mensajeVista", $datos);
	    			}

	    		}else{
	    			$datos = [
	    				"titulo" => "Registro usuario",
	    				"menu" => false,
	    				"errores" => $errores,
	    				"data" => $data,
	    			];
	    			$this->vista("loginRegistroVista", $datos);

	    		}
	    		
	    		
	    		
	    	} else {

	    		$datos = [
	    		"titulo" => "Registro usuario",
	    		"menu" => false
	    		];
	    		$this->vista("loginRegistroVista", $datos);
	    		
	    	}
	    	
	    }

	    private function bienvendia($nombre, $apellidos)
	    {
	    	$search = [
					    '[%nombre%]',
					    '[%apellidos%]',
					  ];

			$replace = [
					     $nombre,
					     $apellidos,

					    ];

			$textoCompleto = "Bienvenid@ <strong> [%nombre%] [%apellidos%]</strong>:<br><br>
			Te damos las más sincera bienvendia a nuestra tienda virtual, en la que esperamos encontraras 
			todo lo que necesitas. <br><br>El objetivo principal de este canal de comunicación es plasmar 
			los valores que nos repaldan:
			<ul>
			<li>El compromiso social.</li>
			<li>La máxima calidad.</li>
			<li>La satisfacción de nuestros clientes.</li>
			<li>La voluntad de servicio</li>
			<li>Así como nuestro interés por todas aquellas ventajas que nos ofrece la tecnología.</li>
			</ul>
			Todo ello tiene una presencia destacada en esta página web y en nuestras propias decisiones.";

			$textoConsent = str_replace($search, $replace, $textoCompleto);

			return $textoConsent;

	    }
	   


	}


?>