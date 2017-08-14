<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href=<?=base_url("css/bootstrap.css")?>>
	<script src=<?=base_url("js/sweetalert2/sweetalert2.min.js")?>></script>
	<link rel="stylesheet" href=<?=base_url("js/sweetalert2/sweetalert2.min.css")?>>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
</head>
<body>
	<div class="container text-center">

		<?=$this->session->flashdata("mensagem"); ?>