<?php 

/**
* 
*/
class Produtos_model extends CI_Model{
	public function buscaTodos(){
		return $this->db->get("produtos")->result_array();
	}
	public function salva($produto){
		if($this->db->insert("produtos", $produto)){
			return true;
		}
	}
	public function busca($id){
		$this->db->where("id", $id);
		return $this->db->get("produtos")->row_array();
	}
	public function buscaVendidos($usuario){
		$id = $usuario['id'];
		$this->db->select("produtos.*,vendas.data_de_entrega");
		$this->db->from("produtos");
		$this->db->join("vendas", "vendas.produto_id = produtos.id");
		$this->db->where("vendido",true);
		$this->db->where("usuario_id",$id);
		return $this->db->get()->result_array();
	}

}