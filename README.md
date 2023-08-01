<p>Cara Install</p>
<ol>
    <li>git clone https://github.com/Hermannnn006/kms-kelurahan.git</li>
    <li>cd lurah-app</li>
    <li>composer install</li>
    <li>cp .env.example .env</li>
    <li>ganti nama database menjadi kms_lurah pada file .env</li>
    <li>php artisan key:generate</li>
    <li>php artisan migrate --seed</li>
    <li>php artisan serve</li>
</ol>
