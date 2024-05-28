# Zengo admission

## Első lépések
1. `git clone https://github.com/SomaKovacs/zengo-admission.git`
2. `cd zengo-admission`
3. `cp .env.example .env` 
4. `chmod 777 -R storage`
5. `composer install`
6. `docker compose build`
7. `docker compose up -d`
8. `docker compose exec app bash`
9. `php artisan migrate`
10. `php artisan db:seed --class=CountySeeder`
11. `npm install`
12. `npm run build`
13. `open` http://localhost:8000/

