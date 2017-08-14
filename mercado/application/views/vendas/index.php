<?php $this->load->view("cabecalho"); ?>

<h1>Minhas Vendas</h1>
	<table class="table">
		<?php foreach ($produtosVendidos as $produto): ?>
			<tr>
				<td>
					<?=anchor("produtos/{$produto['id']}", $produto['nome']); ?>
					</td>
					<td>
					<?=dataMysqlParaPTBr($produto['data_de_entrega'])?>
					</td>


			</tr>
		<?php endforeach; ?>	

	</table>
	
<?php $this->load->view("rodape"); ?>