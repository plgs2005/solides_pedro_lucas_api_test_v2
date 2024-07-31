<p align="center"><a href="https://laravel.com" target="_blank">
<img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a>
<div class="sc-gGCDNa dMoCpX">
<div class="sc-kCUnkP kiPSMJ">
    <img src="asset('/img/logo_liberfly.jpeg')" class="sc-joCgVr fjphiV">
</div>
    <h1>Liberfly</h1>
</div>

</p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Teste Prático Backend v2

## Descrição

Bem-vindo à documentação da API para o projeto de teste prático Backend v2. Esta API foi desenvolvida como parte de um desafio técnico para demonstrar habilidades em autenticação JWT, gerenciamento de registros e documentação utilizando Swagger.

## Requisitos do Sistema

-   PHP 8.0+
-   Composer
-   Docker e Docker Compose
-   WSL2 (se estiver em um ambiente Windows)
-   Node.js e npm

## Configuração do Ambiente de Desenvolvimento

### Passos para Configuração

1. **Clone o Repositório:**

    ```sh
    git clone https://github.com/seu-usuario/teste-pratico-backend-v2.git
    cd teste-pratico-backend-v2
    ```

2. **Instale as Dependências:**

    ```sh
    composer install
    npm install
    ```

3. **Configure as Variáveis de Ambiente:**
   Copie o arquivo `.env.example` para `.env` e configure as variáveis de ambiente conforme necessário.

    ```sh
    cp .env.example .env
    ```

4. **Gere a Chave da Aplicação:**

    ```sh
    ./vendor/bin/sail artisan key:generate
    ```

5. **Instale o Laravel Sail:**
    ```sh
    php artisan sail:install
    ```

## Execução da Aplicação

### Usando Docker (Recomendado)

1. **Inicie os Containers Docker:**

    ```sh
    ./vendor/bin/sail up -d
    ```

2. **Execute as Migrações e Seeds:**

    ```sh
    ./vendor/bin/sail artisan migrate:fresh --seed
    ```

3. **Inicie o Servidor de Desenvolvimento:**
    ```sh
    ./vendor/bin/sail artisan serve
    ```

### Usando o PHP Built-in Server (Alternativa)

1. **Execute as Migrações e Seeds:**

    ```sh
    php artisan migrate:fresh --seed
    ```

2. **Inicie o Servidor de Desenvolvimento:**
    ```sh
    php artisan serve
    ```

## Utilização da API

### Autenticação

**Registro de Usuário:**

-   **Rota:** `/api/register`
-   **Método:** `POST`
-   **Parâmetros:**
    ```json
    {
        "name": "Test User",
        "email": "test@example.com",
        "password": "password",
        "password_confirmation": "password"
    }
    ```

**Login de Usuário:**

-   **Rota:** `/api/login`
-   **Método:** `POST`
-   **Parâmetros:**
    ```json
    {
        "email": "test@example.com",
        "password": "password"
    }
    ```

**Logout de Usuário:**

-   **Rota:** `/api/logout`
-   **Método:** `POST`
-   **Autenticação:** JWT
-   **Resposta esperada:** Status 200 com mensagem de sucesso.

**Obter Detalhes do Usuário Autenticado:**

-   **Rota:** `/api/me`
-   **Método:** `GET`
-   **Autenticação:** JWT
-   **Resposta esperada:** Status 200 com detalhes do usuário.

### Endpoints de Registro

**Listar Registros:**

-   **Rota:** `/api/records`
-   **Método:** `GET`
-   **Autenticação:** JWT
-   **Exemplo:**
    ```sh
    curl -H "Authorization: Bearer {TOKEN}" http://localhost/api/records
    ```

**Obter um Registro Específico:**

-   **Rota:** `/api/records/{id}`
-   **Método:** `GET`
-   **Parâmetros:** `id` (integer)
-   **Autenticação:** JWT

**Criar um Novo Registro:**

-   **Rota:** `/api/records`
-   **Método:** `POST`
-   **Parâmetros:**
    ```json
    {
        "name": "Sample Record",
        "description": "This is a sample record"
    }
    ```
-   **Autenticação:** JWT

**Atualizar um Registro Existente:**

-   **Rota:** `/api/records/{id}`
-   **Método:** `PUT`
-   **Parâmetros:**
    ```json
    {
        "name": "Updated Record",
        "description": "This is an updated record"
    }
    ```
-   **Autenticação:** JWT

**Excluir um Registro:**

-   **Rota:** `/api/records/{id}`
-   **Método:** `DELETE`
-   **Parâmetros:** `id` (integer)
-   **Autenticação:** JWT

### Documentação da API com Swagger

A documentação Swagger pode ser acessada em: [http://localhost/api/documentation](http://localhost/api/documentation).

### Testes de Integração

1. **Execute os Testes:**
    ```sh
    ./vendor/bin/sail artisan test
    ```

## Dicas e Soluções de Problemas

### Uso do WSL2

-   Certifique-se de que o Docker Desktop esteja configurado para usar o WSL2.
-   Verifique se o WSL2 está instalado corretamente e integrado com o Docker.

### Problemas Comuns

-   **Porta em Uso:** Certifique-se de que as portas `80`, `3306` e `8000` não estão sendo usadas por outros serviços.
-   **Erro de Migração:** Verifique se as configurações do banco de dados no arquivo `.env` estão corretas.
-   **Permissões:** Se encontrar problemas de permissão, execute os comandos com `sudo`.

## Contato

-   **Nome:** Pedro Lucas Gandara Santos
-   **Email:** [plgsantos@icloud.com](mailto:plgsantos@icloud.com), [devlaravel@icloud.com](mailto:devlaravel@icloud.com)
-   **Telefone:** +55 11 95090-3204
-   **GitHub:** [Pedro Lucas Fullstack Laravel](https://github.com/seu-usuario)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
