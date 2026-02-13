#!/bin/sh
set -e

cd /var/www/html

# SQLite path: use storage/app/database.sqlite when DB_DATABASE is set, else default
DB_PATH="${DB_DATABASE:-/var/www/html/database/database.sqlite}"
mkdir -p "$(dirname "$DB_PATH")"
if [ ! -f "$DB_PATH" ]; then
  touch "$DB_PATH"
  chown www-data:www-data "$DB_PATH"
fi

# Run migrations and seeders (safe to run on every start)
php artisan migrate --force --no-interaction
php artisan db:seed --force --no-interaction

exec "$@"
