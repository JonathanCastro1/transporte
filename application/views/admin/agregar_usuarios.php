
<div class="row page-header col-md-6 col-md-offset-3 ">	
	<h2 class="fas fa-users">Agregar Usuarios</h2>
</div>

<div class="row col-md-6 col-md-offset-3 ">

	<form action="<?php echo base_url();?>usuarios/agregar" method="post">
		<div class="form-group">
			<h5 class="bg-danger"><?php echo form_error('fecha'); ?><h5>
			<input type="text" id="datepicker" name="fecha" placeholder="Fecha de Registro" class="form-control" >
		</div>

		<div class="form-group">
			<h5 class="bg-danger"><?php echo form_error('email'); ?><h5>
			<input type="text" name="email" placeholder="Email" class="form-control">
		</div>	
	
		<input type="hidden" name="ruta" value="conductor.jpg">

		<div class="form-group">
			<h5 class="bg-danger"><?php echo form_error('usuario'); ?><h5>
			<input type="text" name="usuario" placeholder="Usuario" class="form-control">
		</div>			
		
		<div class="form-group">
			<h5 class="bg-danger"><?php echo form_error('contrasena'); ?></h5>
			<input type="password" name="contrasena" placeholder="Contraseña" class="form-control">
		</div>

		<div class="form-group">
			<h5 class="bg-danger"><?php echo form_error('confirmarContrasena'); ?></h5>
			<input type="password" name="confirmarContrasena" placeholder="Confirmar Contraseña" class="form-control">
		</div>

		<div class="form-group">
			<h5 class="bg-danger"><?php echo form_error('role'); ?><h5>
			<select class="form-control" name="role">
				<option value="">Seleccione Role</option>
				<option value="conductor">conductor</option>
				<option value="administracion">administracion</option>
			</select>
		</div>




		<div class="form-group">
			<button type="submit" name="submit" value="submit" class="btn-primary btn-sm glyphicon glyphicon-ok">Agregar</button>
			<button type="reset" class="btn-danger btn-sm glyphicon glyphicon-remove">Cancelar</button>
		</div>

		<div class="form-group">
			<a href="<?php echo base_url();?>usuarios"><span class="btn-default btn-sm glyphicon glyphicon-arrow-left">Regresar</span></a>
		</div>		

	</form>	

<br>
<br>
<br>
<br>	
</div>
