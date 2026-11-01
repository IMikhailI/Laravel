# Hotel Complex — Laravel + Vue

<p align="center">
  Веб-приложение для управления зданиями, номерами и гостями гостиничного комплекса.
</p>

<p align="center">
  <img alt="Laravel" src="https://img.shields.io/badge/Laravel-12-FF2D20?logo=laravel&logoColor=white">
  <img alt="PHP" src="https://img.shields.io/badge/PHP-8.2%2B-777BB4?logo=php&logoColor=white">
  <img alt="Vue" src="https://img.shields.io/badge/Vue-3-4FC08D?logo=vuedotjs&logoColor=white">
  <img alt="Vite" src="https://img.shields.io/badge/Frontend-Vite-646CFF?logo=vite&logoColor=white">
</p>

Репозиторий разделён на Laravel backend и Vue 3 frontend. Backend содержит серверные страницы и API; клиентская часть использует Axios, Pinia и Vue Router.

## Возможности

- просмотр зданий и номеров;
- управление гостями;
- вход пользователя;
- защищённые API-запросы с Laravel Sanctum;
- Vue-интерфейс для работы с API.

## Структура

- **backend/** — Laravel 12, PHP 8.2+, REST API, Blade-шаблоны и миграции.
- **frontend/** — Vue 3, Vite, Pinia, Vue Router и Axios.

## Локальный запуск

### Backend

~~~bash
cd backend
composer install
~~~

Создайте локальный файл окружения из примера, настройте подключение к базе данных и сгенерируйте ключ приложения:

~~~bash
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
~~~

### Frontend

Требуется Node.js версии, указанной в **frontend/package.json**.

~~~bash
cd frontend
npm install
npm run dev
~~~

Frontend должен обращаться к запущенному Laravel backend. Тесты backend запускаются командой **php artisan test** из каталога **backend**.

## API

Публичные маршруты включают список и карточку зданий, карточки комнат и гостей. Список комнат и данные текущего пользователя доступны через API с middleware Sanctum. Полный перечень маршрутов находится в **backend/routes/api.php**.