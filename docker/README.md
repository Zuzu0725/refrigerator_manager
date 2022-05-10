# Laravel環境構築

## Build & Up
```docker-compose up -d --build```

## コンテナ起動状態を確認
```docker-compose ps```

## Package Install
appコンテナに入る
```docker-compose exec app bash```

## Laravelプロジェクト作成
```composer create-project --prefer-dist laravel/laravel . "8.x"```

## jetstream:interiajsインストール
```composer require livewire/livewire```
```php artisan make:livewire test```
```npm install```
```npm run dev```
```php artisan migrate```