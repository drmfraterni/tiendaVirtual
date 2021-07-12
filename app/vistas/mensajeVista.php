<?php 

	include_once("encabezado.php"); 

	/**
	 * Mensajes genéricos, necesitamos:
	 * subtítulo, color, texto, url, colorBoton, textoBoton
	 */

	echo '<h2 class="text-center my-3">'. $datos["subtitulo"] .'</h2>';
	echo '<div class="alert '. $datos['color'] .' alerta my-2" role="alert">'. $datos['texto'] .'</div>';
	echo '<a href="'.URL.$datos['url'] .'" class="btn '. $datos["colorBoton"] .'">'. $datos['textoBoton'] .'</a>';
				



	include_once("piepagina.php"); 


?>

