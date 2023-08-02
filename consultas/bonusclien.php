<?php
// gabriel 300323 11:24

include_once '../head.php';
include_once('../database/consultabonuscliente.php');

$codigoCliente = null;
$cliente = null;
$bonus = null;
if (isset($_GET['parametros'])) {
    $codigoCliente = $_POST['codigoCliente'];
    $bonus = buscaBonusCliente($codigoCliente);
    $cliente = $bonus["cliente"][0];
    $bonus = $bonus["bonus"][0];
}

?>

<!DOCTYPE html>
<html lang="pt-BR">


<body class="bg-transparent">
    <div class="container">
        <div class="card">
            <div class="card-header border-1">
                <h3>Consulta Bonus do Cliente</h3>
            </div>
            <div class="container">
                <form class="form-inline mt-2 mb-2 ml-2" action="bonusclien.php?parametros" method="POST">
                    <div class="form-group">
                        <input type="number" placeholder="Inserir Cod. do Cliente" class="form-control" name="codigoCliente">
                        <button type="submit" class="btn btn btn-success ml-2">Buscar Produto</button>
                    </div>
                </form>
            </div>
            <?php
            if (isset($_GET['parametros'])) {
            ?>
            <hr>
            <div class="container mb-3">
                <div class="row">
                    <div class="col">
                        <label>Código</label>
                        <input type="text" class="form-control" value="<?php echo $cliente['codigoCliente'] ?>"
                            readonly>
                        <label>CPF/CNPJ</label>
                        <input type="text" class="form-control" value="<?php echo $cliente['cpfCNPJ'] ?>" readonly>
                        <label>Bonus Utilizado</label>
                        <input type="text" class="form-control" value="<?php echo number_format($bonus['bonusUtil'], 2, ',', '.') ?>" readonly>
                    </div>
                    <div class="col">
                        <label>Nome</label>
                        <input type="text" class="form-control" value="<?php echo $cliente['nomeCliente'] ?>" readonly>
                        <label>Aniversario</label>
                        <input type="text" class="form-control" value="<?php echo $bonus['aniversario'] ?>" readonly>
                        <label>Bonus Disponível</label>
                        <input type="text" class="form-control" value="<?php echo number_format($bonus['bonusDisp'], 2, ',', '.') ?>" readonly>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

</body>

</html>