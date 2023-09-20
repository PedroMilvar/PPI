var tabuleiro;
var aviso;
var jogador;
var lin, col;

function inicia() {
    tabuleiro = new Array(3);
    aviso = document.getElementById('aviso');
    jogador = 1;

    limpaEstilos();

    for (let i = 0; i < 3; i++)
        tabuleiro[i] = new Array(3);

    for (let i = 0; i < 3; i++)
        for (let j = 0; j < 3; j++)
            tabuleiro[i][j] = 0;
    
    exibe();
}

function reiniciar() {
    inicia();
    exibe();
    aviso.innerHTML = 'Vez do jogador: ' + ((jogador) % 2);
}


function exibe() {
    const tabela = document.querySelector('table');

    for (let i = 0; i < 3; i++) {
        for (let j = 0; j < 3; j++){
            const celula = tabela.rows[i].cells[j];

            if (tabuleiro[i][j] == 0)
                celula.textContent = '  __  '
            else if (tabuleiro[i][j] == 1)
                celula.textContent = 'X'
            else
                celula.textContent = 'O'
        }
    }
}

function jogar() {
    const cells = document.querySelectorAll('td');
    aviso.innerHTML = 'Vez do jogador: ' + ((jogador) % 2);

    for (let i = 0; i < cells.length; i++) {
        cells[i].addEventListener('click', function () {
            const row = Math.floor(i / 3);
            const col = i % 3;

            if (tabuleiro[row][col] == 0) {
                if (jogador % 2) {
                    tabuleiro[row][col] = 1;
                    cells[i].classList.add('player-x');
                    cells[i].textContent = 'X';
                 } else {
                    tabuleiro[row][col] = -1;
                    cells[i].classList.add('player-o');
                    cells[i].textContent = 'O';
                 }

                aviso.innerHTML = 'Vez do jogador: ' + ((jogador) % 2 + 1);

                jogador++;
            
                exibe();
                checa();
                atualizaIndicador();

            }
               else {
                aviso.innerHTML = 'Campo ja foi marcado!'
            }
        });
    }
}

function checa() {
    var soma;

    //Linhas
    for (let i = 0; i < 3; i++) {
        soma = 0;
        soma = tabuleiro[i][0] + tabuleiro[i][1] + tabuleiro[i][2];

        if (soma == 3 || soma == -3){
            aviso.innerHTML = "Jogador " + ((jogador) % 2 + 1) + " ganhou! Linha " + (i + 1) + " preenchida!";
        }
    }

    //Colunas
    for (let i = 0; i < 3; i++) {
        soma = 0;
        soma = tabuleiro[0][i] + tabuleiro[1][i] + tabuleiro[2][i];

        if (soma == 3 || soma == -3){
            aviso.innerHTML = "Jogador " + ((jogador) % 2 + 1) + " ganhou! Coluna " + (i + 1) + " preenchida!";
        }
    }

    //Diagonal
    soma = 0;
    soma = tabuleiro[0][0] + tabuleiro[1][1] + tabuleiro[2][2];
    if (soma == 3 || soma == -3) {
        aviso.innerHTML = "Jogador " + ((jogador) % 2 + 1) + " ganhou! Diagonal preenchida!";
    }

    //Diagonal
    soma = 0;
    soma = tabuleiro[0][2] + tabuleiro[1][1] + tabuleiro[2][0];
    if (soma == 3 || soma == -3) {
        aviso.innerHTML = "Jogador " + ((jogador) % 2 + 1) + " ganhou! Diagonal preenchida!";
    }
}

function limpaEstilos() {
    const cells = document.querySelectorAll('td');
    cells.forEach(cell =>  {
        cell.classList.remove('player-x', 'player-o');
    });
}