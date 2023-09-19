<?php
    session_start();
?>

<div class="card bg-dark">
    <div class="card-header">
            <h1 style = "color:white"> Projeto Blog em PHP + MySQL IFSP MARIANA</h1>
    </div>
    <?php if(isset($_SESSION['login'])): ?>
    <div class="card-body text-right">
        <p style = "color:white">Olá <?php echo $_SESSION['login']['usuario']['nome'] ?>!
        <a href="core/usuario_repositorio.php?acao=logout"
            class="btn btn-link btn-sm" role="button">Sair</a></p>
    </div>
    <?php endif ?>
</div>