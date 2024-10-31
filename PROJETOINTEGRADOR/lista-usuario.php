<?php
include('conecta.php');
// include('topo.php');
// include('header.php');

// CONSULTA USUARIOS CADASTRADOS
$sql = "SELECT u_login, u_email, u_status, u_id FROM tb_usuarios WHERE u_status = '1'";
$retorno = mysqli_query($link, $sql);
$status = '1';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $status = $_POST['status'];

    if ($status == 1) {
        $sql = "SELECT u_login, u_email, u_status, u_id FROM tb_usuarios WHERE u_status = '1'";;
        $retorno = mysqli_query($link, $sql);
    } else {
        $sql = "SELECT u_login, u_email, u_status, u_id FROM tb_usuarios WHERE u_status = '0'";;
        $retorno = mysqli_query($link, $sql);
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>LISTA DE USUARIOS</title>
</head>

<body>
<div class="container-altera">
        <div class="logo"><a href="inicio.php"><img src="img/perfil.png" width="100px" height="100px"></a></div>
        
        </div>
    <div class="container-listausuarios">
        <!-- FAZER DEPOIS DO ROLÊ -->
        <form action="lista-usuario.php" method="post">
            <input type="radio" name="status" value="1" required onclick="submit()" <?= $status == '1' ? "checked" : "" ?>>ATIVOS
            <br>
            <input type="radio" name="status" value="0" required onclick="submit()" <?= $status == '0' ? "checked" : "" ?>>INATIVOS
            <br>
        </form>
        <!-- LISTAR A TABELA DE USUARIOS -->
        <table class="lista">
            <tr>
                <th>LOGIN</th>
                <th>EMAIL</th>
                <th>STATUS</th>
                <th>ALTERAR</th>
            </tr>

            <!-- O CHORO É LIVRE! CHOLA MAIS -->
            <!-- BUSCAR NO BANCO OS DADOS DE TODOS OS USUARIOS -->
            <?php
            while ($tbl = mysqli_fetch_array($retorno)) {

            ?>
                <tr>
                    <td><?= $tbl[0] ?></td> <!-- COLETA O NOME DO USUARIO-->
                    <td><?= $tbl[1] ?></td> <!-- COLETA O EMAIL DO USUARIO-->
                    <td><?= $tbl[2] ?></td> <!-- COLETA O STATUS DO USUARIO-->
                    <td><a href="cadastro-altera-usu.php?id=<?= $tbl[3] ?>">
                            <input type="button" value="ALTERAR">
                        </a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>

    </div>
</body>

</html>