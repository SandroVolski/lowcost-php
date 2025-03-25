clean:
	@if [ -n "$$(docker ps -q)" ]; then docker stop $$(docker ps -q); fi
	@if [ -n "$$(docker ps -a -q)" ]; then docker rm $$(docker ps -a -q); fi
	@if [ -n "$$(docker volume ls -q)" ]; then docker volume rm $$(docker volume ls -q); fi
	docker network prune -f
	@if [ -n "$$(docker images -q)" ]; then docker rmi -f $$(docker images -q); fi
	@if [ -n "$$(docker images -f 'dangling=true' -q)" ]; then docker rmi -f $$(docker images -f 'dangling=true' -q); fi
	docker builder prune -a -f
	clear