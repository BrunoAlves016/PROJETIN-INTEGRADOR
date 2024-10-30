<?php
session_start();

include("conecta.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['txtlogin'];
    $senha = $_POST['txtsenha'];
    
    $sqlusuario = "SELECT puzzle FROM tb_usuarios WHERE u_login = '$login' AND u_status = '1'";
    $retornousuario = mysqli_query($link, $sqlusuario);
    $usuario = mysqli_fetch_array($retornousuario)[0];
    $senha = md5($usuario . $senha);
    //COMEÇA VALIDAR BANCO DE DADOS
    $sql = "SELECT COUNT(u_id) FROM tb_usuarios WHERE u_login = '$login' AND u_senha = '$senha' AND u_status = '1' ";

    // RETORNO DO BANCO
    $retorno = mysqli_query($link, $sql);

    $contagem = mysqli_fetch_array($retorno)[0];

    // VERIFICA SE NATAN EXISTE
    if ($contagem == 1) {
        $sql = "SELECT u_id, u_login FROM tb_usuarios WHERE u_login = '$login' AND u_senha = '$senha'";
        $retorno = mysqli_query($link, $sql);
        // RETORNANDO O NOME DO NATHAN + ID DELE
        while ($tbl = mysqli_fetch_array($retorno)) {
            $_SESSION['idusuario'] = $tbl[0];
            $_SESSION['nomeusuario'] = $tbl[1];
        }
        echo "<script>window.location.href='inicio.php';</script>";
    } else {
        echo "<script>window.alert('USUÁRIO OU SENHA INCORRETO');</script>";
    }
}
?>




<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>LOGIN USUÁRIO</title>
</head>

<body>
    <div class="container-global">
        <form class="formulario" action="login.php" method="post">
            <label>LOGIN</label>
            <input type="text" name="txtlogin" placeholder="DIGITE SEU LOGIN" required>
            <br>
            <label>SENHA</label>
            <input type="password" name="txtsenha" placeholder="DIGITE SUA SENHA" required>
            <br>
            <br>
            <input type="submit" value="ACESSAR">
        </form>
    </div>
</body>

</html>