<html>

    <?php
    $page="Chuwar - Login";
    include("header.php");
    ?>

    <body>

        <div id="cadastro"><a href="cadastro.php" title="Registre-se e venha fazer parte de nossa equipe!">Registre-Se &raquo;</a></div>
        <div id="login" class="form bradius">

            <div class="message bradius" style="<?php echo $display; ?>"> <?php echo $msg;?> </div>
            <div class="logo"><a href="<?php echo $home;?>" title="<?php echo $title;?>"> <img src="img/logo.png" alt="logo" title="logotipo" width="200" height="58" /></a></div>
            <div class="acomodar">

                <form action="?acao=logar" method="post">

                    <label for="usuario">Usuário</label> <input id="usuario" type="text" class="txt bradius" name="usuario" value=""/>
                    <label for="senha">Senha</label> <input id="senha" type="password" class="txt bradius" name="senha" value=""/>
                    <input type="submit" class="sb bradius" value="Entrar"/>

                </form>

            </div>
        </div>

    </body>

</html>
