<?php
// gabriel 290323 14:44

include_once '../head.php';


?>
<!DOCTYPE html>
<html lang="pt-BR">


<body class="bg-transparent">

    <div class="container mt-3" style="width:500px">
        <div class="card">
            <div class="card-header border-1">
                <h3>Consulta cupom cashback</h3>
            </div>

            <div class="container">
                <form action="cupomcashback.php?parametros" method="POST">
                    <div class="form-group">
                        <label>Código Cliente</label>
                        <input type="number" class="form-control" name="codigoCliente">
                        <label>CPF/CNPJ</label>
                        <input type="number" class="form-control" name="cpfCNPJ">
                        <label>Situação</label>
                        <select class="form-control" name="situacao">
                            <option value="ABERTOS">Abertos</option>
                            <option value="">Todos</option>
                        </select>
                    </div>
                    <div class="card-footer bg-transparent" style="text-align:right">
                        <button type="submit" class="btn btn-sm btn-success">Consultar Histórico</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>