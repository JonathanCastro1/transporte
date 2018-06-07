<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function index()
	{
		$data['usuario'] = $this->session->userdata('usuario');
		$data['contrasena'] = $this->session->userdata('contrasena');

	    // traemos la data para mostrar la imagen de perfil
        $data['datos']=$this->login_model->mostrarImagen(); 

		$data['tUsuarios'] = $this->usuarios_model->totalUsuarios();
		// $data['tEstudiantes'] = $this->estudiantes_model->totalEstudiantes();
		// $data['tProfesores'] = $this->profesores_model->totalProfesores();
		// $data['tAprobados'] = $this->calificaciones_model->estudiantesAprobados();

		$this->load->view('layouts/header');
		$this->load->view('admin/navbar',$data);
		$this->load->view('admin/navigation');		
		$this->load->view('admin/dashboard');
		$this->load->view('layouts/footer',$data);
	}



}
