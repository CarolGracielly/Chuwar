# Chuwar
Versão em php do classico jogo war

## Desenvolvedor
* **Gabriel Mazurco Ribeiro**

## Objetivo
Desafio do processo seletivo da empresa Chuva Inc.

## Metodologia
* **PoG** 

## Requisitos
Requisitos funcionais do Projeto.

**Completo**

* O usuário digita seu nome de usuário para entrar no sistema. Não é necessário senha (se quiser implementar, pode) - ok

* O sistema checa se existe uma partida em aberto para o usuário. Se sim, vai para a tela de partida; se não, cria uma partida e vai para a tela da partida.

* Existem dois jogadores: o computador e o usuário.

* No início de uma partida, os países disponíveis são divididos aleatoriamente entre os jogadores. Cada país recebe 3 exércitos.

* Na tela de partida, o usuário deve ver uma tabela com uma lista dos países, o dono do país (ele ou o computador) e o número de exércitos no país.

* Na tela de partida, o usuário deve poder selecionar um ataque, sempre com um país de origem (seu) e um país de destino (do computador). A decisão de como será a interface de seleção do ataque fica por sua conta. Deve ser levado em consideração que o país de origem do ataque deve ter fronteira com o país de destino.

* A apuração do resultados dos ataques deve se dar da seguinte maneira: para cada exército do país de origem é rodado um número aleatório de 0 a 10. Se o número for maior que cinco, o atacante ganha e destrói um exército do inimigo. Caso todos os exércitos inimigos sejam destruídos, o país é ocupado com 1 exército.

* A cada jogada, cada jogador recebe 6 exércitos, distribuídos aleatoriamente pelo mapa.

* Ao submeter o formulário, o ataque é processado. Por questão de simplicidade, a rodada é encerrada após a apuração desse ataque e, no mesmo request, o computador faz sua jogada.

* Logo em seguida, estamos em uma nova rodada. É exibido para o usuário a mesma tela da partida, com os resultados dos ataques e a tela atualizada para ele poder fazer nova jogada.

* O computador vai sempre fazer o ataque em que tenha a maior vantagem em número de exércitos do país de origem sobre o país de destino. Por exemplo, se ele tiver a possibilidade de atacar de um país de 10 sobre um país com 5 exércitos, versus a possibilidade de atacar de um país de 8 sobre um de 1, ele vai escolher a segunda opção.

* O jogo se encerra quando um dos jogadores tiver sido destruído.

## Licença
Esse projeto esta protegido pela licença MIT - veja [LICENSE](LICENSE) para mais detalhes.

