<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class clinica_model extends CI_Model {

	public function get_formularios()
	{
		$query = $this->db->get('pacientes');
		return $query->result_array();  
	}

	public function guarda_usuario($datos){
		$this->db->insert('usuarios',$datos);
	}

	public function guarda_formulario($datos){
		$this->db->insert('pacientes',$datos);
	}

	public function elimina_paciente($id){
        $this->db->delete('pacientes',array('ID_Formulario' => $id));
	}

	public function get_formulario($id){
        $this->db->where('ID_Formulario',$id);
		$query = $this->db->get('pacientes');  
		
		return $query->row();      
	}

	public function update_formulario($id, $datos){
		$this->db->update('pacientes', $datos, array('ID_Formulario' => $id));
	}
}
