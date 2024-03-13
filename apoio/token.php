<?php
// lucas 120320204 id884 bootstrap local - alterado head
// gabriel 21072023

include_once('../head.php');
include_once('../database/token.php');

$usuarios = buscaToken();

?>

<!doctype html>
<html lang="pt-BR">
<head>

    <?php include_once ROOT . "/vendor/head_css.php"; ?>

</head>

<body class="bg-transparent">
    <div class="container" style="margin-top:10px;margin-bottom:100px;">
        <div class="row mt-4">
            <div class="col-sm">
                <p class="tituloTabela">Usuarios Token</p>
            </div>
            <div class="col-sm-2" style="text-align:right">
                <button type="button" class="btn btn-info" data-toggle="modal"
                    data-target="#testarModal">Testar</button>
            </div>
            <div class="col-sm-2" style="text-align:right">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#inserirModal"><i
                        class="bi bi-plus-square"></i>&nbsp Novo</button>
                <!-- <a href="token_inserir.php" role="button" class="btn btn-success">Adicionar</a> -->
            </div>
        </div>
        <div class="card shadow">
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
                                href="token_ativar.php?idUsuario=<?php echo $usuario['idUsuario'] ?>" role="button">Gerar
                                QR-CODE</a>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#excluirModal" data-idUsuario=<?php echo $usuario['idUsuario'] ?>>Excluir</button>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>

    <!--------- INSERIR/NOVA --------->
    <div class="modal fade bd-example-modal-lg" id="inserirModal" tabindex="-1" role="dialog"
        aria-labelledby="inserirModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Inserir Usuário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="container" style="margin-top: 10px">
                    <form method="post">
                        <div class="col-md-12 form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">Nome
                                Usuario</label>
                            <div class="for-group">
                                <input type="text" class="form-control" name="idUsuario" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="card-footer" style="text-align:right">
                            <button type="submit" formaction="../database/token.php?operacao=inserir"
                                class="btn btn-success"><i class="bi bi-sd-card-fill"></i>&#32;Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--------- EXCLUIR --------->
    <div class="modal fade bd-example-modal-lg" id="excluirModal" tabindex="-1" role="dialog"
        aria-labelledby="excluirModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Inserir Usuário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="container" style="margin-top: 10px">
                    <form method="post">
                        <div class="col-md-12 form-group mb-4">
                            <label class='control-label' for='inputNormal'></label>
                            <div class="for-group">
                                <input type="text" class="form-control" name="idUsuario" id="idUsuario">
                            </div>
                        </div>
                        <div class="card-footer" style="text-align:right">
                            <button type="submit" formaction="../database/token.php?operacao=excluir"
                                class="btn  btn-success"><i class="bi bi-sd-card-fill"></i>&#32;Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!--------- VERIFICA TOKEN --------->
    <div class="modal fade bd-example-modal-lg" id="testarModal" tabindex="-1" role="dialog"
        aria-labelledby="testarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Verificar Token</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div>
                            <div class="card-body px-lg-4 py-lg-6">
                                <?php
                                if (isset($_GET['mensagem'])) {
                                    ?>
                                <div class="alert alert-dark" role="alert">
                                    <?php echo $_GET['mensagem'] ?>
                                </div>
                                <?php } ?>
                                <?php
                                if (isset($_GET['autenticado'])) {
                                    ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $_GET['autenticado'] ?>
                                </div>
                                <?php } ?>
                                <form role="form" action="verifica_token.php" method="post">
                                    <div class="form-group mb-3">

                                        <div class="input-group input-group-alternative">
                                            <input class="form-control" placeholder="Usuário" type="text" name="user"
                                                autocomplete="off" autofocus="on">
                                        </div>
                                        <div class="input-group input-group-alternative mt-2">
                                            <input class="form-control" placeholder="Token" type="text" name="token"
                                                autocomplete="off" autofocus="on">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary my-4">Verificar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- LOCAL PARA COLOCAR OS JS -->

<?php include_once ROOT . "/vendor/footer_js.php"; ?>

    <script>
          $(document).on('click', 'button[data-target="#excluirModal"]', function () {
            var idUsuario = $(this).attr("data-idUsuario");
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo URLROOT ?>/vendas/database/token.php?operacao=buscar',
                data: {
                    idUsuario: idUsuario
                },
                success: function (data) {
                    $('#idUsuario').val(data.idUsuario);
                    $('#excluirModal').modal('show');
                }
            });
        });


        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('mensagem') || urlParams.has('autenticado')) {
            $('#testarModal').modal('show');
        }
    </script>

<!-- LOCAL PARA COLOCAR OS JS -FIM -->

</body>

</html>