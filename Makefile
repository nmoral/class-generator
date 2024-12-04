up:
	docker compose up -d

down:
	docker compose down

build:
	docker compose build

bash:
	docker compose exec -it app bash

test:
	docker compose run --rm app ./vendor/bin/phpunit
