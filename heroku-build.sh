#!/usr/bin/env bash

if [ $APP_ENV = 'production' ] || [ $APP_ENV = 'preprod' ]
then
    npm run prod
else
    npm run dev
fi
