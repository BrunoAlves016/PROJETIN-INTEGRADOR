<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Link do css-->
    <link rel="stylesheet" href="css/estilo.css">
    <!--IMPORTANDO A FONTE-->
    <title>Puzzle Images</title>
</head>

<body>
    <div class="container">
        <div class="logo"><a href="inicio.php"><img src="img/perfil.png" width="100px" height="100px"></a></div>
        <div class="menu">
            <a href="inicio.php">INÍCIO</a>
            <a href="cadastro-usuario.php">CADASTRO USUÁRIO</a>
            <a href="lista-usuario.php">LISTA USUÁRIO</a>
        </div>

        <div class="social">
            <a href="https://www.facebook.com" class="fb"><img src="icons/facebook.png" width="30px" height="30px"></a>
            <a href="https://www.instagram.com" class="ins"><img src="icons/instagram.jpg" width="30px" height="30px"></a>
        </div>
    </div>

    <div class="subtitulo">
        <h1>BEM-VINDOS AO SITE DE PUZZLES IMAGES</h1>
    </div>

    <!-- SEÇÃO DE PUZZLES COM IMAGENS -->
    <div class="container-puzzles">
        <div class="puzzlebox">
            <a href="puzzle-facil.php"><img src="img/puzzleIzi.jpg" alt="Puzzle Fácil" class="puzzle-imagem" height="300px" width="300px"></a>
            <div class="overlay">
                Puzzle Fácil
            </div>
        </div>

        <div class="puzzlebox">
            <a href="puzzle-medio.php"><img src="img/fotoefeitos.com_.jpg" alt="Puzzle Médio" class="puzzle-imagem" height="300px" width="300"></a>
            <div class="overlay">
                Puzzle Médio
            </div>
        </div>

        <div class="puzzlebox">
            <a href="puzzle-dificil.php"><img src="img/hard.jpg" alt="Puzzle Difícil" class="puzzle-imagem" height="300px" width="300"></a>
            <div class="overlay">
                Puzzle Difícil
            </div>
        </div>
    </div>

    <!--IMPORTANDO JAVASCRIPT-->
    <script src="scripts/script.js"></script>
</body>

</html>
