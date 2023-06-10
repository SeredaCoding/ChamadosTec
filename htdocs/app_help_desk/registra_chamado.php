<?php
	
	session_start();
	
	echo '<pre>';
	print_r($_POST);
	echo '</pre>';

	//estamos trabalhando a montagem do texto
	$titulo = str_replace('#','-', $_POST['titulo']);

	$categoria = str_replace('#','-', $_POST['categoria']);

	$descricao = str_replace('#','-', $_POST['descricao']);

	print_r($_SESSION['nome']);


	$texto =$_SESSION['id'] .'#'. $titulo .'#'. $categoria .'#'. $descricao .'#'. $_SESSION['nome'];

	//abrindo o texto
	$arquivo = fopen('../app_help_desk_pv/arquivo.hd', 'a');
	
	//escrevendo o texto
	fwrite($arquivo, $texto);

	//fechando o texto
	$arquivo_fechado = fclose($arquivo);

	if($arquivo_fechado){
		header('Location: abrir_chamado.php?abertura_chamado=sucesso');
	}else{
		header('Location: abrir_chamado.php?abertura_chamado=erro');
	}

	


?>