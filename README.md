# Devops A4 IWM Victor

## Attention

Ce repository est un clone de mon repository GitHub trouvable à cette adresse : https://github.com/Denporty/DevopsA4_Victor. Ce repository n'est donc pas celui qui est déployé. De plus, des modifications sur ce repository n'entraine pas de notifications via les webhooks que j'ai mis en place. Pour une meilleure compréhension de mon travail il est donc préférable de visualisé mon repository initial.

## Introduction

This repository is a student project on devops and CI/CD.
In that project i have create 5 stage with travis (build, test, lint, after and deploy).
With after i initialize webhook to have notification when build successfully in notifications discord channel (cf : discord part).
Of more there are PR enviromnent like : https://devopsa4-pr-28.herokuapp.com/#/.

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
| PR-Env    | <a href="https://devopsa4-br-try-pr-env.herokuapp.com/">https://devopsa4-br-try-pr-env.herokuapp.com |

## Discord

With that discord link you can see notification like build / commit / pr etc ... in notifications channel

https://discord.gg/YPg57umSDC

![Discord Illustration](https://i.ibb.co/hZR6cps/Capture-d-e-cran-2021-11-12-a-11-09-13.png)
