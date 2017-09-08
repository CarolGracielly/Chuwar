<p style="text-align: center; font: 400 22px Oswald;"><b>Seus Países</b></p>
<br>

<!-- Tabela de Países do Joogador -->
<table width="100%" border="0">

        <tr>
            <th>País</th>
            <th>Tropas</th>
            <th>Fronteiras</th>
            <th>Atacar</th>
        </tr>

        <?php
          foreach ($Vusuario as $key => $value) {
        ?>

        <tr>
          <td style="text-align: center"><?php echo $value->getNome(); ?></td>
          <td style="text-align: center"><?php echo $value->getTropas(); ?></td>
          <td style="text-align: center"><?php echo $value->getFronteiras(); ?></td>
          <td style="text-align: center">
            <?php

              $front = $value->getFronteiras();
              $listaFronteiras = explode(",", $front);
            
              foreach ($listaFronteiras as $item => $valor){

                foreach ($Vcomputador as $pais => $p) {

                  $nomePais = $p->getNome();

                  //Definindo Id's
                  $idAtacante = $value->getID();
                  $idDefensor = $p->getID();


                  if(strcmp($valor, $nomePais) == 0){
                    
                    //Adicionando Sistemas de Verificação se o seuspaises tem contado com o inimigo
                    echo '<a id="ataque" href="index.php?acao=atacar&amp;idAtacante='.$idAtacante.'&idDefensor='.$idDefensor.'">'.$nomePais.'</a>';


                  }

                }

                
              }

            ?>
          </td>
        </tr>

        <?php
          }
         ?>

</table>

<br>
<p style="text-align: center; font: 400 22px Oswald;"><b>Países do Computador</b></p>
<br>

<!-- Tabela da países do computador -->
<table width="100%" border="0">

        <tr>
            <th>País</th>
            <th>Tropas</th>
            <th>Fronteiras</th>
        </tr>

        <?php
          foreach ($Vcomputador as $key => $value) {
        ?>

        <tr>
          <td style="text-align: center"><?php echo $value->getNome(); ?></td>
          <td style="text-align: center"><?php echo $value->getTropas(); ?></td>
          <td style="text-align: center"><?php echo $value->getFronteiras(); ?></td>
        </tr>

        <?php
          }
         ?>

</table>
