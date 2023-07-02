<?php
  require_once "validador_acesso.php"
?>

<?php

  //chamados
  $chamados = [];

  //abrir o arquivo.hd
  $arquivo = fopen('../app_help_desk_pv/arquivo.hd', 'r');

  //percorrer o registro enquanto houver linhas a serem lidas/recuperadas
  while(!feof($arquivo)){ // testa pelo fim do arquivo até indentificar o END OF FILE

    $registro = fgets($arquivo );

    //explode dos detalhes do registro para verificar o id do usuário responsável pelo cadastro
    $registro_detalhes = explode('#', $registro);

    //(perfil id = 2) só vamos exibir o chamado, se ele foi criado pelo usuário
    if($_SESSION['perfil_id'] == 2) {

      //se usuário autenticado não for o usuário de abertura do chamado então não faz nada
      if($_SESSION['id'] != $registro_detalhes[0]) {
        continue; //não faz nada

      } else {
        $chamados[] = $registro; //adiciona o registro do arquivo ao array $chamados
      }

    } else {
      $chamados[] = $registro; //adiciona o registro do arquivo ao array $chamados
    }

  }

  //fechar o arquivo aberto
  fclose($arquivo);

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>Consulta de chamado(s)</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <?php
      require_once "menu.php";
    ?>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado(s)
            </div>
            
            <div class="card-body">
              <div class="row">
                
                <?php //chamados encontrados ou não

                  $perfil1 = ($_SESSION['perfil_id'] == 1 && count($chamados) > 1); //adm
                  $perfil2 = ($_SESSION['perfil_id'] == 2 && count($chamados) > 0); //users

                  if($perfil1 || $perfil2){
                    
                ?>

                  <div class="col-12">
                      <h5 class="card-title">
                      <?php 
                      if(count($chamados) > 1 && $_SESSION['perfil_id'] == 1){
                        echo (count($chamados)-1);
                      }else if(count($chamados) > 0){
                        echo count($chamados);
                      }

                      ?> chamado(s) encontrado(s).</h5>
                  </div>

                <?php }else { ?>

                  <div class="col-12">
                      <h5 class="card-title">Nenhum chamado encontrado.</h5>
                  </div>

                <?php } //fim/chamados encontrados ou não.?>

                <?php foreach($chamados as $chamado) { ?>
                
                  <?php 

                    $chamado_dados = explode('#', $chamado);

                    if(count($chamado_dados) < 3){
                      continue;
                    }

                  ?>


                  <div class="card mb-3 bg-light col-lg-6">
                    <div class="card-body col-12">
                      <div class="col-12">
                        <h5 class="card-title"><?=$chamado_dados[1]; ?></h5>
                      </div>
                      <div class="col-12">
                        <h6 class="card-subtitle mb-2 text-muted"><?=$chamado_dados[2]; ?></h6>
                      </div>
                      <div class="col-12">
                        <p class="card-text"><?=$chamado_dados[3]; ?></p>
                      </div>
                      <div class="col-6">
                        <p class="card-text"><b><?=$chamado_dados[4]; ?></b></p>
                      </div>
                      <!--<div class="col-6">
                        <button class="">Deletar</button>
                      </div>-->
                        

                    </div>
                  </div>

                <?php } ?>

              </div>

              
              <div class="row mt-3 justify-content-md-center">
                <div class="col-4">
                    <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
