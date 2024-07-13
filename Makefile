up:
	docker compose up --build

down:
	docker compose down

migrate:
	docker compose exec app php artisan migrate

migrate-fresh:
	docker compose exec app php artisan migrate:fresh

seed:
	docker compose exec app php artisan db:seed

sh:
	docker compose exec app sh

composer-install:
	docker compose exec app composer install

test:
	docker compose exec app php artisan test

logs:
	docker compose logs -f app
