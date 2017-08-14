<?php $this->load->view("cabecalho"); ?>
		<h1><?=$produto["nome"]?></h1><br>
		Preço: <?=$produto["preco"]?><br>
		<?=auto_typography(html_escape($produto["descricao"]))?>

		<h2>Compre agora mesmo</h2>
		<?php
			echo form_open("vendas/nova");
			//***********
			echo form_hidden("produto_id",$produto['id']);

			echo form_label("Data de entrega","data_de_entrega");
			echo form_input(array(
				'name'=>'data_de_entrega',
				'id'=>'data_de_entrega',
				'class'=>'form-control',
				'maxlength'=>'255',
				'value'=>''
				));
			//**********

			echo form_button(array(
				'class'=>'btn btn-success',
				'content'=>'Comprar',
				'type'=>'submit'
					));
			echo form_close();
		?>
<?php $this->load->view("rodape"); ?>