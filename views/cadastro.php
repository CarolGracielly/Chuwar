<html>

    <?php
    $page="Chuwar - Registro";
    include("header.php");
    ?>

    <body>

        <div id="cadastro"><a href="index.php" title="Ja possui cadastro? Faça login no Sistema!">Login &raquo;</a></div>
        <div id="login" class="form bradius" style="top:150px">

            <div class="message bradius" style="<?php echo $display; ?>"> <?php echo $msg;?></div>
            <div class="logo"><a href="<?php echo $home;?>" title="<?php echo $title;?>"> <img src="img/logo.png" alt="logo" title="logotipo" width="200" height="58" /></a></div>
            <div class="acomodar">

                <form action="?acao=cadastrar" method="post">

                    <label for="usuario">Usuário</label> <input id="usuario" type="text" class="txt bradius" name="usuario"/>
                    <label for="nome">Nome</label> <input id="nome" type="text" class="txt bradius" name="nome"/>
                    <label for="senha">Senha</label> <input id="senha" type="password" class="txt bradius" name="senha"/>
                    <input type="submit" class="sb bradius" value="Cadastrar"/>

                </form>

            </div>
        </div>

    </body>

</html>
