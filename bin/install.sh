#!/bin/bash

[ ! -f composer.phar ] && curl -sS https://getcomposer.org/installer | php

php composer.phar self-update
php composer.phar install -o --no-interaction

php app/console sam:database:reset --load-fixtures
php app/console assets:install --relative
php app/console braincrafted:bootstrap:generate
php app/console assetic:dump
php app/console bazinga:js-translation:dump
php app/console fos:js-routing:dump
php app/console doctrine:fixtures:load
