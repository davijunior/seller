#!/bin/bash

# Função para exibir mensagens em verde
function print_message {
    echo -e "\e[32m$1\e[0m"
}

command -v php >/dev/null 2>&1 || { echo >&2 "PHP não está instalado. Por favor, instale o PHP e tente novamente."; exit 1; }
command -v composer >/dev/null 2>&1 || { echo >&2 "Composer não está instalado. Por favor, instale o Composer e tente novamente."; exit 1; }

print_message "🚀 Instalando dependências do Composer..."
composer install

print_message "🔧 Copiando arquivo de ambiente..."
if [ -f ".env" ]; then
    print_message "Arquivo .env já existe. Pulando esta etapa."
else
    cp .env.example .env
fi

print_message "🛠️ Configurando o banco de dados..."

read -p "Informe o nome do banco de dados: " db_name
read -p "Informe o usuário do banco de dados: " db_user
read -s -p "Informe a senha do banco de dados: " db_password
echo ""

sed -i "s/DB_DATABASE=.*/DB_DATABASE=${db_name}/" .env
sed -i "s/DB_USERNAME=.*/DB_USERNAME=${db_user}/" .env
sed -i "s/DB_PASSWORD=.*/DB_PASSWORD=${db_password}/" .env


print_message "🔑 Gerando chave da aplicação..."
php artisan key:generate

print_message "📂 Configurando permissões das pastas..."
chmod -R 775 storage bootstrap/cache

print_message "🗑️ Limpando caches..."
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

print_message "🔄 Executando migrações e seeders..."
php artisan migrate --seed

print_message "🎉 Configuração concluída com sucesso!"
