<?php
// gabriel 21072023

include_once('../conexao.php');

function buscaToken($idUsuario = null)
{

        $usuario = array();
        $apiEntrada = array(
                'idUsuario' => $idUsuario
        );
        $usuario = chamaAPI(null, '/vendas/token', json_encode($apiEntrada), 'GET');
        
        // helio 020823 - compatibilidade progress
        if (isset($idUsuario)) { return $usuario["usuarios"][0]; }
         else                 { return $usuario["usuarios"]; }
}
function verificaToken($idUsuario, $vtoken)
{

        $usuario = array();
        $token = array(
                'idUsuario' => $idUsuario,
                'token' => $vtoken
        );
        $apiEntrada = array(
                'token' => array($token)
        );
        $usuario = chamaAPI(null, '/vendas/token/verifica', json_encode($apiEntrada), 'GET');

        if (isset($usuarios['usuario'])) {
                return $usuario["usuario"][0];
        } else {
                return $usuario;
        }
}


if (isset($_GET['operacao'])) {

        $operacao = $_GET['operacao'];

        if ($operacao == "inserir") {
                $apiEntrada = array(
                        'idUsuario' => $_POST['idUsuario']
                );
                $usuario = chamaAPI(null, '/vendas/token', json_encode($apiEntrada), 'PUT');
                header('Location: ../apoio/token.php');
        }

        if ($operacao == "alterar") {
                $apiEntrada = array(
                        'idUsuario' => $_POST['idUsuario']
                );
                $usuario = chamaAPI(null, '/vendas/token', json_encode($apiEntrada), 'POST');
                header('Location: ../apoio/token.php');
        }

        if ($operacao == "excluir") {
                $apiEntrada = array(
                        'idUsuario' => $_POST['idUsuario']
                );
                $usuario = chamaAPI(null, '/vendas/token', json_encode($apiEntrada), 'DELETE');
                header('Location: ../apoio/token.php');
        }
        if ($operacao == "ativar") {
                $apiEntrada = array(
                        'idUsuario' => $_POST['idUsuario'],
                        'secret' => $_POST['secret']
                );
                $usuario = chamaAPI(null, '/vendas/token/ativar', json_encode($apiEntrada), 'POST');

                header('Location: ../apoio/token.php');
        }





}

?>