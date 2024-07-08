# Usar uma imagem oficial do PHP com Apache
FROM php:7.4-apache

# Instalar extensões PHP necessárias
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copiar os arquivos do projeto para o diretório raiz do servidor web
COPY . /var/www/html/

# Definir permissões adequadas para o diretório de trabalho
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expor a porta 80
EXPOSE 80
