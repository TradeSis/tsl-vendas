<?php
// gabriel 21072023

include_once('../conexao.php');

function buscaToken($idUsuario=null)
{
	
	$usuario = array();
	$apiEntrada = array(
		'idUsuario' => $idUsuario
	);
	$usuario = chamaAPI(null, '/vendas/token', json_encode($apiEntrada), 'GET');
	return $usuario;
}
function verificaToken($idUsuario=null,$token=null)
{
	
	$usuario = array();
	$apiEntrada = array(
		'idUsuario' => $idUsuario,
		'token' => $token
	);
	$usuario = chamaAPI(null, '/vendas/token/verifica', json_encode($apiEntrada), 'GET');
	return $usuario;
}


if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

	if ($operacao=="inserir") {
		$apiEntrada = array(
			'idUsuario' => $_POST['idUsuario']
		);
		$usuario = chamaAPI(null, '/vendas/token', json_encode($apiEntrada), 'PUT');
        header('Location: ../apoio/token.php');	
	}

	if ($operacao=="alterar") {
		$apiEntrada = array(
			'idUsuario' => $_POST['idUsuario']
		);
		$usuario = chamaAPI(null, '/vendas/token', json_encode($apiEntrada), 'POST');
        header('Location: ../apoio/token.php');	
	}
	
	if ($operacao=="excluir") {
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
