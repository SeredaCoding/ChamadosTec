<?php

		session_start();

		

		//variavel que verifica se a autenticação foi realizada
		$usuario_autenticado = false;

		//id do usuário
		$usuario_id = null;

		//nome do usuário
		$usuario_nome = null;

		//perfis
		$usuario_perfil_id = null;

		//perfis hierárquicos
		$perfis = [1 => 'Administrativo', 2 => 'Usuário'];


		//usuários do sistema

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

		      fclose($arquivo);
		  };

		foreach($usuarios_app as $user){
			/*echo 'Usuário app: ' . $user['email'] . ' / ' . 'Senha: ' . $user['senha'];
			echo '<br/>';
			echo 'Usuário form: ' . $_POST['email'] . ' / ' . 'Senha: ' . $_POST['senha'];
			echo '<hr>';*/

			if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
				$usuario_autenticado = true;
				$usuario_id = $user['id'];
				$usuario_perfil_id = $user['perfil_id'];
				$usuario_nome = $user['nome'];
			}
			
		}

		if($usuario_autenticado){
			echo '---Usuário autenticado---';
			$_SESSION['autenticado'] = 'SIM';
			$_SESSION['id'] = $usuario_id;
			$_SESSION['perfil_id'] = $usuario_perfil_id;
			$_SESSION['nome'] = $usuario_nome;
			echo $usuario_id.$usuario_nome.$usuario_perfil_id;
			header('Location: home.php');
		}else {
			echo '---Erro na autenticação---';
			header('Location: index.php?login=erro');
			$_SESSION['autenticado'] = 'NAO';
		}





		/*print_r($_GET);

		echo $_GET['email'];
		echo '<br/>';
		echo $_GET['senha'];
		echo '<pre>';
		print_r($_POST);
		echo '<pre/>';
		echo '<br/>';
		/*echo $_POST['email'];
		echo '<br/>';
		echo $_POST['senha'];*/
?>
