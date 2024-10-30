<?php
include("conecta.php");
include('topo.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cpf = $_POST['txtcpf'];
    $nome = $_POST['txtnome'];
    $email = $_POST['txtemail'];
    $cel = $_POST['txtcel'];

    // CONFRIMANDO SE O CLIENTE REALMENTE EXISTE

    $sql = "SELECT COUNT(f_id) FROM tb_freelancer WHERE f_cpf = '$cpf' OR f_nome = '$nome' ";

    //RETORNO DO BANCO 

    $retorno = mysqli_query($link, $sql);
    $contagem = mysqli_fetch_array($retorno)[0];

    // VERIFICANDO SE O CLIENTE EXISTE

    if ($contagem == 0) {
        $sql = "INSERT INTO tb_freelancer(f_cpf, f_nome, f_email, f_cel, f_status) 
        VALUE('$cpf', '$nome', '$email', '$cel', '1')";
        mysqli_query($link, $sql);
        echo "<script>window.alert('FREELANCER CADASTRADO COM SUCESSO');</script>";
        echo "<script>window.location.href='lista-freelancer.php';</script>";
    } else if ($contagem >= 1) {
        echo "<script>window.alert('FREELANCER JÁ EXISTENTE');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>CADASTRO DE FREELANCER</title>
</head>

<body>
    <div class="container-global">
        <form class="formulario" action="cadastro-freelancer.php" method="post">
            <label>CPF</label>
            <input type="text" name="txtcpf" id="cpf" placeholder="000.000.000-00" maxlength="14" oninput="formatarCPF(this)" required>
            <br>

            <label>NOME</label>
            <input type="text" name="txtnome" placeholder="DIGITE SEU NOME" required>
            <br>

            <label>EMAIL</label>
            <input type="email" name="txtemail" placeholder="DIGITE SEU EMAIL" required>
            <br>

            <label>TELEFONE</label>
            <input type="text" name="txtcel" id="telefone" placeholder="(00) 00000-0000" maxlength="15" required>
            <br>
            <br>

            <input type="submit" value="CRIAR FREELANCER">
        </form>
        <script src="scripts/script.js"></script>
    </div>
</body>

</html>