<?php
include_once('../database/token.php');

$user = $_POST['user'];
$token = $_POST['token'];

if ($user === "") {
    $user = null;
}
if ($token === "") {
    $token = null;
}
$usuarios = verificaToken($user, $token);

if (isset($usuarios['senhaCorreta'])) {
    if ($usuarios['senhaCorreta'] == true) {
        header('Location: autenticado.php?idUsuario=' . urlencode($usuarios['idUsuario']));
    } else {
        $mensagem = "Token não cadastrado ou incorreto!";
        header('Location: teste_token.php?mensagem=' . urlencode($mensagem));
    }
} else {
    $mensagem = $usuarios['retorno'];
    header('Location: teste_token.php?mensagem=' . urlencode($mensagem));
}
?>
