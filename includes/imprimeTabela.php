<p style="text-align: center; font: 400 22px Oswald;">Seus Países</p>
<br>

<!-- Tabela de Países do Joogador -->
<table width="100%" border="0">

        <tr>
            <th>Nome</th>
            <th>Tropas</th>
            <th>Fronteiras</th>
        </tr>

        <?php
          foreach ($Vusuario as $key => $value) {
        ?>

        <tr>
          <td style="text-align: center"><?php echo $value->getNome(); ?></td>
          <td style="text-align: center"><?php echo $value->getTropas(); ?></td>
          <td style="text-align: center">Fronteira 1 fronteira 2 Fronteira 3</td>
        </tr>

        <?php
          }
         ?>

</table>

<br>
<p style="text-align: center; font: 400 22px Oswald;">Países do Computador</p>
<br>

<!-- Tabela da países do computador -->
<table width="100%" border="0">

        <tr>
            <th>Nome</th>
            <th>Tropas</th>
            <th>Fronteiras</th>
        </tr>

        <?php
          foreach ($Vcomputador as $key => $value) {
        ?>

        <tr>
          <td style="text-align: center"><?php echo $value->getNome(); ?></td>
          <td style="text-align: center"><?php echo $value->getTropas(); ?></td>
          <td style="text-align: center">Fronteira 1 fronteira 2 Fronteira 3</td>
        </tr>

        <?php
          }
         ?>

</table>
