.PHONY: init migrate up down destroy wordpress.login db.login db.console

DC_LOCAL = docker compose

init:
	@$(DC_LOCAL) up -d --build

migrate:
	@$(DC_LOCAL) exec db bash -c "mysql -u wordpress -pwordpress wordpress < /tmp/sqls/main.sql"

up:
	@$(DC_LOCAL) up -d

down:
	@$(DC_LOCAL) down

destroy:
	@$(DC_LOCAL) down --rmi all --volumes

wordpress.login:
	@$(DC_LOCAL) exec wordpress bash

db.login:
	@$(DC_LOCAL) exec db bash

db.console:
	@$(DC_LOCAL) exec db mysql -u wordpress -pwordpress wordpress
