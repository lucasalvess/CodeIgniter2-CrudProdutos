<?php 
 function autoriza(){
	$ci = get_instance();
	$usuariologado  = $ci->session->userdata("usuario_logado");
	if(!$usuariologado){
		$ci->session->set_flashdata("mensagem","<script>swal(
			'Ops!',
			'Você precisa estar Logado!',
			'info'
			)</script>");
		redirect("/");
	}
	return $usuariologado;
}

?>