# キャッシュなしビルド
docker-compose build --no-cache
docker-compose up -d

# 全削除
docker-compose down --volumes --rmi all --remove-orphans

# laravelインストール
composer create-project --prefer-dist laravel/laravel . "12.*"
chmod -R 777 storage
chmod -R 777 bootstrap/cache/

# migration やり直し ＋ SEED
php artisan migrate:fresh --seed

# seeder 実行 artisan db:seed --class= 【シーダ名】
php artisan db:seed --class=DatabaseSeeder
php artisan db:seed --class=ClassCategorySeeder

# 所有権者変更
chown -R 1000:1000 database/seeders/*

# キャッシュクリア
php artisan config:clear &&
php artisan cache:clear &&
php artisan route:clear &&
php artisan view:clear

# node + npm インストール
apt update
apt install -y nodejs npm
npm install n -g
n lts
apt purge nodejs npm
docker exec 〜 (再ログイン)
node -v
npm -v
npm install

# npm 再インストール
npm cache clean -f
rm -rf node_modules
npm install

# redis
redis-cli
SELECT 1
KEYS *
FLUSHALL