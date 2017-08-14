<?php 

function dataPTBrParaMysql($dataPtBr){
	$partes = explode("/",$dataPtBr);
	return "{$partes[2]}-{$partes[1]}-{$partes[0]}";
}
function dataMysqlParaPTBr($dataMysql){
	$partes = explode("-",$dataMysql);
	return "{$partes[2]}/{$partes[1]}/{$partes[0]}";
}