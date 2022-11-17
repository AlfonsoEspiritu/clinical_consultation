<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class clinica_model extends CI_Model {
	//Se conecta con el resto de la tabla de la BD
	public function get_formularios()
	{	//Trae formularios
		$query = $this->db->get('pacientes');
		return $query->result_array();  
	}
		//Insertar los datos en la tabla usuarios
	public function guarda_usuario($datos){
		$this->db->insert('usuarios',$datos);
	}
		//Insertar los datos en la tabla pacientes
	public function guarda_formulario($datos){
		$this->db->insert('pacientes',$datos);
	}
		
	public function elimina_paciente($id){
        $this->db->delete('pacientes',array('ID_Formulario' => $id));//id: llave primaria de la tabla pacientes
	}
		//Busca la infromacion de un paciente en especifico
	public function get_formulario($id){
        $this->db->where('ID_Formulario',$id);
		$query = $this->db->get('pacientes');  
		
		return $query->row();      
	}
		//Modifica y actualiza los datos
	public function update_formulario($id, $datos){
		$this->db->update('pacientes', $datos, array('ID_Formulario' => $id));
	}
}
