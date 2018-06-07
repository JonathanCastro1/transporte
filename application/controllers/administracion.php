<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administracion extends CI_Controller {
	
	public function index()
	{
		$data['usuario'] = $this->session->userdata('usuario');
		$data['contrasena'] = $this->session->userdata('contrasena');

        // traemos la data para mostrar la imagen de perfil
        $data['datos']=$this->login_model->mostrarImagen();

		$data['datoss'] = $this->administracion_model->seleccionarAdministrativo();

		$this->load->view('layouts/header');
		$this->load->view('admin/navbar',$data);
		$this->load->view('admin/navigation');
		$this->load->view('administracion/administracion');
		$this->load->view('layouts/footer');
	}

        public function agregar()
    {
        // $data['usuario'] = $this->session->userdata('usuario');
        // $data['contrasena'] = $this->session->userdata('contrasena');

        // // traemos la data para mostrar la imagen de perfil
        // $data['datos']=$this->login_model->mostrarImagen();       

        // $this->load->view('layouts/header');
        // $this->load->view('admin/navbar',$data);
        // $this->load->view('admin/navigation');
        // $this->load->view('admin/agregar_usuarios');
        // $this->load->view('layouts/footer');

         // Establecemos las reglas de validacion
         $this->form_validation->set_rules('fecha', 'Ingrese una Fecha', 'required');    
         $this->form_validation->set_rules('email', 'Ingrese un email valido', 'required');
         
         $this->form_validation->set_rules('usuario', 'Ingrese un usuario','trim|required|min_length[3]');

         $this->form_validation->set_rules('contrasena', 'Contraseña', 'trim|required|min_length[3]');
         $this->form_validation->set_rules('confirmarContrasena', 'Confirmar Contraseña', 'trim|required|min_length[3]|matches[contrasena]');

         $this->form_validation->set_rules('role', 'Seleccione un rol', 'required');


       if ($this->form_validation->run() == FALSE){

        // me quedo en esta vista, si no esta validado
                $data['usuario'] = $this->session->userdata('usuario');
                $data['contrasena'] = $this->session->userdata('contrasena');

                // $data['datos'] = $this->usuarios_model->seleccionarUsuarios();
                 // traemos la data para mostrar la imagen de perfil
                 $data['datos']=$this->login_model->mostrarImagen(); 

                $this->load->view('layouts/header');
                $this->load->view('admin/navbar',$data);
                $this->load->view('admin/navigation');
                $this->load->view('admin/agregar_usuarios');
                $this->load->view('layouts/footer');

           }else{
                       
          if (isset($_POST['submit'])) {  

    
      $fecha = $this->input->post('fecha');      
      $email = $this->input->post('email');
      $ruta = $this->input->post('ruta');    
      $usuario = $this->input->post('usuario');
      $contrasena = $this->input->post('contrasena');
      $role = $this->input->post('role');
        // nota el orden de los parametros, altera las posiciones en la base de datos
      $this->usuarios_model->agregarUsuarios($fecha,$email ,$ruta,$usuario , $contrasena ,$role);

      redirect(base_url("usuarios"));     
                          
            }     

           }          
    }


	//   public function agregarUsuarios()	{


 //     // Establecemos las reglas de validacion
 //         $this->form_validation->set_rules('fecha', 'Ingrese una Fecha', 'required');    
 //         $this->form_validation->set_rules('email', 'Ingrese un email valido', 'required');
        

 //         $this->form_validation->set_rules('role', 'Seleccione un rol', 'required');
         
 //         $this->form_validation->set_rules('Usuario', 'Ingrese un usuario', 'trim|required|min_length[3]');

 //         $this->form_validation->set_rules('contrasena', 'Contraseña', 'trim|required|min_length[3]');
 //         $this->form_validation->set_rules('confirmarContrasena', 'Confirmar Contraseña', 'trim|required|min_length[3]|matches[contrasena]');


 //       if ($this->form_validation->run() == FALSE){

 //        // me quedo en esta vista, si no esta validado
 //                $data['usuario'] = $this->session->userdata('usuario');
 //                $data['contrasena'] = $this->session->userdata('contrasena');

 //                // $data['datos'] = $this->usuarios_model->seleccionarUsuarios();
 //                 // traemos la data para mostrar la imagen de perfil
 //                 $data['datos']=$this->login_model->mostrarImagen(); 

 //                $this->load->view('layouts/header');
 //                $this->load->view('admin/navbar',$data);
 //                $this->load->view('admin/navigation');
 //                $this->load->view('admin/agregar_usuarios');
 //                $this->load->view('layouts/footer');

 //           }else{
                       
 //          if (isset($_POST['submit'])) {  

    
 //      $fecha = $this->input->post('fecha');      
 //      $email = $this->input->post('email');
 //      $role = $this->input->post('role');
 //      $usuario = $this->input->post('usuario');
 //      $contrasena = $this->input->post('contrasena');

 //      $this->usuarios_model->agregarUsuarios($fecha,$email ,$role,$usuario , $contrasena);

 //      redirect(base_url("usuarios"));     
                          
 //            }     

 //           }             
			

	// }

        // obtengo el parametro id
        public function editar($id) {       
                
            // mantego abierta los datos de la session
            $data['usuario'] = $this->session->userdata('usuario');
            // $data['contrasena'] = $this->session->userdata('contrasena');   
            
            $data['datoss'] = $this->usuarios_model->usuariosPorId($id);

             // traemos la data para mostrar la imagen de perfil
            $data['datos']=$this->login_model->mostrarImagen(); 

                if (isset($_POST['submit'])) {
                            $fecha = $this->input->post('fecha');
                            $email = $this->input->post('email');
                            $usuario = $this->input->post('usuario');
                            $role = $this->input->post('role');                        

                $data['datos']= $this->usuarios_model->editarUsuarios($fecha,$email ,$usuario ,$role ,$id);
                $this->load->view('admin/editar_usuarios',$data);

                redirect(base_url("usuarios"));
                            
                
                } 
                
                $this->load->view('layouts/header');
                $this->load->view('admin/navbar',$data);
                $this->load->view('admin/navigation');           
                $this->load->view('admin/editar_usuarios',$data);
                $this->load->view('layouts/footer');                     

    }


      public function eliminar($usuario)   {
       

            $this->administracion_model->eliminarAdministrativo($usuario);

            redirect(base_url("administracion"));   
                

    } 


     public function ver($id)   {
       

        $data['usuario'] = $this->session->userdata('usuario');
        $data['contrasena'] = $this->session->userdata('contrasena');       

        $data['datoss']=$this->usuarios_model->verUsuarios($id);

        // traemos la data para mostrar la imagen de perfil
        $data['datos']=$this->login_model->mostrarImagen(); 

        $this->load->view('layouts/header');
        $this->load->view('admin/navbar',$data);
        $this->load->view('admin/navigation');       
        $this->load->view('admin/ver_usuarios',$data);
        $this->load->view('layouts/footer');  
                

    }


		public function totalUsuarios()
	{
		
		$data['datos'] = $this->usuarios_model->totalUsuarios();
		
		$this->load->view('admin/dashboard',$data);
		
	}

	   public function reporteUPdf()	{       	
	
	 $data = $this->usuarios_model->seleccionarUsuarios();
	

	 $totalE = $this->usuarios_model->totalUsuarios();  

	 // Creacion del PDF
 
    /*
     * Se crea un objeto de la clase Pdf, recuerda que la clase Pdf
     * heredó todos las variables y métodos de fpdf
     */

	 $this->pdf = new fpdf();
    // Agregamos una página
    $this->pdf->AddPage();
    // Define el alias para el número de página que se imprimirá en el pie
    $this->pdf->AliasNbPages();
 
    /* Se define el titulo, márgenes izquierdo, derecho y
     * el color de relleno predeterminado
     */
    $this->pdf->SetTitle("Reporte Usuarios");
    $this->pdf->SetLeftMargin(15);
    $this->pdf->SetRightMargin(15);
    $this->pdf->SetFillColor(200,200,200);
 
    // Se define el formato de fuente: Arial, negritas, tamaño 9
    $this->pdf->SetFont('Arial', 'B', 9);
    /*
     * TITULOS DE COLUMNAS
     *
     * $this->pdf->Cell(Ancho, Alto,texto,borde,posición,alineación,relleno);
     */
 
    $this->pdf->Cell(40,5,'Registrado','TBL',0,'L','1');
    $this->pdf->Cell(40,5,'Email','TB',0,'L','1');
    $this->pdf->Cell(40,5,'Usuario','TB',0,'L','1');
    $this->pdf->Cell(40,5,'Role','TB',0,'L','1');         
    $this->pdf->Ln(7);
    // La variable $x se utiliza para mostrar un número consecutivo
    // $x = 1;
    foreach ($data as $datos) {
      // se imprime el numero actual y despues se incrementa el valor de $x en uno
      // $this->pdf->Cell(15,5,$x++,'BL',0,'C',0);
      // Se imprimen los datos de cada alumno
      $this->pdf->Cell(40,5,$datos->fecha,'B',0,'L',0);
      $this->pdf->Cell(40,5,$datos->email,'B',0,'L',0);
      $this->pdf->Cell(40,5,$datos->usuario,'B',0,'L',0);
      $this->pdf->Cell(40,5,$datos->role,'B',0,'L',0);
     
     
      //Se agrega un salto de linea
      $this->pdf->Ln(5);
    }

    $this->pdf->Cell(40,5,'Total Fecha:','TB',0,'L','1');
 	$this->pdf->Cell(40,5, date("d-m-y"),'B',0,'L',0);
 	$this->pdf->Ln(5);
 	$this->pdf->Cell(40,5,'Total Usuarios:','TB',0,'L','1');
 	$this->pdf->Cell(40,5, $totalE->totalusuarios,'B',0,'L',0);
  
    /*
     * Se manda el pdf al navegador
     *
     * $this->pdf->Output(nombredelarchivo, destino);
     *
     * I = Muestra el pdf en el navegador
     * D = Envia el pdf para descarga
     *
     */
    $this->pdf->Output("Reporte usuarios.pdf", 'D');
		
	}


        public function reporteUExcel()
    {

        $data = $this->usuarios_model->mostrarUsuariosExcel();
       
       //load our new PHPExcel library
        $this->load->library('phpexcel');
        //activate worksheet number 1
        $this->phpexcel->setActiveSheetIndex(0);

        //name the worksheet
        $this->phpexcel->getActiveSheet()->setTitle('Reporte Usuarios');

          // mostramos la data del modelo biene en forma de array, con result_array

         $this->phpexcel->getActiveSheet()->fromArray($data);

 
    $filename='Reporte usuarios.xls'; //save our workbook as this file name
    header('Content-Type: application/vnd.ms-excel'); //mime type
    header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
    header('Cache-Control: max-age=0'); //no cache
                
    //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
    //if you want to save it as .XLSX Excel 2007 format
    $objWriter = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel5');  
    //force user to download the Excel file without writing it to server's HD
    $objWriter->save('php://output');
       
        
    }




}
