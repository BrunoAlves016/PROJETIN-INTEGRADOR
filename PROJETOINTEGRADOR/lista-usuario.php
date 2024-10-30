<?php
include('conecta.php');
include('topo.php');
// include('header.php');

// CONSULTA USUARIOS CADASTRADOS
$sql = "SELECT u_login, u_email, u_status, u_id FROM tb_usuarios WHERE u_status = '1'";
$retorno = mysqli_query($link, $sql);
$status = '1';

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

    <div class="container-listausuarios">
        <!-- FAZER DEPOIS DO ROLÊ -->
        <form>

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