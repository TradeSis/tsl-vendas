<?php
// lucas 120320204 id884 bootstrap local - alterado head
// gabriel 300323 11:24

include_once '../head.php';
include_once('../database/consultaprodutodisp.php');

if (isset($_GET['parametros'])) {
    $procod = $_POST['procod'];
    $produto = buscaProduDisp($procod);
}

?>

<!doctype html>
<html lang="pt-BR">
<head>

    <?php include_once ROOT . "/vendor/head_css.php"; ?>

</head>


<body class="bg-transparent">
    <div class="container">
        <div class="card">
            <div class="card-header border-1">
                <h3>Consulta Disponibilidade Produto</h3>
            </div>
            <div class="container">
                <form class="form-inline mt-2 mb-2 ml-2" action="produtodisp.php?parametros" method="POST">
                    <div class="form-group">
                        <input type="number" placeholder="Inserir Cod. do Produto" class="form-control" name="procod">
                        <button type="submit" class="btn btn btn-success ml-2">Buscar Produto</button>
                    </div>
                </form>
            </div>
            <?php
            if (isset($_GET['parametros'])) {
                ?>
                <hr>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <label>Código</label>
                            <input type="text" class="form-control" value="<?php echo $produto['procod'] ?>" readonly>
                            <label>Estoque Filial</label>
                            <input type="text" class="form-control" value="<?php echo $produto['estoqueFilial'] ?>"
                                readonly>
                            <label>Pedidos de compra</label>
                            <input type="text" class="form-control" value="<?php echo $produto['pedCompra'] ?>" readonly>
                        </div>
                        <div class="col">
                            <label>Nome</label>
                            <input type="text" class="form-control" value="<?php echo $produto['pronom'] ?>" readonly>
                            <label>Disponível Dep Seguro</label>
                            <input type="text" class="form-control" value="<?php echo $produto['disponivelDep'] ?>"
                                readonly>
                            <label>Previsão</label>
                            <input type="text" class="form-control" value="<?php echo $produto['previsao'] ?>" readonly>
                        </div>
                    </div>
                </div>
                <hr>
            <?php } ?>

<!-- LOCAL PARA COLOCAR OS JS -->

<?php include_once ROOT . "/vendor/footer_js.php"; ?>

<!-- LOCAL PARA COLOCAR OS JS -FIM -->

</body>

</html>