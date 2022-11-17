<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_controller extends CI_Controller {

	var $msg;
	//Se realiza el constructor de la clase 
	public function __construct(){

		parent::__construct();//Se declara el contructor padre
    	$this->load->helper('url');//Se carga el helper(completa las urls)
        $this->load->database();//Carga la base de datos   
        $this->load->model('Login_model');//Se carga el respectivo modelo, con el cual tiene comunicacion 
        $this->load->library('session');//Se carga la libreria de inicio de sesion 
	}

	public function index()
	{
        //$data['msg'] = $this->msg;

		$this->load->view('login');//Carga la vista del login 
	}

	public function validacion(){
		 $email = $this->input->post('correoelectronico');//asigna al email para asociar con el correo electronico
		 $clave = $this->input->post('contrasena');//asigna la clave para asociar con la contraseña

		//Ah la variable hospitalario se le va asiganar todo el request retornado por el modelo
		 $hospitalario = $this->Login_model->get_usuario($email,$clave);

		 if ( $hospitalario ){ //Si el logeo es correcto en la BD lo mandamos al otro controlador
		 	$this->session->set_userdata('nombre',$hospitalario->NombrePaciente);
		 	redirect('Home_controller');
            
		 } else
		 {	//Si el correo y contraseña son invalidos se redireccionan al mismo controlador
		 	$this->msg = "Correo electrónico y/o Clave incorrecta";
		 	redirect('login_controller');
		 }
 
	}
	public function cierra_sesion(){
		$this->session->sess_destroy();
		$this->index();
	}
}
