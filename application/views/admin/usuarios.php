
	<div class="row col-md-6 col-md-offset-2">

		<div class="page-header">
  			<h1>Admin Usuarios <small>Castro Tours</small></h1>
		</div>

		<div>
			<a href="<?php echo base_url();?>usuarios/agregar" ><span class="btn-success btn-xs glyphicon glyphicon-plus" data-toggle="modal"  id="">Agregar</span></a>

			<a  href="<?php echo base_url();?>usuarios/reporteUPdf"><span class="btn-danger  btn-xs glyphicon glyphicon-file">PDF</span></a>

			<a  href="<?php echo base_url();?>usuarios/reporteUExcel"><span class="btn-warning  btn-xs glyphicon glyphicon-download-alt">XLS</span></a>			
		</div>

		<br>

		<table id="tabla" class="table-responsive table-hover table-bordered" > 

		 
												
	                    <thead>
	                        <tr>
	                        	<th >#</th>
	                        	<th >Imagen</th>
	                            <th >Registrado</th>
	                            <th >Email</th>	                           
	                            <th >Usuario</th>
	                            <th >Role</th>
	                            <th >Acciones</th>           
			                 </tr>
			               </thead>

			 <tbody>
			<?php

		foreach ($datoss as $dato) {

			?>
		<tr>
		<td><?php echo $dato->id ?> </td>
		<td><img src="<?=base_url()?>subidas/miniaturas/<?php echo $dato->ruta;?>" class="img-responsive img-circle" /></td>		
		<td><?php echo $dato->fecha ?> </td>
		<td><?php echo $dato->email ?> </td>
		<td><?php echo $dato->usuario ?> </td>
		<td><?php echo $dato->role ?> </td>		
		<td >
		<!-- El id tiene que mostrarse en le tabla, si no no funcionan los metodos de ver,editar,eliminar -->
		 <a  href="<?php echo base_url("usuarios/ver/$dato->id") ?>" ><span class="btn-primary btn-xs glyphicon glyphicon-zoom-in" data-toggle="ver" title="Ver"></span></a>
		
		
		 <a  href="<?php echo base_url("usuarios/editar/$dato->id") ?>" ><span class="btn-success btn-xs glyphicon glyphicon-pencil" data-toggle="editar" title="Editar"></span></a>
		
		
		 <a id="eliminar"  href="<?php echo base_url("usuarios/eliminar/$dato->id") ?>" ><span class="btn-danger btn-xs glyphicon glyphicon-trash" data-toggle="eliminar" title="Eliminar"></span></a>
		</td>

		</tr>

		<?php

		}


		?>

	</tbody>

</table>

<br>
<br>
<br>

</div>

