<html>
  <head>
    <meta charset="utf-8" />
    <title>Registrar - Chamados Técnicos</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-login {
        padding: 100px 0 0 0;
        width: 450px;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">
        <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Chamados Técnicos
      </a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header">
              Registrar-se
            </div>
            <div class="card-body">
              <form method="post" action="valida_registro.php">
                <div class="row">

                  <?php

                    if(isset($_GET['registrar']) && $_GET['registrar'] == 'sucesso'){ ?>

                      <div class="col-12 mb-3 text-success">
                        <h5>Registrado com sucesso!</h5>
                      </div>
     
                  <?php } ?>

                  <div class="form-group col-6">
                    <input name="nome1" type="text" class="form-control" placeholder="Nome" required>
                  </div>
                  <div class="form-group col-6">
                    <input name="nome2" type="text" class="form-control" placeholder="Sobrenome" required>
                  </div>
                  <div class="form-group col-6">
                    <input name="email1" type="email" class="form-control" placeholder="E-mail" required>
                  </div>
                  <div class="form-group col-6">
                    <input name="email2" type="email" class="form-control" placeholder="Confirmar E-mail" required>
                  </div>
                  <div class="form-group col-6">
                    <input name="senha1" type="password" class="form-control" placeholder="Senha" required>
                  </div>
                  <div class="form-group col-6">
                    <input name="senha2" type="password" class="form-control" placeholder="Confirmar Senha" required>
                  </div>
                  <div class="col">
                    <button class="btn btn-lg btn-success btn-block" type="submit">Registrar</button>
                  </div>

                  <?php

                    if(isset($_GET['registrar']) && $_GET['registrar'] == 'email_erro'){ ?>

                      <div class="col-12 mt-3 text-danger">
                        <p>Os e-mail(s) não correspondem! Tente novamente.</p>
                      </div>
     
                  <?php } ?>

                  <?php

                    if(isset($_GET['registrar']) && $_GET['registrar'] == 'senha_erro'){ ?>

                      <div class="col-12 mt-3 text-danger">
                        <p>As senhas não correspondem! Tente novamente.</p>
                      </div>
     
                  <?php } ?>

                  <?php

                    if(isset($_GET['registrar']) && $_GET['registrar'] == 'erro2'){ ?>

                      <div class="col-12 mt-3 text-danger">
                        <p>Erro ao registrar! Confirme a senha e o e-mail novamente.</p>
                      </div>
     
                  <?php } ?>

                  <?php

                    if(isset($_GET['registrar']) && $_GET['registrar'] == 'erro1'){ ?>

                      <div class="col-12 mt-3 text-danger">
                        <p>Erro ao registrar!</p>
                      </div>
     
                  <?php } ?>

                  <?php

                    if(isset($_GET['registrar']) && $_GET['registrar'] == 'erro3'){ ?>

                      <div class="col-12 mt-3 text-danger">
                        <p>Erro ao registrar! Conta já existente.</p>
                      </div>
     
                  <?php } ?>

                </div>
              </form>

              <div class="card">
                <div class="card-footer">
                  <a href="index.php">Login/Entrar</a>
                </div>
              </div>


            </div>
          </div>
        </div>
    </div>
  </body>
</html>