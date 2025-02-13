init: docker-down-clean docker-build docker-up app-init
start: docker-down-clean docker-up
down: docker-down-clean
up: down docker-up
stop: docker-stop

docker-build:
	docker compose build

docker-up:
	docker compose up -d

docker-down-clean:
	docker compose down -v --remove-orphans

app-init: composer-install artisan-key-generate artisan-storage-link migrate-seed

artisan := docker compose exec app php artisan

composer-install:
	docker compose exec app composer install
artisan-key-generate:
	${artisan} key:generate
artisan-storage-link:
	([ -L "public/storage" ] && rm -r public/storage) && ([ -d "storage/app/public" ] || mkdir storage/app/public) && ${artisan} storage:link
sh:
	docker compose exec app sh
