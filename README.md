![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/NiiyaDaiki/chats)
# 1on1チャットアプリ(ペルソナ5風)

![chat_demo](https://user-images.githubusercontent.com/56012694/102016927-e0c7fb80-3da6-11eb-8b6a-2bb4a9f5d47b.gif)


## 概要
ペルソナ5に出てくるチャットアプリを模したアプリケーション。
1対1のチャットが可能で、ユーザーアイコンの登録やブロック、メッセージ削除など基本的な機能も備えています。チャットをリアルタイムに反映するためにwebsocketを利用しています。

## 使用技術
![technology_used](https://user-images.githubusercontent.com/56012694/102021818-f993d980-3dc5-11eb-88ba-5ae56198431e.png)

## こだわりポイント
- 相手ユーザー入力中の吹き出しアイコンのアニメーション
- アップロード画像の切り抜き(remove.bgのAPIを使用)&2値化
- ログイン中ユーザーの可視化(gif動画のともだち名横の緑丸)
- 既読チャットの文字列を緑色に

## 今後の計画
- [ ] 3人以上でのグループチャット
- [ ] メッセージ間をつなぐ黒線の表示
- [ ] ページ全体をペルソナ風に


## 参考
以下の動画・記事は大変参考にさせていただきました。

チャットアプリ全体

https://www.udemy.com/course/private-one-to-one-chat-app-with-laravel-vuejs-and-pusher/

ペルソナ風のメッセージウィンドウ

https://qiita.com/dd0125/items/070cb6950ecb052ad94b


## Contrbuting
Pull requests are welcome!!

# 環境構築

※Docker,npmは導入前提 envファイルなどは別途共有してもらうこと

1. プロジェクトをクローン

`https://github.com/NiiyaDaiki/chats.git`

2. クローンしたフォルダに移動

`cd chats`

3. コンテナのビルド ※長いので気長に待つ

`docker-compose build mysql nginx workspace php-fpm phpmyadmin`

4. コンテナの起動

`docker-compose up -d mysql nginx phpmyadmin`

5. ワークスペースに入る

`docker-compose exec --user=laradock workspace bash`

6. パッケージのインストール

`composer install`

7. マイグレーションの実行

`php artisan migrate`

8. 初期データ投入

`php artisan db:seed`

9. アプリ起動

`npm run hot`

10. websocketsサーバ起動

`php artisan websockets:serve`

11. 起動確認

`http://localhost:8088`
