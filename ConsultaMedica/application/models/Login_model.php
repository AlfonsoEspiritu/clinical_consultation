<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    //Manda un registro enbase a la clave y contraseña
	public function get_usuario($email, $clave)
	{
		$this->db->where('email',$email);
		$this->db->where('cve',$clave);
		$query = $this->db->get('usuarios');
		return $query->row();
	}

}