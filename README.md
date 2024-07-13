# Teste Técnico Backend Convicti

## Stack utilizada

**Docker 27.0.3**

**PHP 8.3.8**

**Laravel 11**

## Rodando a aplicação - LINUX

Para rodar a aplicação para teste faça

```bash
  sudo make up
```

Quando finalizar a construção do Docker abra um novo terminal na pasta do projeto e rode (**Os dados de vendas gerados pelo seeder são apenas para testes de inserção, não tendo confiança nas relações**)

```bash
  sudo make composer-install
```

```bash
  sudo make migrate && sudo make seed
```

Para executar os testes do Laravel rode

```bash
  sudo make test
```

## Rodando a aplicação - WINDOWS

```bash
  sudo docker compose up --build
```

Quando finalizar a construção do Docker abra um novo terminal na pasta do projeto e rode (**Os dados de vendas gerados pelo seeder são apenas para testes de inserção, não tendo confiança nas relações**)

```bash
  docker compose exec app composer install
```

```bash
  docker compose exec app php artisan migrate
```

```bash
    docker compose exec app php artisan db:seed
```

Para executar os testes do Laravel rode

```bash
  sudo docker compose exec app php artisan test
```

## Documentação da API

#### Autenticar usuário - será retornado um token para acesso as demais rotas

```http
  POST /api/v1/auth
```

| Parâmetro | Tipo     | Descrição                                |
| :-------- | :------- | :--------------------------------------- |
| `email`   | `string` | **Obrigatório**. O e-mail do usuário     |
| `senha`   | `string` | **Obrigatório**. A senha padrão 123mudar |

#### Realiza o logout do usuário através do token

```http
  GET /api/v1/logout
```

#### Retorna todas as informações necessárias para plotar o mapa da tela inicial

```http
  GET /api/v1/inicio
```

#### Autenticar usuário - será retornado um token para acesso as demais rotas

```http
  POST /api/v1/venda/salvar
```

| Parâmetro   | Tipo        | Descrição                                                 |
| :---------- | :---------- | :-------------------------------------------------------- |
| `valor`     | `double`    | **Obrigatório**. O valor da venda                         |
| `latitude`  | `string`    | **Obrigatório**. A latitude de onde a venda foi efetuata  |
| `longitude` | `string`    | **Obrigatório**. A longitude de onde a venda foi efetuada |
| `data_hora` | `timestamp` | **Obrigatório**. A data e hora de efetuação da venda      |

#### Lista todas as vendas de acordo com o filtro selecionado

```http
  POST /api/v1/venda/listar
```

| Parâmetro         | Tipo   | Descrição                                   |
| :---------------- | :----- | :------------------------------------------ |
| `periodo_inicial` | `date` | **Obrigatório**. A data de início do filtro |
| `periodo_final`   | `date` | **Obrigatório**. A data final do filtro     |
| `vendedor`        | `int`  | O id do vendedor a ser procurado            |
| `diretoria`       | `int`  | O id da diretoria a ser utilizada no filtro |
| `unidade`         | `int`  | O id da unidade selecionada no filtro       |

#### Retorna todos os detalhes de uma determinada venda

```http
  POST /api/v1/venda/detalhes/{venda}
```

| Parâmetro | Tipo  | Descrição                                             |
| :-------- | :---- | :---------------------------------------------------- |
| `venda`   | `int` | **Obrigatório**. Id da venda que deverá ser detalhada |
