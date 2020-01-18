#!/bin/bash

mysql --user=root --password=root < ./install.sql

php artisan migrate --seed