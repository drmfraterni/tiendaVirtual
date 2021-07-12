<?php

	/**
	 * Mensajes
	 */
	class Mensajes
	{
	    /**
	     * Mensajes 
	     */

	    public $mensaje;

	    public function __construct($textoMensaje)
	    {
	    	$this->mensaje = $textoMensaje;

	    	var_dump($this->mensaje);
	        
	    }

	    public function menAdventencia(){

	    	echo '<div class="col-12 col-md-8 col-lg-6 bg-warning">'.$this->mensaje.'</div>';
	    }

	    public function menPeligro(){

	    	echo '<div class="col-12 col-md-8 col-lg-6 bg-darger">' . $this->mensaje . '</div>';
	    }
	}



?>



