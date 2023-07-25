<?php
// helio 01022023 alterado para include_once
// helio 26012023 16:16

include_once('../head.php');
include_once('../database/token.php');

$usuarios = buscaToken($_GET['idUsuario']);
?>


<div class="container" style="width: 400px">
    <center>
        <div id='certo' style="width: 200px; height: 200px"></div>
        <h3>Usuário <?php echo $usuarios['idUsuario'] ?> verificado com sucesso</h3>
            <a href="teste_token.php" class="btn btn-sm btn-warning" style="color:#fff">Voltar</a>
        </div>
    </center>

</div>