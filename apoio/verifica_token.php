<?php

include_once('../database/token.php');

$user = $_POST['user'];
$token = $_POST['token'];
if ($token == "") {
    $token = null;
}
$usuarios = verificaToken($user, $token);

if ($user == $usuarios['idUsuario']) {
    if ($usuarios['secret'] === null) {
        $mensagem = "token não cadastrado!";
        header('Location: teste_token.php?mensagem=' . urlencode($mensagem));
    } else {
        if ($usuarios['senhaCorreta'] == false) {
            $mensagem = "token incorreto!";
            header('Location: teste_token.php?mensagem=' . urlencode($mensagem));
        } else {
            header('Location: autenticado.php?idUsuario=' . urlencode($usuarios['idUsuario']));
        }
    }
} else {
    $mensagem = "usuário não cadastrado/incorreto!";
    header('Location: teste_token.php?mensagem=' . urlencode($mensagem));
}
