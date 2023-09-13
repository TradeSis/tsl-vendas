<?php
// Lucas 08032023 - modificado o action do form para chamar api, linha 67
// helio 26012023 16:16

include_once('../head.php');

?>


<body>

    <div class="container" style="margin-top:200px">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-7">
                <div class="card bg-gray-200 shadow border-1">

                    <div class="card-body px-lg-4 py-lg-6">
                        <?php

                        if (isset($_GET['mensagem'])) {
                            ?>
                            <div class="alert alert-dark" role="alert">
                                <?php echo $_GET['mensagem'] ?>
                            </div>
                            <?php
                        }

                        ?>

                        <form role="form" action="verifica_token.php" method="post">
                            <div class="form-group mb-3">

                                <div class="input-group input-group-alternative">
                                    <input class="form-control" placeholder="Usuário" type="text" name="user"
                                        autocomplete="off" autofocus="on">
                                </div>
                                <div class="input-group input-group-alternative mt-2">
                                    <input class="form-control" placeholder="Token" type="text" name="token"
                                        autocomplete="off" autofocus="on">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">Entrar</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>



</body>

</html>