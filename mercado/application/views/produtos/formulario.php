<?php $this->load->view("cabecalho"); ?>
		
		<h1>Cadastro de novo Porduto</h1>
		<?=validation_errors()?>
		<?php 
		echo form_open("produtos/novo");

		echo form_label("Nome", "nome");
		echo form_input(array(
			"name"=>"nome",
			"required"=>"",
			"id"=>"nome",
			"plasceholder"=>"Nome do produto",
			"class"=>"form-control",
			"value"=>set_value("nome","")
			));

		echo form_label("Preco", "preco");
		echo form_input(array(
			"name"=>"preco",
			"required"=>"",
			"id"=>"preco",
			"plasceholder"=>"R$ 0,00",
			"class"=>"form-control",
			"type"=>"number",
			"value"=>set_value("preco","")
			));

		echo form_textarea(array(
			"name"=>"descricao",
			"id"=>"descricao",
			"class"=>"form-control",
			"required"=>"",
			"value"=>set_value("descricao","")
			));

		echo form_button(array(
			"content"=>"Cadastrar",
			"type"=>"submit",
			"class"=>"btn btn_success"
			));

		echo form_close();
		?>
<?php $this->load->view("rodape"); ?>