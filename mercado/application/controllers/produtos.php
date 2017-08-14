<?php if (! defined('BASEPATH')) exit('Não tem direito de acesso');

class Produtos extends CI_Controller{

	public function index(){

		//carrega a fução do model que faz a busca de todos os produtos
		$this->load->model("produtos_model");
		$produtos = $this->produtos_model->buscaTodos();

		$dados = array("produtos" => $produtos);

		$this->load->helper("monetizacao");
		$this->load->view('produtos/index.php',$dados);
	}

	public function formulario(){
		autoriza();
		$this->load->view('produtos/formulario.php');
	}

	public function novo(){
		$usuarioLogado = autoriza();

		//faz a validação do campo
		$this->load->library("form_validation");
		$this->form_validation->set_rules("nome","nome","required");
		$this->form_validation->set_rules("descricao","descricao","required|min_length[10]");
		$this->form_validation->set_rules("preco","preco","required");
		$this->form_validation->set_error_delimiters("<script>swal('Oops...','","', 'error')</script>");

		$sucesso = $this->form_validation->run();
		if($sucesso){
			
			$produto = array(
				"nome" => $this->input->post("nome"),
				"preco" => $this->input->post("preco"),
				"descricao" => $this->input->post("descricao"),
				"usuario_id" => $usuarioLogado['id']
				);
			$this->load->model("produtos_model");
		//testa se o produto foi mesmo cadastrado
			if($this->produtos_model->salva($produto)){
				$this->session->set_flashdata("mensagem","<script>swal(
					'Cadastrado!',
					'Produto cadastrado com sucesso!',
					'success'
					)</script>");
			}else{
				$this->session->set_flashdata("mensagem","<script>swal(
					'Ops!',
					'Erro ao cadastrar o produto!',
					'danger'
					)</script>");
			}
			redirect('/');
		}else{
			$this->load->view("produtos/formulario");
		}
		
	}

	public function mostra($id){
		$this->load->helper('typography');
		$this->load->model("produtos_model");
		$produto = $this->produtos_model->busca($id);
		$dados = array("produto" => $produto);
		$this->load->view('produtos/mostra',$dados);
	}
}

