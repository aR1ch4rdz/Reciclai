# ***Reciclai***

## ***Projeto desenvolvido para disciplina de Projeto 1 no IFPE Campus Igarassu***

São os membro do projeto:
- [Alysson José](https://github.com/alynh0)
- [Anthony Richard](https://github.com/aR1ch4rdz)
- [Arley Nunes](https://github.com/Arluzss)
- [Layrton Wassermann](http://www.example.com)
- [Lívia Sabino](https://github.com/liviasab)
- [Manoel Victor](https://github.com/ManoelVOliS)


O projeto foi desenvolvido através da disciplina de Projeto 1 no curso de TSI (Tecnólogo em Sistemas para Internet) no IFPE Campus Igarassu. A demanda para tal projeto partiu do [Professor Alexandre Magno Alves de Oliveira](mailto:alexandre.oliveira@igarassu.ifpe.edu.br) que atua na área de logística no campus.

## ***A solução***

A solução parte da necessidade do Professor em complementar o andamento de seu mestrado. Ele nos propôs a ideia de uma solução para o descarte de pilhas e baterias, mas que tivesse também uma forte conscientização para os usuários da aplicação.

A aplicação consiste em um cadastro de empresas que fazem seu cadastro na plataforma e, após uma análise da administração, poderia criar pontos de coletas, onde seria disposto um local adequado para realizar o armazenamento temporário e após uma certa quantidade e/ou tempo realizar o descarte da maneira adequada. Ainda na aplicação é possível que os cidadãos verifiquem através da localização os pontos de coleta mais próximos e assim realizar o descarte da maneira apropriada.

----------

## ***Como executar?***

Para que a aplicação funcione em sua máquina e ver como tudo está funcionando é necessário que algumas coisas estejam instaladas:
- [NodeJS]([https://](https://nodejs.org/pt-br))
- [PHP]([https://](https://www.php.net/))
- [MySQL Workbench]((https://dev.mysql.com/downloads/workbench/))

Após se certificar de que todos os pré-requisitos estão instalados adequadamente, siga os seguintes passos:

1. Baixar este repositório clicando em `<code>`, Download ZIP e extrair;
2. Abrir um terminal na pasta **PHP** utilizando o comando `php -S localhost:8005`;
3. Abrir outro terminal na pasta ***VUE/Projeto*** e executar o comando `npm install` e `npm run dev`;
4. Acessar o link que será exibido no terminal (normalmente: `localhost:5173`)

Além disso é necessário criar o esquema SQL que estamos utilizando para que a aplicação funcione devidamente. Basta copiar todos os comandos que estão localizados no arquivo de texto em: `PHP\mysql.txt`, abrir o *Workbench*, colar e executar.
