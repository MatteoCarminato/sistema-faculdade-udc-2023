# Gamification - Hubbie

Sistema de Gamificação no turismo.

## 🚀 Começando

Essas instruções permitirão que você obtenha uma cópia do projeto em operação na sua máquina local para fins de desenvolvimento e teste.

### 📋 Pré-requisitos

De que coisas você precisa para instalar o software e como instalá-lo?

* PHP 8.1
* Docker & Docker Compose
* Node ^18
* Compose 2

#### Extensões
**Extensões necessaria do PHP 8.1**: 
    Rode o comando para instalar todas as extensões necessarias.

    sudo apt-get install -y php8.1-cli php8.1-common php8.1-mysql php8.1-zip php8.1-gd php8.1-mbstring php8.1-curl php8.1-xml php8.1-bcmath, php8.1-pgsql php8.1-sqlite3

    sudo apt install php-imagick

### 🔧 Instalação

Siga o passo-a-passo para rodar o projeto em seu ambiente de desenvolvimento em execução.

**Clone o repositório**:

```
git clone git@github.com:MatteoCarminato/gamification-tour.git
```

**Acesse a pasta do repositório e rode o comando para instalar o Laravel**:

```
composer install
```

**Instale o Vite**:

```
npm install && npm run dev
```

**Crie o arquivo .env, digite no terminal**:

```
cp .env-local .env
```

**Suba o container do Postgresql**:

```
docker-compose up -d
```

**Rode a migration para criar as tabela do banco**:

```
php artisan migrate
```

**Rode o seeds para popular o banco**:

```
 php artisan db:seed
```

**Agora se tudo aconteceu sem nenhum erro, rode o comando para subir o servidor**:

```
php artisan serve
```

Pronto agora é só acessar o http://localhost:8000. ( Não tem nada cadastrado)


## ⚙️ Executando os testes

Os teste ainda vão ser criados.

## 🛠️ Construído com

Mencione as ferramentas que você usou para criar seu projeto

* [Laravel 9](https://laravel.com/docs/9.x/releases) - O framework web usado
* [Postgresql](https://www.postgresql.org/) - Banco de dados
* [SonarLint](https://github.com/SonarSource/sonarlint-visualstudio) -  Usado para CleanCode & fix bugs

## ✒️ Autores

Mencione todos aqueles que ajudaram a levantar o projeto desde o seu início

* **Matteo da Silva Carminato** - *Trabalho Inicial* - [Linkedin](https://linkedin.com/in/matteocarminato)

## 📄 Licença

Este projeto está sob a licença (sua licença) - veja o arquivo [LICENSE.md](https://github.com/usuario/projeto/licenca) para detalhes.

⌨️ com ❤️ por [Matteo Carminato](https://github.com/matteocarminato) 😊