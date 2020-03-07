.SILENT:
## コンテナのビルドと起動
setup: 
	make build
	make start

## コンテナの起動
start:
	cd laradock_chats;	docker-compose up -d mysql nginx phpmyadmin

## コンテナの停止
stop:
	cd laradock_chats;	docker-compose stop

## コンテナの削除
down: 
	cd laradock_chats;	docker-compose down

## コンテナの再起動
restart:
	cd laradock_chats;	docker-compose restart
	
## コンテナ削除→起動 restartでうまくいかないときに使用
reboot:
	make down
	make start

## コンテナのビルド
build: 
	cd laradock_chats;	docker-compose build mysql nginx workspace php-fpm phpmyadmin

## 起動中コンテナの一覧
show: 
	cd laradock_chats;	docker-compose ps

## ワークスペースに入る
bash: 
	cd laradock_chats;	docker-compose exec --user=laradock workspace bash

## ログを確認
arg ?= workspace
logs :
	cd laradock_chats;	docker-compose logs $(arg)
