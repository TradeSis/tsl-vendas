<?php
include_once __DIR__ . "/../config.php";
include_once "header.php";
include_once ROOT . "/sistema/database/loginAplicativo.php";

$nivelMenuLogin = buscaLoginAplicativo($_SESSION['idLogin'], 'Vendas');

$nivelMenu = $nivelMenuLogin['nivelMenu'];
?>
<!doctype html>
<html lang="pt-BR">

<head>

    <?php include_once ROOT . "/vendor/head_css.php"; ?>
    <title>Sistema</title>

</head>

<body>
    <?php include_once  ROOT . "/sistema/painelmobile.php"; ?>

    <div class="d-flex">

        <?php include_once  ROOT . "/sistema/painel.php"; ?>

        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-10 d-none d-md-none d-lg-block pr-0 pl-0 ts-bgAplicativos">
                    <ul class="nav a" id="myTabs">


                        <?php
                        $tab = '';

                        if (isset($_GET['tab'])) {
                            $tab = $_GET['tab'];
                        }
                        ?>
                        <?php if ($nivelMenu >= 2) {
                            if ($tab == '') {
                                $tab = 'desconto';
                            } ?>
                            <li class="nav-item mr-1">
                                <a class="nav-link 
                                <?php if ($tab == "desconto") {echo " active ";} ?>" 
                                href="?tab=desconto" role="tab">Descontos</a>
                            </li>
                        <?php }
                        if ($nivelMenu >= 2) { ?>
                            <li class="nav-item mr-1">
                                <a class="nav-link <?php if ($tab == "bonusclien") {echo " active ";} ?>"
                                href="?tab=bonusclien" role="tab">Bonus Cliente</a>
                            </li>
                        <?php }
                        if ($nivelMenu >= 2) { ?>
                            <li class="nav-item mr-1">
                                <a class="nav-link <?php if ($tab == "prevenda") {echo " active ";} ?>" 
                                href="?tab=prevenda" role="tab">Pré-Venda</a>
                            </li>
                        <?php }
                        if ($nivelMenu >= 2) { ?>
                            <li class="nav-item mr-1">
                                <a class="nav-link <?php if ($tab == "produtodisp") {echo " active ";} ?>" 
                                href="?tab=produtodisp" role="tab">Produto Disponível</a>
                            </li>
                        <?php }
                        if ($nivelMenu >= 2) { ?>
                            <li class="nav-item mr-1">
                                <a class="nav-link <?php if ($tab == "cupomcashback") {echo " active ";} ?>" 
                                href="?tab=cupomcashback" role="tab">Cupom Cashback</a>
                            </li>
                        <?php }
                        if ($nivelMenu >= 4) { ?>
                            <li class="nav-item mr-1">
                                <a class="nav-link <?php if ($tab == "apoio") {echo " active ";} ?>" 
                                href="?tab=apoio" role="tab" data-toggle="tooltip" data-placement="top" title="Apoio"><i class="bi bi-gear"></i> Apoio</a>
                            </li>
                        <?php }?>
                    </ul>

                </div>
                <!--Essa coluna s� vai aparecer em dispositivo mobile-->
                <div class="col-7 col-md-9 d-md-block d-lg-none ts-bgAplicativos">
                    <!--atraves do GET testa o valor para selecionar um option no select-->
                    <?php if (isset($_GET['tab'])) {
                        $getTab = $_GET['tab'];
                    } else {
                        $getTab = '';
                    } ?>
                    <select class="form-select mt-2 ts-selectSubMenuAplicativos" id="subtabVendas">
                        <option value="<?php echo URLROOT ?>/vendas/?tab=desconto" 
                        <?php if ($getTab == "desconto") {echo " selected ";} ?>>Descontos</option>

                        <option value="<?php echo URLROOT ?>/vendas/?tab=bonusclien" 
                        <?php if ($getTab == "bonusclien") {echo " selected ";} ?>>Bonus Cliente</option>

                        <option value="<?php echo URLROOT ?>/vendas/?tab=prevenda" 
                        <?php if ($getTab == "prevenda") {echo " selected ";} ?>>Pré-Venda</option>

                        <option value="<?php echo URLROOT ?>/vendas/?tab=produtodisp" 
                        <?php if ($getTab == "produtodisp") {echo " selected ";} ?>>Produto Disponível</option>

                        <option value="<?php echo URLROOT ?>/vendas/?tab=cupomcashback" 
                        <?php if ($getTab == "cupomcashback") {echo " selected ";} ?>>Cupom Cashback</option>

                        <option value="<?php echo URLROOT ?>/vendas/?tab=apoio" 
                        <?php if ($getTab == "apoio") {echo " selected ";} ?>>Apoio</option>
                    </select>
                </div>

                <?php include_once  ROOT . "/sistema/novoperfil.php"; ?>

            </div>



            <?php
            $src = "";

            if ($tab == "desconto") {
                $src = "consultas/desconto_parametros.php";
            }
            if ($tab == "bonusclien") {
                $src = "consultas/bonusclien.php";
            }
            if ($tab == "prevenda") {
                $src = "prevenda/prevenda.php";
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
                //echo URLROOT ."/cadastros/". $src;
            ?>
                <div class="container-fluid p-0 m-0">
                    <iframe class="row p-0 m-0 ts-iframe" src="<?php echo URLROOT ?>/vendas/<?php echo $src ?>"></iframe>
                </div>
            <?php
            }
            ?>
        </div><!-- div container -->
    </div><!-- div class="d-flex" -->

    <!-- LOCAL PARA COLOCAR OS JS -->

    <?php include_once ROOT . "/vendor/footer_js.php"; ?>

    <script src="<?php echo URLROOT ?>/sistema/js/mobileSelectTabs.js"></script>

    <!-- LOCAL PARA COLOCAR OS JS -FIM -->

</body>

</html>