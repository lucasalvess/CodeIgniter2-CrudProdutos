<?php 


class Usuarios_model extends CI_Model{
	public function salvar($usuario){
		$this->db->insert("Usuarios",$usuario);
	}

	public function buscaPorEmailESenha($email,$senha){
		$this->db->where("email",$email);
		$this->db->where("senha",$senha);
		$usuario = $this->db->get("Usuarios")->row_array();
		return $usuario;
	}
	public function busca($id){
		$this->db->where("id",$id);
		$usuario = $this->db->get("Usuarios")->row_array();
		return $usuario;
	}
}