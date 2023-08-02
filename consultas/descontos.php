<?php
// helio 17022023 cria array $descontos inicialmente vazio
// helio 17022023 buscaDescontos estava sen envio do codigoLoja
// helio 17022023 teste direto em $_POST['codigoLoja']
// helio 17022023 retirei teste ($_GET['parametros'])
// gabriel 17022023 15:13

include_once '../head.php';
include_once '../database/descontos.php';


$descontos = array();
if (isset($_POST['codigoLoja'])) {
    $descontos = buscaDescontos($_POST['codigoLoja']);
}

?>

<!DOCTYPE html>
<html lang="pt-BR">




<body class="bg-transparent">

    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-10">
                        <h3 class="col">Consulta desconto por loja</h3>
                    </div>
                    <div class="col-sm" style="text-align:right">
                        <a href="#" onclick="history.back()" role="button" class="btn btn-primary btn-sm">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="table table-responsive">
            <table class="table table-sm table-hover table-bordered">

                <thead class="thead-light">
                    <tr>
                        <th class="text-center">Loja</th>
                        <th class="text-center">Linha</th>
                        <th class="text-center">De</th>
                        <th class="text-center">Até</th>
                        <th class="text-center">Venda</th>
                        <th class="text-center">Desc Utilizado</th>
                        <th class="text-center">Desc Disponível</th>
                        <th class="text-center">Perc Max</th>
                        <th class="text-center">Margem</th>
                        <th class="text-center">Venda c/ Acrescimo</th>
                    </tr>
                </thead>

                <?php
                foreach ($descontos as $desconto) {
                ?>
                    <tr>
                        <td class="text-center"><?php echo $desconto['codigoLoja'] ?></td>
                        <td class="text-center"><?php echo $desconto['linha'] ?></td>
                        <td class="text-center"><?php echo date('d/m/Y', strtotime($desconto['periodoVendaInicial'])) ?></td>
                        <td class="text-center"><?php echo date('d/m/Y', strtotime($desconto['periodoVendaFinal'])) ?></td>
                        <td class="text-center"><?php echo number_format($desconto['totalVenda'], 2, ',', '.') ?></td>
                        <td class="text-center"><?php echo number_format($desconto['valorDescontoUtilizado'], 2, ',', '.') ?></td>
                        <td class="text-center"><?php echo number_format($desconto['valorDescontoDisponivel'], 2, ',', '.') ?></td>
                        <td class="text-center"><?php echo number_format($desconto['percDescontoProdutoMax'], 2, ',', '.') ?>%</td>
                        <td class="text-center"><?php echo number_format($desconto['margem'], 2, ',', '.') ?>%</td>
                        <td class="text-center"><?php echo number_format($desconto['totalVendaComAcrescimo'], 2, ',', '.') ?></td>

                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>


</body>

</html>