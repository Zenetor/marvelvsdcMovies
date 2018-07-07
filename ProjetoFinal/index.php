<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Filmes: Treta Infinita</title>
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="icon" href="favicon.ico">
        <link rel="stylesheet" type="text/css" href="style/style.css">
        <?php
        DEFINE("ROOT_PATH", dirname(__FILE__) . "/");
        include ( ROOT_PATH . "/functions/connectionDB.php");
        include ( ROOT_PATH . "/functions/math.php");
        include ( ROOT_PATH . "/functions/insertDB.php");
        ?>
    </head>
    <body>
        <?php
        $estado_do_banco = verify_data();
        ?>
        <video autoplay unmuted loop id="intro_fullscreen">
            <source src ="data/fi01.mp4"type="video/mp4"> 
        </video>
        <div class="content">
            <h1>DC vs MARVEL</h1>
            <p>Análise Estatística acerca dos filmes do MCU e DCEU.</p>
            <?php
            if ($estado_do_banco == 1) {
                echo '<p>BANCO MYSQL JÁ DISPONÍVEL E CARREGADO </p>';
            } else if ($estado_do_banco == 0) {
                echo '<p>BANCO MYSQL CRIADO AGORA E CARREGADO</p>';
            }
            ?>
            <button id ="begin" class="begin_button" onclick="window.location.href = 'analysis.php'">Começar Análise</button>
        </div>
    </body>
</html>