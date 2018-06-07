<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administracion_model extends CI_Model {
	
	public function seleccionarAdministrativo()
	{

		$sql = "SELECT usuarios.id,
				usuarios.ruta,
				usuarios.fecha,
				usuarios.email,
				usuarios.usuario,
				usuarios.role,
				administracion.nombre,
				administracion.apellido,	
				administracion.oficina,	
				administracion.departamento,
				administracion.sede,
				administracion.turno							
				from usuarios  INNER JOIN administracion on usuarios.usuario= administracion.usuario 				
				";

		$query = $this->db->query($sql);

		return $query->result();
		
	}

		public function mostrarUsuariosExcel()
	{

		$sql = "SELECT id,nombre,apellido,nacimiento,email,telefono
		 from usuarios";

		$query = $this->db->query($sql);

		return $query->result_array();
		
	}


		public function agregarUsuarios($nombre ,$apellido ,$nacimiento ,$email ,$telefono,$usuario , $contrasena)
	{		
		
		$sql = "INSERT INTO usuarios VALUES
		       (null,
		        '$nombre',
		         '$apellido',
		         '$nacimiento',
		         '$email',
		         '$telefono',		         
		         '$usuario',
		         '$contrasena')";

		$query = $this->db->query($sql);

		return $query;
	}


		public function editarUsuarios($nombre,$apellido ,$nacimiento ,$email ,$telefono , $id)
	{			
				
		$sql = "UPDATE usuarios SET nombre = '$nombre',
				apellido = '$apellido',
				nacimiento = '$nacimiento',
				email = '$email',
				telefono = $telefono
		       WHERE id = $id";

		$query = $this->db->query($sql);    	
		
		 return $query;
	}


		public function verUsuarios($nombre)
	{		
		
		// $sql = "SELECT ruta from imagen where id = $id ";

		$sql = "SELECT imagen.ruta,
				usuarios.nombre,
				usuarios.apellido,
				usuarios.nacimiento,
				usuarios.telefono				
				from usuarios  INNER JOIN imagen on usuarios.id= imagen.id				
				where usuarios.nombre = '$nombre' ";

		$query = $this->db->query($sql);

		return $query->row();
	}



	public function usuariosPorId($id)
	{
		
		$sql = "SELECT id,nombre,apellido,nacimiento,email,telefono from usuarios where id= $id";

		$query = $this->db->query($sql);

		return $query->row();
	}


	public function eliminarAdministrativo($usuario)
	{			
				
		$sql = "DELETE from administracion where usuario='$usuario'";

		$query = $this->db->query($sql);    	
		
		 return $query;
	}



		public function totalUsuarios()
	{		
		
		$sql = "SELECT COUNT(usuario) AS totalusuarios FROM usuarios";
		

		$query = $this->db->query($sql);

		return $query->row();
	}


	


}