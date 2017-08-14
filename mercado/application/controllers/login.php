<?php if (! defined('BASEPATH')) exit('Não tem direito de acesso');


class Login extends CI_Controller
{
	public function autenticar(){
		//carrega modelo do usuario
		$this->load->model("usuarios_model");
		//carrega dados do POST 
		$email = $this->input->post("email");
		$senha = md5($this->input->post("senha"));

		//acessa metodo de autenticação
		$usuario = $this->usuarios_model->buscaPorEmailESenha($email,$senha);

		if($usuario){
			$this->session->set_userdata(array("usuario_logado" =>$usuario));
			$this->session->set_flashdata("mensagem","<script>swal(
				'Logado!',
				'Usuario logado com sucesso!',
				'success'
				)</script>");
			
		}else{
			$this->session->set_flashdata("mensagem","<script>swal(
				'Ops!',
				'Usuario ou senha invalidos!',
				'error'
				)</script>");
		}
		redirect('/');

	}

	public function logout(){
		$this->session->unset_userdata("usuario_logado");
		$this->session->set_flashdata("mensagem","<script>swal(
				'Logout!',
				'Deslogado com sucesso!',
				'info'
				)</script>");
		redirect('/');
	}
}