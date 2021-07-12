<?php include_once("encabezado.php"); ?>

	<h1 class="text-center">Login</h1>
	<div class="card p-4 bg-light">
		<!-- FORMULARIO -->
		<form action="<?php echo constant('URL');?>login/verifica/" method="POST">


			<div class="form-group text-left py-2">
				<label for="usuario">Usuario</label>
				<input type="text" name="usuario" class="form-control">
			</div>

			<div class="form-group text-left py-2">
				<label for="clave">Clave acceso</label>
				<input type="password" name="clave" class="form-control">
			</div>					

			<div class="form-group text-left py-2">
				<input type="submit" value="Enviar" class="btn btn-success">
			</div>

			<input type="checkbox" name="recordar">
			<label for="recordar">Recordar</label>	

							

		</form>

	</div>

	<a href="<?php echo constant('URL');?>login/registro/" >Darse de Alta en el sistema</a><br><br>
	<a href="<?php echo constant('URL');?>login/olvido/" >¿Olvidaste tu clave de acceso?</a>


<?php include_once("piepagina.php"); ?>