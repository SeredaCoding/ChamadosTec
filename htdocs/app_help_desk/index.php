
<html>
  <head>
    <meta charset="utf-8" />
    <title>Login - Chamados Técnicos</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-login {
        padding: 120px 0 0 0;
        width: 350px;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Chamados Técnicos
      </a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-login ">
          <div class="card">
            <div class="card-header">
              Login
            </div>
            <div class="card-body ">
              <form action="valida_login.php" method="post">

                <div class="input-group">
                  <!--<div class="input-group-prepend">
                    <span class="input-group-text">@</i></span>
                  </div>-->
                  <input name="email" type="email" class="form-control <?php if(isset($_GET['login']) && $_GET['login'] == 'erro'){ ?>is-invalid<?php } ?>" placeholder="E-mail" required>
                </div>

                <div class="form-group">
                  <input name="senha" type="password" class="form-control mt-3 <?php if(isset($_GET['login']) && $_GET['login'] == 'erro'){ ?>is-invalid<?php } ?>" placeholder="Senha" required>
                </div>

                <!-- Mensagem de erro -->
                <?php
                  if(isset($_GET['login']) && $_GET['login'] == 'erro'){              
                ?>

                <div class="text-danger">
                  <p>Usuário ou senha inválido(s).</p>
                </div>

                <?php } ?>

                <?php
                  if(isset($_GET['login']) && $_GET['login'] == 'erro2'){              
                ?>

                <script>
                  alert('Aviso! Faça o login antes de acessar está página!')
                </script>
                <div class="text-danger">
                  <p>Login não foi realizado, tente novamente!</p>
                </div>

                <?php } ?>

                <button class="btn btn-lg btn-success btn-block" type="submit">Entrar</button>
              </form>

              <div class="card">
                <div class="card-footer justify-content-center">
                  <a href="registrar.php">Registrar-se</a>
                </div>
              </div>


            </div>
          </div>
        </div>
    </div>
  </body>
</html>