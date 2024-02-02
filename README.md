# 🚀 B2FLY-API

> Teste pratico

## Instalação

1- Clone o repositório

```sh
git clone https://github.com/edvaldotorres/b2fly-api.git
```

2- Acesse a pasta do projeto

```sh
cd b2fly-api
```

3- Execute o script para instalar as dependências com docker

```sh
sh script-start-docker-compose.sh
```

Obs: Isso pode demorar um pouco, pois o docker irá baixar as imagens necessárias para rodar o projeto.

4- Instale as dependências do projeto

```sh
docker-compose exec php composer install
```

```sh
docker-compose exec php php artisan key:generate
```

5- Rodar as migrações

```sh
docker-compose exec php php artisan migrate
```

6- Rodar seeders

```sh
docker-compose exec php php artisan db:seed
```

## Testes

```sh
docker-compose exec php php artisan test
```

## Documentação

A documentação da API pode ser acessada e importada no insomnia através do link abaixo:

[![Run in Insomnia}](https://insomnia.rest/images/run.svg)](https://insomnia.rest/run/?label=B2FLY-API&uri=https%3A%2F%2Fraw.githubusercontent.com%2Fedvaldotorres%2Fb2fly-api%2Fmain%2Finsomnia.json)

## Questões de Conhecimento Geral:

1.  **Explique a arquitetura MVC (Model-View-Controller) e como o Laravel implementa esse padrão**

    - O padrão de arquitetura MVC (Model-View-Controller) é um padrão de projeto de software que separa a aplicação em três camadas: Model, View e Controller.
    - Model: Responsável por representar a estrutura de dados da aplicação, ou seja, é a camada que representa a lógica de negócio da aplicação.
    - View: Responsável por apresentar os dados ao usuário, ou seja, é a camada que representa a interface gráfica da aplicação.
    - Controller: Responsável por intermediar a comunicação entre a camada Model e a camada View, ou seja, é a camada que representa a lógica de controle da aplicação.
    - O Laravel implementa esse padrão de arquitetura MVC através de diretórios específicos para cada camada, ou seja, o diretório `app/Models` para a camada Model, o diretório `resources/views` para a camada View e o diretório `app/Http/Controllers` para a camada Controller.

2.  **Descreva as principais características e vantagens do Eloquent ORM no Laravel.**

    - O Eloquent ORM é um ORM (Object-Relational Mapping) que permite a manipulação de dados de um banco de dados relacional através de objetos.
      - Principais características:
        - Mapeamento de objetos: Permite a representação de tabelas do banco de dados como classes e registros como objetos.
        - Relacionamentos: Permite a definição de relacionamentos entre tabelas do banco de dados através de métodos.
        - Consultas: Permite a realização de consultas no banco de dados através de métodos.
        - Inserção, atualização e exclusão: Permite a realização de operações de inserção, atualização e exclusão no banco de dados através de métodos.
      - Vantagens:
        - Facilidade de uso: Permite a manipulação de dados de um banco de dados relacional através de objetos, o que facilita a escrita e a leitura do código.
        - Produtividade: Permite a realização de operações de banco de dados de forma mais rápida e eficiente, o que aumenta a produtividade do desenvolvedor.
        - Segurança: Permite a realização de operações de banco de dados de forma segura, o que evita a ocorrência de falhas de segurança.

3.  **Como o Laravel trata as migrações de banco de dados e por que são importantes?**

    - O Laravel trata as migrações de banco de dados através de arquivos de migração, que são arquivos PHP que contêm instruções para a criação, alteração e exclusão de tabelas do banco de dados.
    - As migrações de banco de dados são importantes porque permitem a realização de operações de banco de dados de forma controlada e versionada, ou seja, permitem a criação, alteração e exclusão de tabelas do banco de dados de forma segura e rastreável.
