#!/bin/bash

# Remove config cache file if it exists
rm -f bootstrap/cache/config.php

php artisan config:clear

php artisan migrate --force

php artisan serve --host=0.0.0.0 --port=8000
