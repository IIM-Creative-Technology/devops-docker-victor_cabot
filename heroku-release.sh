#!/usr/bin/env bash

echo "php artisan migrate --force"
php artisan migrate --force
php artisan cache:clear
php artisan clear-compiled
php artisan view:clear
php artisan config:clear
php artisan optimize:clear

exit_status=$?
if [ $exit_status -ne 0 ]
then
  curl -X POST -H "Content-Type: application/json" -d "{\"username\": \"Heroku\", \"content\": \"Deploy failed -> ${HEROKU_APP_NAME} \n- Version : ${HEROKU_RELEASE_VERSION}\"}" https://discord.com/api/webhooks/795596720842866698/D5KCgP5jqudWcvs6uP9ocwT8qtwl3wlspOPA9FiS6xhAl5b6nrXjMfgcEtlklf_D-30x
  exit $exit_status
fi

curl -X POST -H "Content-Type: application/json" -d "{\"username\": \"Heroku\", \"content\": \"Deployed -> ${HEROKU_APP_NAME} \n- Version : ${HEROKU_RELEASE_VERSION} \n- Link : https://${HEROKU_APP_NAME}.herokuapp.com \"}" https://discord.com/api/webhooks/795596720842866698/D5KCgP5jqudWcvs6uP9ocwT8qtwl3wlspOPA9FiS6xhAl5b6nrXjMfgcEtlklf_D-30x
