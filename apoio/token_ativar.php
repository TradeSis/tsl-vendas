<?php

include_once('../head.php');
include_once('../database/token.php');
require_once ROOT . "/vendor/autoload.php";

use PragmaRX\Google2FA\Google2FA;

$idUsuario = $_GET['idUsuario'];
$usuarios = buscaToken($_GET['idUsuario']);


$google2fa = new Google2FA();

$secret = $google2fa->generateSecretKey(); /* gera secret */

$text = $google2fa->getQRCodeUrl(
    $_SERVER["HTTP_HOST"] . URLROOT,
    $idUsuario,
    $secret
);

$image_url = 'https://chart.googleapis.com/chart?cht=qr&chs=300x300&chl=' . $text;

?>

<body>
    <div class="container" style="margin-top:10px">

        <div class="col-sm mt-4" style="text-align:right">
            <a href="token.php" role="button" class="btn btn-primary"><i
                    class="bi bi-arrow-left-square"></i></i>&#32;Voltar</a>
        </div>
        <div class="col-sm">
            <spam class="col titulo">Registre a autenticação em 2 fatores</spam>
        </div>
        <div class="container">
            <form action="../database/token.php?operacao=ativar" method="post">
                <p style="text-align:center">
                    <?php echo '<img src="' . $image_url . '" />'; ?>
                </p>
                <input type="text" class="form-control" name="idUsuario" value="<?php echo $idUsuario ?>" hidden>
                <input type="text" class="form-control" name="secret" value="<?php echo $secret ?>" hidden>
                <hr>
                <div style="text-align:right">
                    <button type="submit" id="botao" class="btn btn-success"><i
                            class="bi bi-sd-card-fill"></i>&#32;Salvar</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>