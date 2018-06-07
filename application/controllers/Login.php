<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function index()
	{
		$this->load->view('layouts/header');
		$this->load->view('layouts/navbar');
		$this->load->view('login');
		$this->load->view('layouts/footer');
	}


	public function iniciarSession()
	{
		// trim es para que no aiga espacios vacios
		$this->form_validation->set_rules('usuario', 'Usuario', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('contrasena', 'Contraseña', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('confirmarContrasena', 'Confirmar Contraseña', 'trim|required|min_length[3]|matches[contrasena]');

		if($this->form_validation->run() == FALSE) {
			// al hacer redirect se pierde los mensajes de error de form validation,ahy que usar view
			// redirect(base_url());
			$this->load->view('layouts/header');
			$this->load->view('layouts/navbar');
			$this->load->view('login');
			$this->load->view('layouts/footer');

		}else{

			$usuario = $this->input->post('usuario');
			$contrasena = $this->input->post('contrasena');


			$this->session->set_userdata('usuario',$usuario);
			$this->session->set_userdata('contrasena',$contrasena);

			$data['usuario'] = $this->session->userdata('usuario');
			$data['contrasena'] = $this->session->userdata('contrasena');

			// traemos la data para mostrar el total de usuarios
			$data['tUsuarios'] = $this->usuarios_model->totalUsuarios();

			// traemos la data para mostrar la imagen de perfil
			$data['datos']=$this->login_model->mostrarImagen();

			// Valido si existe el admin
			$existeUserPassAdmin=$this->login_model->loginAdmin($usuario ,$contrasena);
			// Valido si existe el conductor
			$existeUserPassConductor=$this->login_model->loginConductores($usuario ,$contrasena);

			$existeUserPassAdministracion=$this->login_model->loginAdministracion($usuario ,$contrasena);
			if ($existeUserPassAdmin)
			{
				$this->load->view('layouts/header');
				$this->load->view('admin/navbar',$data);
				$this->load->view('admin/navigation');				
				$this->load->view('admin/dashboard',$data);				
				$this->load->view('layouts/footer');

			} elseif ($existeUserPassConductor){

				$this->load->view('layouts/header');
				$this->load->view('conductores/navbar',$data);
				$this->load->view('conductores/navigation');	
				$this->load->view('conductores/dashboard');
				$this->load->view('layouts/footer');

			} elseif ($existeUserPassAdministracion){

				$this->load->view('layouts/header');
				$this->load->view('administracion/navbar',$data);
				$this->load->view('administracion/navigation');	
				$this->load->view('administracion/dashboard');
				$this->load->view('layouts/footer');	

			}else {

				redirect(base_url());
		}	


}


}

	public function cerrarSession()	{       	
	
		$this->session->sess_destroy();

		redirect(base_url());
	}



	public function perfilAdmin()
	{

		$data['usuario'] = $this->session->userdata('usuario');
		$data['contrasena'] = $this->session->userdata('contrasena');

		// traemos la data para mostrar la imagen de perfil
		$data['datos']=$this->login_model->mostrarImagen();

		$this->load->view('layouts/header');
		$this->load->view('admin/navbar',$data);
		$this->load->view('admin/navigation');		
		$this->load->view('admin/perfil');
		$this->load->view('layouts/footer');
	}


	public function cambiarPassAdmin()	{       
				
		 	// mantego abierta los datos de la session
			$data['usuario'] = $this->session->userdata('usuario');
			$data['contrasena'] = $this->session->userdata('contrasena');	
			
 			// $data['datos'] = $this->login_model->cambiarPass();

 			$this->form_validation->set_rules('contrasenan', 'Solo numeros', 'required','required|max_length[10]|numeric');

 			$this->form_validation->set_rules('contrasenav', 'Solo numeros', 'required','required|max_length[10]|numeric');         


       if ($this->form_validation->run() == FALSE){

       		redirect(base_url("login/perfiladmin"));			

           }else{

				if (isset($_POST['submit'])) {
				
					$contrasenan = $this->input->post('contrasenan');
					$contrasenav = $this->input->post('contrasenav');							

				 $this->login_model->cambiarPassAdmin($contrasenav ,$contrasenan);
				// $this->load->view('usuarios/editar',$data);

				redirect(base_url("login/perfiladmin"));	
				
				} 
				
				// $this->load->view('header/header');
				// $this->load->view('navbar/navbar_usuarios',$data);
				// $this->load->view('sidebar/sidebar');			
				// $this->load->view('usuarios/editar',$data);
				// $this->load->view('footer/footer');						

	}

}

 	public function subirImagen()	{

        
        $config['upload_path'] = "./subidas/cargadas";        
        $config['allowed_types'] = "gif|jpg|jpeg|png";
        $config['max_size'] = "50000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";

		$this->load->library('upload', $config);

        if (!$this->upload->do_upload('imagen')) {
            //*** ocurrio un error
            $data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors();
            return;
        }

        // recibimos la informacion del archivo que subimos
        $file_info= $this->upload->data();

         $this->crearMiniatura($file_info['file_name']); 


        if (isset($_POST['submit'])) {
       		
        	 $imagen=$file_info['file_name'];        					

			 $this->login_model->subirImagen($imagen);      		   

			redirect(base_url("login/perfiladmin"));
					
                         	
            } 

	}

	 function crearMiniatura($filename){

        $config['image_library'] = 'gd2';
        $config['source_image'] = 'subidas/cargadas/'.$filename;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['new_image']='subidas/miniaturas';
        $config['thumb_marker']='';//captura_thumb.png
        $config['width'] = 40;
        $config['height'] = 40;
        $this->load->library('image_lib', $config); 
        $this->image_lib->resize();
    }

}