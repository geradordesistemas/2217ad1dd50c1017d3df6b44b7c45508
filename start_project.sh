#! /bin/bash

# Instala as dependências do projeto
./run.sh composer install

# Gera chaves públicas/privadas para uso na aplicação - API Lexik
./run.sh bin/console lexik:jwt:generate-keypair

# Da permissão de escrita e leitura pasta /var/*
./run.sh chmod 777 /var/ -R

# Cria o banco de dados
./run.sh bin/console doctrine:database:create

# Monta schema no banco de dados
./run.sh bin/console doctrine:schema:update --force

# Cria usuário administrador
./run.sh bin/console security:create-admin usuario1 usuario1@gmail.com 2217ad1dd50c1017d3df6b44b7c45508

# Cria usuário padrão
./run.sh bin/console security:create-user usuario1 usuario1@gmail.com 2217ad1dd50c1017d3df6b44b7c45508

# Faz instalação dos assets
./run.sh bin/console assets:install

# Limpa o cache do projeto
./run.sh bin/console cache:clear
