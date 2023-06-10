<script src="https://kit.fontawesome.com/25f8242477.js" crossorigin="anonymous"></script>

<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="home.php">
    <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Chamados Técnicos
  </a>

  <ul class="navbar-nav">
    <li class="nav-item">
      <h6 class="text-white">

        <?php

        if($_SESSION['perfil_id'] == 1){
          ?>
            <p>[Suporte]</p><i class="fa-solid fa-star" style="color: #ffffff;"></i>
          <?php echo $_SESSION['nome'];
        }else{
          echo $_SESSION['nome'];
        } ?>

        
      </h6>
      <a class="nav-link" href="logoff.php">Sair/Logoff</a>
    </li>
  </ul>
</nav>
