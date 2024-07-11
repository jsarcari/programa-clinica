# Software para atendimento em clínicas

Projeto pessoal com objetivo de criar um portfólio para mostrar meus conhecimentos em back-end com PHP e MySQL, e front-end com Bootstrap e JS.

A idéia do projeto surgiu a partir de um trabalho acadêmico durante o curso técnico no SENAI em 2014. Durante o isolamento social por causa do Covid19, busquei mais conhecimento na área de desenvolvimento web através de cursos online. Adquirindo novas habilidades, retomei o projeto acrescentando novas funcionalidades:

* verificar se o paciente é maior de idade, caso não seja, obriga o usuário a inserir informações do responsável (com JS/jQuery)
* imprimir idade do paciente em anos, meses e dias (com JS/jQuery)
* painel de visualização onde mostra as últimas senhas chamadas, mostrando também seus respectivos guichês e a data e hora da última chamada (com CSS, PHP/PDO)
* filtrar buscas nos registros dos pacientes e atendimentos cadastrados através do nome do paciente (com JS/jQuery)
* possibilidade de gerar um PDF como comprovante do atendimento (com PHP/FPDF)
* realização de testes unitários para verificar se o cadastro de atendimentos e pacientes está funcionando corretamente e validar se está atendendo alguns requisitos funcionais, como cadastrar pacientes menor de idade somente com os dados de um responsável (com PHPUnit)
* utilização do Docker e Docker Compose para executar a aplicação em máquinas diferentes com todas as dependências e configurações pré-configuradas nos containers.

## Dependências

* PHP
* MySQL
* Apache 2
* Composer (recomendado para gerenciar as dependências)
* PHPUnit
* Docker (opcional) 

## Configuração do banco de dados
* Criar uma base de dados com o nome *clinica*
* Importar as tabelas através do arquivo *database.sql*
* O usuário e senha estão definidos no arquivo *classes/config.php*, por padrão foi definido usuário *root* e senha *root*, mas poderão ser alterados conforme as configurações do seu banco de dados.

## Acessar a aplicação
Insira no login o usuário *admin* e a senha *123*

## Docker
Com o Docker instalado na máquina, execute no terminal o seguinte comando para baixar todas as imagens utilizadas pelos containers da aplicação:

`docker compose build`

Para (re)criar e rodar os containers da aplicação, execute: 

`docker compose up -d`

Por padrão, foi definido a porta 8080 para a execução do container da aplicação web e 3306 para o container do banco de dados. Portanto, para executar a aplicação localmente, acesse pelo http://localhost:8080/

Para acessar o bash do container da aplicação web, insira no terminal:

`docker exec -it programa-clinica-web bash`

E para acessar o container do banco da aplicação:

`docker exec -it clinica_db bash`