<?php
include("conecta.php");
include('topo.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cpf = $_POST['txtcpf'];
    $nome = $_POST['txtnome'];
    $email = $_POST['txtemail'];
    $cel = $_POST['txtcel'];

    // CONFRIMANDO SE O CLIENTE REALMENTE EXISTE

    $sql = "SELECT COUNT(c_id) FROM tb_clientes WHERE c_cpf = '$cpf' OR c_nome = '$nome' ";

    //RETORNO DO BANCO 

    $retorno = mysqli_query($link, $sql);
    $contagem = mysqli_fetch_array($retorno)[0];

    // VERIFICANDO SE O CLIENTE EXISTE

    if ($contagem == 0) {
        $sql = "INSERT INTO tb_clientes(c_cpf, c_nome, c_email, c_cel, c_status) 
        VALUE('$cpf', '$nome', '$email', '$cel', '1')";
        mysqli_query($link, $sql);
        echo "<script>window.alert('CLIENTE CADASTRADO COM SUCESSO');</script>";
        echo "<script>window.location.href='lista-cliente.php';</script>";
    } else if ($contagem >= 1) {
        echo "<script>window.alert('CLIENTE JÁ EXISTENTE');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>CADASTRO DE CLIENTE</title>
</head>

<body>
    <div class="container-global">
        <form class="formulario" action="cadastro-cliente.php" method="post">
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

            <input type="submit" value="CRIAR CLIENTE">
        </form>
        <script src="scripts/script.js"></script>
    </div>
</body>

</html>