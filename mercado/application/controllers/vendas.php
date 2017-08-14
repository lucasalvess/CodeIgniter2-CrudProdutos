<?php 
if (!defined('BASEPATH')) exit('Não tem direito de acesso');
class Vendas extends CI_Controller{

	public function nova(){
		$usuario = autoriza();
		$this->load->model(array("vendas_model","produtos_model","usuarios_model"));

		$this->load->helper("date");
		//recupera dados
		$venda = array(
			'produto_id' =>$this->input->post('produto_id'),
			'comprador_id' =>$usuario['id'],
			'data_de_entrega' => dataPTBrParaMysql($this->input->post('data_de_entrega'))
			);

		$this->vendas_model->salvar($venda);


		//recuperando produto
		$produto = $this->produtos_model->busca($venda["produto_id"]);
		$vendedor = $this->usuarios_model->busca($produto['usuario_id']);

		//ENVIO DE EMAIL---------------------------------------
		$this->load->library("email");
		$config["protocol"] = "smtp";
		$config["smtp_host"] = "ssl://smtp.gmail.com";
		$config["smtp_user"] = "fratchello@gmail.com";
		$config["smtp_pass"] = "simounao";
		$config["charset"] = "utf-8";
		$config["mailtype"] = "html";
		$config["newline"] = "\r\n";
		$config["smtp_port"] = "465";
		$this->email->initialize($config);

		$this->email->from("fratchello@gmail.com","Mercado");
		$this->email->to($vendedor['email']);
		$this->email->subject("Seu produto {$produto['nome']} foi vendido");
		$this->email->message("Seu produto <b>{$produto['nome']}</b> foi vendido com sucesso");
		$this->email->send();
	//----------------------------------------------------------------------
		$this->session->set_flashdata("mensagem","<script>swal(
				'Volte sempre!',
				'Pedido efetuado com sucesso!',
				'success'
				)</script>");
		redirect("/");

	}
	public function index(){
		$usuario = autoriza();
		$this->load->model("produtos_model");
		$produtosVendidos = $this->produtos_model->buscaVendidos($usuario);
		$dados = array("produtosVendidos" => $produtosVendidos);
		$this->load->view("vendas/index",$dados);
	}
}