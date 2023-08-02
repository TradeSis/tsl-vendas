<?php
// gabriel 21072023

include_once('../head.php');
include_once('../database/token.php');

$usuarios = buscaToken($_GET['idUsuario']);

?>

<body class="bg-transparent">

    <div class="container" style="margin-top:10px">

        <div class="col-sm mt-4" style="text-align:right">
            <a href="token.php" role="button" class="btn btn-primary"><i
                    class="bi bi-arrow-left-square"></i></i>&#32;Voltar</a>
        </div>
        <div class="col-sm">
            <spam class="col titulo">Alterar Usuario</spam>
        </div>
        <div class="container">
            <form action="../database/token.php?operacao=alterar" method="post">
                <div class="col-md-12 form-group mb-4">
                    <label class='control-label' for='inputNormal'></label>
                    <div class="for-group">
                        <input type="text" class="form-control" name="idUsuario"
                            value="<?php echo $usuarios['idUsuario'] ?>">
                    </div>
                </div>
                <div style="text-align:right">
                    <button type="submit" id="botao" class="btn btn-success"><i
                            class="bi bi-sd-card-fill"></i>&#32;Salvar</button>
                </div>
            </form>
        </div>

    </div>


</body>

</html>