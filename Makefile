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
m-seed: m-wipe
	${artisan} db:wipe && ${artisan} migrate && ${artisan} db:seed
sh:
	docker compose exec app sh
m-resource:
	docker compose exec app php artisan moonshine:resource %

m-wipe:
	${artisan} db:wipe
route-list:
	${artisan} route:list > routes.txt
full-cache:
	${artisan} optimize:clear
#route
r-cache:
	${artisan} route:cache
#config
c-cache:
	${artisan} config:cache
migrate:
	${artisan} migrate
tinker:
	${artisan} tinker
docker-stop:
	docker compose stop
