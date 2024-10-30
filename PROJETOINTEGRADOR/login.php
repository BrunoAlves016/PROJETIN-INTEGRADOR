<?php
session_start();
include("conecta.php");
// include("topo.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Previne SQL Injection usando mysqli_real_escape_string
    $login = mysqli_real_escape_string($link, $_POST['txtlogin']);
    $senha = $_POST['txtsenha'];

    // Verifica se o login existe e obtém o "puzzle" do banco de dados para verificar senha
    $sqlusuario = "SELECT u_login FROM tb_usuarios WHERE u_login = '$login' AND u_status = '1'";
    $retornousuario = mysqli_query($link, $sqlusuario);
    
    // Confirma se o usuário foi encontrado
    if (mysqli_num_rows($retornousuario) > 0) {
        $usuario = mysqli_fetch_array($retornousuario)[0];
        $senha = md5( $senha); // Cria o hash da senha concatenado ao "puzzle"

        // Consulta para verificar o login e a senha criptografada
        $sql = "SELECT u_id, u_login FROM tb_usuarios WHERE u_login = '$login' AND u_senha = '$senha' AND u_status = '1'";
        $retorno = mysqli_query($link, $sql);
        
        // Verifica se há um usuário correspondente
        if (mysqli_num_rows($retorno) === 1) {
            // Armazena as informações de sessão do usuário
            $tbl = mysqli_fetch_array($retorno);
            $_SESSION['idusuario'] = $tbl['u_id'];
            $_SESSION['nomeusuario'] = $tbl['u_login'];
            echo "<script>window.location.href='inicio.php';</script>";
        } else {
            echo "<script>window.alert('USUÁRIO OU SENHA INCORRETO');</script>";
        }
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
