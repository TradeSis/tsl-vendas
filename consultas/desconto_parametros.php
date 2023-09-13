<?php
// helio 17022023 (L 22) retirei do form os campos data inicial e final
// helio 17022023 (L 22) retirei do form action o parametro parametros
// gabriel 17022023 15:13

include_once '../head.php';


?>
<!DOCTYPE html>
<html lang="pt-BR">


<body class="bg-transparent">

    <div class="container mt-3" style="width:500px">
        <div class="card">
            <div class="card-header border-1">
                <h3>Parametros Descontos</h3>
            </div>

            <div class="container">
                <form action="descontos.php" method="POST">
                    <div class="form-group">
                        <label>Filial</label>
                        <input type="number" class="form-control" name="codigoLoja">
                    </div>
                    <div class="card-footer bg-transparent" style="text-align:right">
                        <button type="submit" class="btn btn-sm btn-success">Consultar Descontos</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>