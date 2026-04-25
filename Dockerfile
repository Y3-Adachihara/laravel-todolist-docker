# 1. ベースイメージとしてPHP 8.2 + Apacheを使用
FROM php:8.2-apache

# 2. 必要なシステムパッケージとPHP拡張のインストール（PostgreSQL用を含む）
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libpng-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo_pgsql bcmath gd

# 3. Apacheの設定：ドキュメントルートをLaravelのpublicフォルダに変更
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 4. Apacheのmod_rewriteを有効化（Laravelのルーティングに必要）
RUN a2enmod rewrite

# 5. Composerのインストール（公式のマルチステージビルドを利用）
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 6. プロジェクトファイルをコンテナ内にコピー
COPY . /var/www/html

# 7. 作業ディレクトリの設定
WORKDIR /var/www/html

# 8. 本番環境用にComposerでライブラリをインストール
# ※ .envがない状態でも動くように --ignore-platform-reqs などを使うことも検討
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

# 9. ストレージとキャッシュフォルダの権限設定（これが重要）
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

CMD php artisan migrate --force && apache2-foreground