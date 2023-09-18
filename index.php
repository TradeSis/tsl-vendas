<!DOCTYPE html>
<head>
        <title>Cadastros</title>
</head>
<html>

<?php
include_once __DIR__ . "/../config.php";
include_once ROOT . "/sistema/painel.php";
include_once ROOT . "/sistema/database/loginAplicativo.php";

$nivelMenuLogin = buscaLoginAplicativo($_SESSION['idLogin'], 'Vendas');

$nivelMenu = $nivelMenuLogin['nivelMenu'];



?>


<div class="container-fluid mt-1">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <ul class="nav a" id="myTabs">


                <?php
                $tab = '';

                if (isset($_GET['tab'])) {
                    $tab = $_GET['tab'];
                }

                if ($tab == '') {
                    $tab = 'desconto';
                }
                ?>


                <?php if ($nivelMenu == 5) { // SOMENTE TRADESIS, POIS ESTA EM DEV ?>
                    <li class="nav-item mr-1">
                        <a class="nav-link1 nav-link <?php if ($tab == "prevenda") {
                            echo " active ";
                        } ?>" href="?tab=prevenda"
                            role="tab">Pré-Venda</a>
                    </li>
                <?php // SOMENTE TRADESIS, POIS ESTA EM DEV }
                if ($nivelMenu == 5) { ?>
                    <li class="nav-item mr-1">
                        <a class="nav-link1 nav-link <?php if ($tab == "bonusclien") {
                            echo " active ";
                        } ?>" href="?tab=bonusclien"
                            role="tab">Bonus Cliente</a>
                    </li>
                    <?php }
                if ($nivelMenu >= 1) { ?>
                    <li class="nav-item mr-1">
                        <a class="nav-link1 nav-link <?php if ($tab == "desconto") {
                            echo " active ";
                        } ?>" href="?tab=desconto"
                            role="tab">Descontos</a>
                    </li>
                <?php  }
                if ($nivelMenu == 5) { // SOMENTE TRADESIS, POIS ESTA EM DEV ?>
                    <li class="nav-item mr-1">
                        <a class="nav-link1 nav-link <?php if ($tab == "produtodisp") {
                            echo " active ";
                        } ?>" href="?tab=produtodisp"
                            role="tab">Produto Disponível</a>
                    </li>
                    <?php  } 
                 if ($nivelMenu == 5) { // SOMENTE TRADESIS, POIS ESTA EM DEV ?>
                    <li class="nav-item mr-1">
                        <a class="nav-link1 nav-link <?php if ($tab == "cupomcashback") {
                            echo " active ";
                        } ?>" href="?tab=cupomcashback"
                            role="tab">Cupom Cashback</a>
                    </li>
                    <?php  }
                if ($nivelMenu >= 4) { ?>
                    <li class="nav-item mr-1">
                        <a class="nav-link1 nav-link <?php if ($tab == "apoio") {
                            echo " active ";
                        } ?>"
                            href="?tab=apoio" role="tab" data-toggle="tooltip" data-placement="top"
                            title="Token">Apoio</a>
                    </li>
                <?php } ?>
            </ul>

        </div>

    </div>

</div>

<?php
$src = "";

if ($tab == "prevenda") {
    $src = "prevenda/prevenda.php";
}
if ($tab == "bonusclien") {
    $src = "consultas/bonusclien.php";
}
if ($tab == "desconto") {
    $src = "consultas/desconto_parametros.php";
}
if ($tab == "produtodisp") {
    $src = "consultas/produtodisp.php";
}
if ($tab == "cupomcashback") {
    $src = "consultas/cupomcashback_parametros.php";
}
if ($tab == "apoio") {
    $src = "apoio/";
    if (isset($_GET['stab'])) {
        $src = $src . "?stab=" . $_GET['stab'];
    }
}

if ($src !== "") {
    //echo URLROOT ."/vendas/". $src;
    ?>
    <div class="diviFrame">
        <iframe class="iFrame container-fluid " id="iFrameTab"
            src="<?php echo URLROOT ?>/vendas/<?php echo $src ?>"></iframe>
    </div>
    <?php
}
?>

</body>

</html>