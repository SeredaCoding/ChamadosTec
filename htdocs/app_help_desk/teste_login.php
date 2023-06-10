<?php

  //abrir o arquivo.hd
  $arquivo = fopen('usuarios.hd','r');

  //percorrer o registro enquanto houver linhas a serem lidas/recuperadas

  if ($arquivo) {

      while ($linhas = fgets($arquivo)) {

          echo $linhas.'<br/>';

          //conversão de cada string na linha para um array
          $registro = explode('#', $linhas);

          //atribuição de cada linha/login a um array dentro do array usuarios_app
          $usuarios_app[] = 
          ['id' => $registro[0], 'email' => $registro[1],'senha'=> $registro[2],'perfil_id' => $registro[3] , 'nome' => $registro[4]];

      }

      fclose($arquivo);
  }else if(!feof($arquivo)){
    echo 'Sem login(s) cadastrados!';
  }

    /*echo '<pre>';
    print_r($usuarios_app);
    echo '<pre/>';
    echo count($usuarios_app);*/
  
?>