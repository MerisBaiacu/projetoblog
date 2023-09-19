<!DOCTYPE html> <!--Código de cadastro de posts-->
<html>
    <head>
        <title>Post | Projeto para Web com PHP</title>
        <link rel="stylesheet"
            href="lib/bootstrap-4.2.1-dist/css/bootstrap.min.css">
    </head>
    <body style = "background-color: #2f373d">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php 
                    include 'includes/topo.php';
                    include 'includes/valida_login.php' ?>
                </div>

            </div>
            <div class="row" style="min-height: 500px;">
                <div class="col-md-12">
                    <?php include 'includes/menu.php'; ?>
                </div>
                <div class="col-md-10" style="padding-top: 50px;">
                    <?php
                        require_once 'includes/funcoes.php';
                        require_once 'core/conexao_mysql.php';
                        require_once 'core/sql.php';
                        require_once 'core/mysql.php';

                        foreach($_GET as $indice => $dado){
                            $$INDICE = limparDados($dado);
                        }

                        if(!empty($id)){
                            $id = (int)$id;

                            $criterio = [
                                ['id', '=', $id]
                            ];

                            $retorno = buscar(
                                'post',
                                ['*'],
                                $criterio
                            );

                            $entidade = $retorno[0];
                        }
                    ?>

                    <h2 style = "color:white">Post</h2>
                    <form method="post" action="core/post_repositorio.php">
                        <input style = "color:white" type="hidden" name="acao"
                            value="<?php echo empty($id) ? 'insert' : 'update' ?>">
                        <input type="hidden" name="id"
                            value="<?php echo $entidade['id'] ?? '' ?>">
                        <div class="form-group">
                                <label style = "color:white" for="titulo">Título:</label>
                                <input class="form-group" type="text"
                                    required id="titulo" name="titulo"
                                    value="<?php echo $entidade['titulo'] ?? '' ?>">
                        </div>
                        <div class="form-group">
                                <label style = "color:white" for="texto">Texto:</label>
                                <textarea class="form-control" type="text"
                                    required id="texto" name="texto" rows="5">
                                    <?php echo $entidade['texto'] ?? '' ?></textarea>
                        </div>
                        <div class="form-group">
                            <label style = "color:white" for="texto">Postar em:</label>
                            <?php 
                                $data = (!empty($entidade['data_postagem']))?
                                    explode(' ', $entidade['data_postagem'])[0] : '';
                                $hora = (!empty($entidade['data_postagem']))?
                                    explode(' ', $entidade['data_postagem'])[1] : '';
                            ?>
                            <div class="row">
                                <div class="col-md-3">  
                                    <input class="form-control" type="date"
                                        required
                                        id="data_postagem"
                                        name="data_postagem"
                                        value="<?php echo $data ?>">
                                </div>
                                <div class="col-md-3">  
                                    <input class="form-control" type="time"
                                        required
                                        id="hora_postagem"
                                        name="hora_postagem"
                                        value="<?php echo $hora ?>">
                                </div>
                            </div>
                        </div>   
                        <div class="texto-right">  
                            <button class="btn btn-success"
                                    type="submit">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">  
                <div class="col-md-12">
                        <?php
                            include 'includes/rodape.php';
                        ?>
                </div>
            </div>
        </div>
        <script src="lib/bootstrap-4.2.1-dist/js/boostrap.min.js"></script>   
    </body>
</html>