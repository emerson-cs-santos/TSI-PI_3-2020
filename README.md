# E-commerce de Jogos
Site tem 2 partes:

## Loja
Shopping para usuário criar seu carrinho de compras e fazer pedidos.

## Dashboard
Gerenciamento do site, incluir produtos, categorias etc.

## Site está online
[Loja](http://gameshopp.herokuapp.com/)

## Acesso ao site

### Criar usuário
Você pode se cadastrar e ter seu próprio usuário.

### Acesso Admin
Usando a opção de se registrar vai criar um usuário padrão, sem acesso ao dashboard,
mas você pode usar esse usuário abaixo (inclusive para alterar o acesso do seu usuário).

Usuário padrão com acesso ao dashboard:

#### Usuário
admin@ibest.com

#### Senha
12345678

## Desenvolvido utilizando Laravel
E-Commerce feito utilizando Laravel 7.0.
[Documentação](https://laravel.com/docs)

## Instalação Local
Os comandos abaixo devem ser executados no terminal, estando na pasta do projeto.

Observação: Essa configuração deve ser feita de acordo com o seu sistema operacional.

### 1 - PHP
Versão minima 7. 
Recomendo instalar o apache, pois já vem com o mysql, que é a configuração já feita do projeto (Esse site Funciona com vários bancos de dados).
[Apache](https://www.apachefriends.org/pt_br/index.html)

### 2 - Variáveis de sistema:
É preciso que o sistema operacional reconheça os comandos abaixo para continuar a instalação e depois executar o projeto.

Observação: Essa configuração deve ser feita de acordo com o seu sistema operacional.

#### 2.1 - php
Linguagem utilizada para desenvolver o site.

#### 2.2 - composer
Gerenciador de dependências do laravel.
Instalação [Composer](https://getcomposer.org/download/)

#### 2.3 - git
Controlador de versões.
Instalação [Git](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git)

### 3 - Git
Baixar fontes: 
```bash
git clone https://github.com/emerson-cs-santos/TSI-PI_3-2020.git <caminho_seu_pc>
```

### 4 - NPM
Exectar na pasta do projeto: 
```bash
npm install
```

### 5 - Banco

#### 5.1 - Configuração
Alterar arquivo .env:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3307
DB_DATABASE=gamershop
DB_USERNAME=root
DB_PASSWORD=
```

Se estiver usando mysql no apache, basta mudar a porta para 3307 no próprio apache.


#### 5.2 - Migrate
Na pasta do projeto rodar: 
```bash
php artisan migrate
```

#### 5.3 - Seeder
Para criar registros e usuário padrão, rodar: 
```bash
php artisan db:seed
```

### 6 - Executar projeto
Rodar: 
```bash
php artisan serve.
```

Abrir no navegador o endereço que for mostrado.

## TSI-PI_3-2020
PI 3 (Projeto Integrador 3 ) E-Commerce  - SENAC 2020
Sistemas para internet.
