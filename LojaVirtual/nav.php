<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">E-commerce Trip</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          
          <?php  
            
            if (isset($_SESSION['nome_cliente'])){
              echo("Bem-vindo ".$_SESSION['nome_cliente']);
            }else{
              echo "Entrar ou Cadastrar-se";
            }
          ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="login.php">Entrar</a>
          <a class="dropdown-item" href="cadastro.php">
            <?php 
                if (isset($_SESSION['nome_cliente'])){
                  echo("Editar Cadastro");
                }else{
                  echo "Cadastrar";
                } 
            ?>
          </a>
          <a class="dropdown-item" href="#">Carrinho</a>
          <a class="dropdown-item" href="sair.php">Sair</a>
        </div>
      </li>
      <li class="nav-item active">
        <form method="post" action="index.php">
            <input type="text" name="txtPesquisa">
            <input type="submit" name="btnPesquisar" class="btn btn-primary">
        </form>
      </li>
    </ul>
  </div>
</nav>