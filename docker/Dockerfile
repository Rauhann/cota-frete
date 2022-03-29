FROM ambientum/php:8.0-nginx

LABEL maintainer "Rauhann Chaves"

# Diretorio raiz do projeto no container
WORKDIR /app

# Copiando arquivos para seus respectivos diretorios dentro do container
COPY --chown=nginx:nginx . /app
COPY --chown=nginx:nginx ./docker/nginx/app.conf /etc/nginx/sites/enabled.conf
COPY ./docker/bash/entrypoint.sh /sbin/entrypoint.sh

# Remoção de cache
RUN sudo rm -rf /var/cache/apk/*

# Habilitando recurso de cron
RUN sudo touch crontab.tmp
RUN sudo chmod 777 crontab.tmp
RUN sudo echo '* * * * * cd /app && php artisan schedule:run >> /dev/null 2>&1' > crontab.tmp
RUN sudo crontab crontab.tmp
RUN sudo rm -rf crontab.tmp

# Expondo porta de acesso ao projeto
EXPOSE 80

# Executa script de inicialização do ambiente
ENTRYPOINT ["/sbin/entrypoint.sh"]
