<?php

	//Verificar se já existe uma conta registrada

	//abrir o usuarios.hd / registros dos usuários.
	  $arquivo = fopen('usuarios.hd','r');

	  //percorrer o registro enquanto houver linhas a serem lidas/recuperadas

	  if ($arquivo) {

	    while ($linhas = fgets($arquivo)) {

	        //conversão de cada string na linha para um array
	        $registro = explode('#', $linhas);

	        //atribuição de cada linha/login a um array dentro do array usuarios_app
	        $usuarios_app[] = 
	        ['id' => $registro[0], 'email' => $registro[1],'senha'=> $registro[2],'perfil_id' => $registro[3] , 'nome' => $registro[4]];

	    }

	}; 

	echo '<pre>';
    print_r($usuarios_app);
    echo '<pre/>';
    echo count($usuarios_app);

    $escrever_registro = true;

    //verificação de conta existente ou não
	foreach($usuarios_app as $user){
		if($user['email'] == $_POST['email1'] || $user['email'] == $_POST['email2']){
			$escrever_registro = false;
		}
	};


	if($_POST['senha1'] === $_POST['senha2'] && $_POST['email1'] === $_POST['email2'] && $escrever_registro == true){

		//E-mail(s) e Senhas correspondem.
		$nome = str_replace('#','-', $_POST['nome1']). ' ' . str_replace('#','-', $_POST['nome2']);
		$nome = strtolower($nome);
		$nome = ucwords($nome);

		$senha = str_replace('#','-', $_POST['senha1']);

		$email = str_replace('#','-', $_POST['email1']);
		$email = strtolower($email);

		function gerarIDUnico() {
	    $id = uniqid(); // Gera um ID único baseado no timestamp atual
	    return $id;
		}

		$idUsuario = gerarIDUnico();

		$registros_usuarios =  $idUsuario . '#' . $email . '#' . $senha . '#' . 2 . '#' . $nome . PHP_EOL;

		//abrindo o texto
		$arquivo = fopen('usuarios.hd', 'a');
		//$arquivo = fopen('../../app_help_desk/usuarios.hd', 'a');

		fwrite($arquivo, $registros_usuarios);

		//fechando o texto
		$arquivo_fechado = fclose($arquivo);

		if($arquivo_fechado){
			header('Location: registrar.php?registrar=sucesso');
		}else{
			header('Location: registrar.php?registrar=erro1');
		}

	}else if($_POST['senha1'] === $_POST['senha2'] && $_POST['email1'] != $_POST['email2']){
		//E-mail(s): diferentes
		//Senhas: iguais
		header('Location: registrar.php?registrar=email_erro');
	}else if($_POST['senha1'] != $_POST['senha2'] && $_POST['email1'] === $_POST['email2']){
		//E-mail(s): iguais
		//Senhas: diferentes
		header('Location: registrar.php?registrar=senha_erro');
	}else if($escrever_registro == false){
		//Conta existente.
		header('Location: registrar.php?registrar=erro3');
	}else{
		//E-mail(s) e Senhas não correspondem
		header('Location: registrar.php?registrar=erro2');
	}
  
?>