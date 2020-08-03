## configuration
cd /simple-promotion-manager
composer install
npm install
cp .env.example .env
insert db credentials into .env
php artisan key:generate
php artisan migrate
php artisan db:seed
npm run watch

            