<?php $this->load->view("cabecalho"); ?>

<?php if($this->session->userdata("usuario_logado")): //se ja estou logado?>
	<h1>Produtos</h1>

	<table class="table">
		<?php foreach ($produtos as $produto) :?>
			<tr>
				<td>
					<?=anchor("produtos/{$produto['id']}", $produto['nome']); ?>
				</td>
				<td>
					<?=character_limiter($produto["descricao"],10) ?>
				</td>
				<td>Preço: <?=numeroEmReais($produto['preco'])?><br></td><br>
			</tr>
		<?php endforeach ?>
	</table>


	<?=anchor('login/logout','Logout',array("class"=>"btn btn-danger"))?>
	<?=anchor('produtos/formulario','Novo Porduto',array("class"=>"btn btn-primary"))?>
	
	<div class="row">
	<?php else : //se não estou logado?>
		<div class="col-sm-6">

			<img src="<?=base_url('img/man.png')?>" class="img-responsive img-circle center-block" width="40%">
			<h1>Login</h1>
			<?php 
			echo form_open("login/autenticar");

			echo form_label("Email","email");
			echo form_input(array(
				"name"=>"email",
				"class"=>"form-control",
				"id"=>"email",
				"type"=>"email",
				"required"=>""
				));
			echo form_label("Senha","senha");
			echo form_password(array(
				"name"=>"senha",
				"id"=>"senha",
				"class"=>"form-control",
				"required"=>""));
			echo form_button(array(
				"class"=>"btn btn-primary",
				"content"=>"Entrar",
				"type"=>"submit"));

			echo form_close();

			?>
		</div>
		<div class="col-sm-6">
		<img src="<?=base_url('img/user.png')?>" class="img-responsive  center-block" width="40%">
			<h1>Cadastro</h1>
			<?php 
			echo form_open("usuarios/novo");

			echo form_label("Nome","nome");
			echo form_input(array("name"=>"nome",
				"maxlength"=> "255",
				"class"=>"form-control",
				"id"=>"nome",
				"required"=>""));

			echo form_label("Email","email");
			echo form_input(array(
				"name"=>"email",
				"class"=>"form-control",
				"id"=>"email",
				"type"=>"email",
				"required"=>""
				));

			echo form_label("Senha","senha");
			echo form_password(array(
				"name"=>"senha",
				"id"=>"senha",
				"class"=>"form-control",
				"required"=>""));



			echo form_button(array(
				"class"=>"btn btn-primary",
				"content"=>"Cadastrar",
				"type"=>"submit"));

			echo form_close();
			?>
		</div>
	</div>
<?php endif; ?>
<?php $this->load->view("rodape"); ?>