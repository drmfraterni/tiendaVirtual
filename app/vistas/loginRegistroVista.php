<?php include_once("encabezado.php"); ?>

<h2 class="text-center">Registro</h2>

<form action="<?php echo constant('URL'); ?>login/registro/" method="POST">
	<!--FORMULARIO -->
	<div class="form-group text-left py-2">
		<label for="nombre" class="py-2">* Mombre</label>
		<input type="text" name="nombre" id="nombre" class="form-control py-2" required placeholder="Escriba su nombre" value='<?php isset($datos["data"]["nombre"]) ? print $datos["data"]["nombre"]:""; ?>'>
	</div>

	<div class="form-group text-left py-2">
		<label for="apellidos" class="py-2">* apellidos</label>
		<input type="text" name="apellidos" id="apellidos" class="form-control py-2" required placeholder="Escriba su apellidos" value='<?php isset($datos["data"]["apellidos"]) ? print $datos["data"]["apellidos"]:""; ?>'>
	</div>

	<div class="form-group text-left py-2">
		<label for="email" class="py-2">* Correo electrónico</label>
		<input type="email" name="email" id="email" class="form-control py-2" required placeholder="Escriba su correo electrónico" value='<?php isset($datos["data"]["email"]) ? print $datos["data"]["email"]:""; ?>'>
	</div>

	<div class="form-group text-left py-2">
		<label for="clave1" class="py-2">* Clave de acceso</label>
		<input type="password" name="clave1" id="clave1" class="form-control py-2" required placeholder="Escriba su clave de acceso" value='<?php isset($datos["data"]["clave1"]) ? print $datos["data"]["clave1"]:""; ?>'>
	</div>

	<div class="form-group text-left py-2">
		<label for="clave2" class="py-2">* Repetir clave de acceso</label>
		<input type="password" name="clave2" id="clave2" class="form-control py-2" required placeholder="Verifique su clave de acceso" value='<?php isset($datos["data"]["clave2"]) ? print $datos["data"]["clave2"]:""; ?>'>
	</div>


	<div class="form-group text-left py-2">
		<label for="direccion" class="py-2">* Dirección</label>
		<input type="text" name="direccion" id="direccion" class="form-control py-2" required placeholder="Escriba su direccion" value='<?php isset($datos["data"]["direccion"]) ? print $datos["data"]["direccion"]:""; ?>'>
	</div>

	<div class="form-group text-left py-2">
		<label for="ciudad" class="py-2">* Ciudad</label>
		<input type="text" name="ciudad" id="ciudad" class="form-control py-2" required placeholder="Escriba su ciudad" value='<?php isset($datos["data"]["ciudad"]) ? print $datos["data"]["ciudad"]:""; ?>'>
	</div>

	<div class="form-group text-left py-2">
		<label for="codpos" class="py-2">* Código Postal</label>
		<input type="text" name="codpos" id="codpos" class="form-control py-2" required placeholder="Escriba su código postal" value='<?php isset($datos["data"]["codpos"]) ? print $datos["data"]["codpos"]:""; ?>'>
	</div>

	<div class="form-group text-left py-2 ">
		<label for="pais" class="py-2">* Pais</label>
		<input type="text" name="pais" id="pais" class="form-control py-2" required placeholder="Escriba su país" value='<?php isset($datos["data"]["pais"]) ? print $datos["data"]["pais"]:""; ?>'>
	</div>

	<div class="form-group text-left">
		<label for="enviar" class="py-2"></label>
		<input type="submit" value="enviar datos" class="btn btn-success py-2" role="button">
		<a href="<?php echo constant('URL'); ?>login" class="btn btn-info">Regresar</a>
	</div>

</form>




<?php include_once("piepagina.php"); ?>