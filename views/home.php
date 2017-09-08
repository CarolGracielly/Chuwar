<html>

    <?php
    $page="Chuwar - The Game";
    include("header.php");
    ?>

    <body>

        <div id="cadastro"><a href="index.php?acao=logout" title="Faça logout no Sistema!">Logout &raquo;</a></div>
        <div id="login" class="form bradius" style="top:50px; width: 80%;">

            <div class="message bradius" style="<?php echo $display; ?> width: 90%;"> <?php echo $msg;?> </div>
            <div class="logo"><a href="<?php echo $home;?>" title="<?php echo $title;?>"> <img src="img/logo.png" alt="logo" title="logotipo" width="200" height="58" /></a></div>
            <div class="acomodar" style="width: 100%; text-align: center; font: 400 24px Oswald;">
              <?php

                //Carrega ou Inicia um novo Jogo
                include("includes/carregaJogo.php");

               ?>
            </div>

            <?php

              //Imprime a Tabela de países para o usuário
              include("includes/imprimeTabela.php");
              
             ?>

        </div>

    </body>

</html>
