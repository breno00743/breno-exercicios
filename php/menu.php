<?php
if (!isset($pg_atual)) {
    $pg_atual = '';
}
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Barra</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php echo ($pg_atual == 'home') ? 'active' : ''; ?>" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($pg_atual == 'produtos') ? 'active' : ''; ?>" href="produtos.php">Produtos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($pg_atual == 'carrinho') ? 'active' : ''; ?>" href="carrinho.php">Carrinho</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
