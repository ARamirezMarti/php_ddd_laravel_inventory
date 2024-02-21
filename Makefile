ssh:
	docker exec -it inventory-app bash
	
test:
	docker exec inventory-app php artisan test

rebuild:
	docker compose build --pull --force-rm --no-cache

migrations:
	docker exec inventory-app php artisan migrate
