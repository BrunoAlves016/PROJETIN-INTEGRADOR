<?php
include("conecta.php");
// include('topo.php');

if($_SERVER['REQUEST_METHOD'] =='POST'){
    $login = $_POST['txtlogin'];
    $senha = $_POST['txtsenha'];
    $email = $_POST['txtemail'];
    $senha = md5( $senha); //CRIPTOGRAFANDO A SENHA
    //VALIDAR SE O USUÁRIO A CADASTRAR  EXISTE
    $sql = "SELECT COUNT(u_id) FROM tb_usuarios WHERE u_login = '$login'  OR u_email = '$email' ";
    
    // RETORNO DO BANCO
    $retorno = mysqli_query($link,$sql);
    $contagem = mysqli_fetch_array($retorno) [0];

    // VERIFICA SE NATAN EXISTE
    if($contagem == 0){
        $sql = "INSERT INTO tb_usuarios(u_login, u_senha, u_email, u_status)
        VALUES('$login', '$senha', '$email', '1')";
        mysqli_query($link,$sql);
        echo "<script>window.alert('USUÁRIO CADASTRADO COM SUCESSO');</script>";
        echo"<script>window.location.href='login.php';</script>";
    }
    else if($contagem >=1){
        echo "<script>window.alert('USUÁRIO JÁ EXISTENTE');</script>";
    }
}
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>CADASTRO DE USUÁRIO</title>
</head>
<body>
<div class="container-global">
        <form class="formulario" action="cadastro-usuario.php" method="post">
            <label>LOGIN</label>
            <input type="text" name="txtlogin" placeholder="DIGITE SEU LOGIN" required>
            <br>

            <label>SENHA</label>
            <input type="password" name="txtsenha" placeholder="DIGITE SUA SENHA" required>
            <br>

            <label>EMAIL</label>
            <input type="email" name="txtemail" placeholder="DIGITE SEU EMAIL" required>
            <br>
            <br>
            
            <input type="submit" value="CRIAR">
        </form>
    </div>
</body>
</html>