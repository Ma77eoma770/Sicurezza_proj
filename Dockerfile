# uso apache con versione vecchia (vulnerabile) per php
FROM php:8.2-apache

# do i permessi allo user apache (www-data) di gestire la directory
RUN mkdir -p /var/www/htmltxt && chown -R www-data:www-data /var/www/htmltxt

# apache usa la porta 80 di default.