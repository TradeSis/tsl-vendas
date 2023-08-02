<?php
// gabriel 300323 11:24

include_once '../head.php';
include_once('../database/consultaprodutodisp.php');

if (isset($_GET['parametros'])) {
    $procod = $_POST['procod'];
    $produto = buscaProduDisp($procod);
}

?>

<!DOCTYPE html>
<html lang="pt-BR">


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


</body>

</html>