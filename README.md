# 🍔 Podrão Shrek - Sistema de Gestão de Restaurante

![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)
![MySQL](https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white)
![PHP](https://img.shields.io/badge/php-%23777BB1.svg?style=for-the-badge&logo=php&logoColor=white)

Este projeto foi desenvolvido como requisito para a disciplina de Programação Web. O objetivo principal foi simular um ambiente real de desenvolvimento colaborativo, focando em automação de backend e experiência do usuário.

## 🎯 Objetivos do Projeto
- **Versionamento:** Uso estratégico do GitHub para trabalho em equipe.
- **Segurança e Organização:** Implementação de arquitetura MVC com framework Laravel.
- **Banco de Dados Avançado:** Modelagem MySQL com uso de *Triggers* para automação de processos.
- **UI/UX:** Interface focada na simplicidade e acessibilidade do usuário final.

---

## 🛠️ Tecnologias e Ferramentas
* [XAMPP](https://sourceforge.net/projects/xampp) (Servidor Apache & MySQL)
* [Composer](https://getcomposer.org/) (Gerenciador de dependências PHP)
* [PHP 8.x](https://www.php.net/)
* [Laravel Framework](https://laravel.com/)

---

## 🚀 Como Rodar o Projeto Localmente

### 1. Preparação do Ambiente
Mova a pasta do projeto para o diretório de arquivos do servidor:
```bash
C:\xampp\htdocs\nome-do-projeto
```

### 2. Configuração do Servidor
> [!CAUTION]
> **Observação:** Caso ocorra o erro ```Error: MySQL shutdown unexpectedly```. Siga os passos abaixo:
> 1. Pare o XAMPP completamente.
> 
> 3. Abra a pasta ```C:\xampp\mysql\data```.
> 4. Renomeie a pasta data para ```data_old```. Crie uma nova pasta chamada ```data```.
> 5. Copie o conteúdo da pasta ```backup``` (localizada em ```xampp/mysql/```) e cola na nova pasta ```data```.
> 6. Caso tenha algum banco de dados, copie eles da pasta ```data_old``` para a nova pasta ```data```. não copie as pastas ```mysql```, ```performance_schema```, ou ```phpmyadmin```.
> 7. Copie o arquivo ```ibdata1``` da pasta ```data_old``` para a nova ```data```, substituindo o existente. <br>
> **Importante:** Apagar este arquivo pode resultar na perda de seus dados.

### 3. Configuração do Banco de Dados
1. No painel do XAMPP, na linha do MySQL, clique em **Admin**.
2. No phpMyAdmin, vá na aba **SQL** e execute:
```bash
CREATE DATABASE podraoshrek;
```
3. Importe os scripts seguindo esta ordem:
   - Execute o conteúdo do arquivo `DB.sql`.
   - Execute o conteúdo do arquivo `TriggersDEFINITIVO.txt`.

### 4. Inicialização da Aplicação (Laravel)
Abra o terminal no VS Code dentro da pasta do projeto e execute:

```bash
# Instalar as dependências do projeto
composer install

# Criar o arquivo de configuração de ambiente
cp .env.example .env

# Gerar a chave de segurança da aplicação
php artisan key:generate

# Iniciar o servidor de desenvolvimento
php artisan serve
```
Acesse o sistema em seu navegador através do endereço: ```http://127.0.0.1:8000```

---

## 🛠️ Roadmap de Manutenção
[ ] Refatoração: Padronização e simplificação dos métodos de cadastro.

[ ] Melhorias de UI: Implementação de paginação dinâmica nos relatórios.

[ ] Filtros: Adição de barras de pesquisa para otimização de consultas.
