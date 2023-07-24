<?php
// gabriel 21072023

include_once('../head.php');
include_once('../database/token.php');

$usuarios = buscaToken();

?>


<body class="bg-transparent">
    <div class="container" style="margin-top:30px">
        <div class="row mt-4">
            <div class="col-sm-8">
                <p class="tituloTabela">Usuarios Token</p>
            </div>
            <div class="col-sm-4" style="text-align:right">
                <a href="token_inserir.php" role="button" class="btn btn-primary">Adicionar Usuario</a>
            </div>
        </div>
        <div class="card shadow mt-2">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">Usuario</th>
                        <th class="text-center">Ação</th>
                    </tr>
                </thead>
                <?php
                foreach ($usuarios as $usuario) {
                    ?>
                    <tr>
                        <td class="text-center">
                            <?php echo $usuario['idUsuario'] ?>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-success btn-sm"
                                href="token_ativar.php?idUsuario=<?php echo $usuario['idUsuario'] ?>" role="button">Novo
                                Token</a>
                            <a class="btn btn-primary btn-sm"
                                href="token_alterar.php?idUsuario=<?php echo $usuario['idUsuario'] ?>"
                                role="button">Editar</a>
                            <a class="btn btn-danger btn-sm"
                                href="token_excluir.php?idUsuario=<?php echo $usuario['idUsuario'] ?>"
                                role="button">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>

</body>

</html>