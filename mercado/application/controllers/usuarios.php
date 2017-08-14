<?php if (! defined('BASEPATH')) exit('Não tem direito de acesso');

class Usuarios extends CI_Controller{
	
	public function novo(){


		//recuperando dados
		$Usuario = array(
			"nome" => $this->input->post("nome"),
			"email" => $this->input->post("email"),
			"senha" => md5($this->input->post("senha"))
			);

		//carregando BD
		$this->load->model("usuarios_model");
		$this->usuarios_model->salvar($Usuario);
		$this->session->set_flashdata("mensagem","<script>swal(
				'Cadastrado!',
				'Usuario cadastrado com sucesso!',
				'success'
				)</script>");

		redirect('/');
	}

}