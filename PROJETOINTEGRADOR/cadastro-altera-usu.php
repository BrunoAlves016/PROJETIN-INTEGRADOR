<?php
include('conecta.php');
// include('topo.php');
//COLETA O VALOR ID DA URL
$id = $_GET['id'];
$sql = "SELECT * FROM tb_usuarios WHERE u_id = '$id'";
$retorno = mysqli_query($link, $sql);

while ($tbl = mysqli_fetch_array($retorno)) {
    $login = $tbl[1];
    $email = $tbl[2];
    $senha = $tbl[3];
    $senha2 = $tbl[3]; //CASO USUARIO NÃO ALTERE A SENHA
    $status = $tbl[4];

}

// BORA FAZER O UPDATE 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $senha = $_POST['txtsenha'];
    $email = $_POST['txtemail'];
    $status = $_POST['status'];
    $senha2 = $_POST['txtsenha2'];

    $sql = "UPDATE tb_usuarios SET u_senha = '$senha', u_email = '$email', u_status = '$status' WHERE u_id = $id";

    mysqli_query($link, $sql);

    echo "<script>window.alert('USUÁRIO ALTERADO COM SUCESSO!');</script>";
    echo "<script>window.location.href='lista-usuario.php';</script>";
    exit();
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>ALTERAÇÃO DE USUÁRIO</title>
</head>

<body>

<div class="container-altera">
        <div class="logo"><a href="inicio.php"><img src="img/perfil.png" width="100px" height="100px"></a></div>
        
        </div>
    <div class="container-global">

        <form class="formulario" action="cadastro-altera-usu.php" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="hidden" name="txtsenha2" value="<?= $senha2 ?>">
            <label>LOGIN</label>
            <input type="text" name="txtlogin" placeholder="DIGITE SEU LOGIN" value="<?= $login ?>" required>
            <br>

            <label>SENHA</label>
            <input type="password" name="txtsenha" placeholder="DIGITE SUA SENHA" value="<?= $senha ?>" required>
            <br>

            <label>EMAIL</label>
            <input type="email" name="txtemail" placeholder="DIGITE SEU EMAIL" value="<?= $email ?>" required>
            <br>
            <!-- SELETOR DE ATIVO E INATIVO -->
            <div class="bullets">
                <input type="radio" name="status" value="1" <?= $status == '1' ? "checked" : "" ?>>ATIVO
                <br>
                <input type="radio" name="status" value="0" <?= $status == '0' ? "checked" : "" ?>>INATIVO
            </div>
            <br>
            <br>
            
            <input type="submit" value="ALTERAR">
        </form>
    </div>
</body>

</html>