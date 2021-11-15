# Devops A4 IWM Victor

## Attention

Ce repository est un clone de mon repository GitHub trouvable à cette adresse : https://github.com/Denporty/DevopsA4_Victor. Ce repository n'est donc pas celui qui est déployé. De plus, des modifications sur ce repository n'entraine pas de notifications via les webhooks que j'ai mis en place. Pour une meilleure compréhension de mon travail il est donc préférable de visualisé mon repository initial.

## Introduction

This repository is a student project on devops and CI/CD.
In that project i have create 5 stage with travis (build, test, lint, after and deploy).
With after i initialize webhook to have notification when build successfully in notifications discord channel (cf : discord part).
Of more there are PR enviromnent like : https://devopsa4-pr-29.herokuapp.com.

## State

| Environment | State |
| ------ | ----------- |
| Prod   | <a href="#"><img src="https://app.travis-ci.com/Denporty/DevopsA4_Victor.svg?branch=main" alt="Build Status"> |
| Pre-Prod | <a href="#"><img src="https://app.travis-ci.com/Denporty/DevopsA4_Victor.svg?branch=preprod" alt="Build Status"> |
| Dev    | <a href="#"><img src="https://app.travis-ci.com/Denporty/DevopsA4_Victor.svg?branch=develop" alt="Build Status"></a> |

## Stack

<ul>
    <li>Laravel <a href="https://laravel.com/docs/8.x">documentation link</a></li>
    <li>Vue <a href="https://vuejs.org/v2/guide/">documentation link</a></li>
    <li>MySQL <a href="https://dev.mysql.com/doc/">documentation link</a></li>
    <li>Heroku <a href="https://devcenter.heroku.com/">documentation link</a></li>
    <li>Travis com <a href="https://docs.travis-ci.com/">documentation link</a></li>
</ul>

## Demo

| Environment | Link |
| ------ | ----------- |
| Prod   | <a href="https://devopsa4-prod.herokuapp.com/">https://devopsa4-prod.herokuapp.com |
| Pre-Prod | <a href="https://devopsa4-preprod.herokuapp.com/">https://devopsa4-preprod.herokuapp.com |
| Dev    | <a href="https://devopsa4-stage.herokuapp.com/">https://devopsa4-stage.herokuapp.com |
| PR-Env    | <a href="https://devopsa4-pr-29.herokuapp.com/">https://devopsa4-pr-29.herokuapp.com |

## Discord

With that discord link you can see notification like build / commit / pr etc ... in notifications channel

https://discord.gg/YPg57umSDC

![Discord Illustration](https://i.ibb.co/hZR6cps/Capture-d-e-cran-2021-11-12-a-11-09-13.png)

## Configuration

### CI / CD
    
This section was added on November 15

This project is deployed on Heroku and I use Travis for the CI. 

The environment variables are to be specified in the .env.travis (for a simpler use it is preconfigured in this project). The variables to configure in your .env.travis are :

| Variable | Content |
| ------ | ----------- |
| HEROKU_APP_PROD   | app_name_of_your_prod |
| HEROKU_APP_PREPROD | app_name_of_your_preprod |
| HEROKU_APP_DEV    | app_name_of_your_development |

On the Heroku side, after having created a pipeline containing your 3 environments (prod, preprod, develop) you must add these variables in each of your environments :

| Variable | Content |
| ------ | ----------- |
| APP_DEBUG   | true |
| APP_ENV | development/prod |
| APP_KEY    | key_of_your_app_laravel (php artisan generate:key) |
| APP_NAME   | your_app_name |
| APP_URL | url_of_deployment |
| DATABASE_URL    | url_of_your_db (get the url of JAWSDB_MARIA_URL) |
| JAWSDB_MARIA_URL    | url_generated_after_adding_the_jawsdb_maria_addon* |
| MIX_APP_URL   | deployment_url (mix allows Laravel to access the environment variable) |
| NODE_ENV | development |
| SESSION_DRIVER    | cookie |
| SESSION_LIFETIME    | 120 |

* When you create your environments on Heroku you must also add the addon JawsDB Maria. When you have added a configuration variable will automatically create containing the url to set in DATABASE_URL
