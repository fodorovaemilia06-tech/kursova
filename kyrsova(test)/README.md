# Kursova - Е-комерція платформа для спорттовару

Веб-додаток на Laravel для управління каталогом товарів, замовлень, акцій та вакансій магазину спорттовару.

## Система вимоги

- **PHP**: 8.2 або вище
- **Composer**: найновіша версія
- **Node.js**: 18.0 або вище
- **MySQL**: 8.0 або вище
- **Git**

## Встановлення

### 1. Клонування репозиторію

```bash
git clone https://github.com/fodorovaemilia06-tech/kursova.git
cd kursova/kyrsova(test)
```

### 2. Встановлення PHP залежностей

```bash
composer install
```

### 3. Встановлення Node.js залежностей

```bash
npm install
```

### 4. Створення файлу .env

```bash
cp .env.example .env
```

### 5. Конфігурація .env файлу

Відредагуйте файл `.env` та встановіть:

```env
APP_NAME="Kursova"
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kursova
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Генерація ключа додатку

```bash
php artisan key:generate
```

### 7. Створення бази даних

Створіть нову базу даних MySQL з ім'ям `kursova`:

```sql
CREATE DATABASE kursova CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 8. Виконання міграцій

```bash
php artisan migrate
```

### 9. Заповнення бази даних (опціонально)

```bash
php artisan db:seed
```

## Запуск додатку

### Запуск Laravel сервера

```bash
php artisan serve
```

Сервер запуститься на `http://localhost:8000`

### Запуск Vite для фронтенду (у новому терміналі)

```bash
npm run dev
```

Для виробництва:

```bash
npm run build
```

## Структура проекту

```
├── app/
│   ├── Http/
│   │   ├── Controllers/      # API контролери
│   │   └── Middleware/       # Middleware (AdmunMiddleware)
│   ├── Models/               # Eloquent моделі (User, Product, Category, etc.)
│   └── Providers/            # Service providers
├── database/
│   ├── migrations/           # Міграції БД
│   ├── factories/            # Фабрики для тестування
│   └── seeders/              # Seeders для заповнення БД
├── resources/
│   ├── views/                # Blade шаблони
│   ├── css/                  # CSS файли
│   └── js/                   # JavaScript файли
├── routes/
│   ├── web.php               # Веб-маршрути
│   └── api.php               # API маршрути
├── public/
│   ├── css/                  # Скомпільовані CSS
│   ├── js/                   # Скомпільовані JS
│   └── images/               # Зображення товарів
└── storage/
    ├── app/                  # Завантажені файли
    ├── framework/            # Кеш та сесії
    └── logs/                 # Логи додатку
```

## Основні функції

- **Управління товарами**: Додавання, редагування, видалення товарів
- **Категорії**: Організація товарів за категоріями
- **Акції**: Створення та управління promocійними акціями
- **Замовлення**: Система замовлень з відстеженням статусу
- **Магазини**: Управління філіалами магазинів
- **Вакансії**: Публікація та управління вакансіями
- **Адміністративна панель**: Контроль над усіма операціями

## Автентифікація

Проект використовує Laravel Sanctum для API аутентифікації та сесій для вебу.

### Ролі користувачів

- **Admin**: Повний доступ до системи
- **User**: Доступ до каталогу та замовлень

## Команди для розробки

```bash
# Запуск тестів
php artisan test

# Генерація моделей та міграцій
php artisan make:model ModelName -m

# Очистка кешу
php artisan cache:clear
php artisan config:clear

# Перевірка синтаксису PHP
php artisan tinker
```

## Вирішення проблем

### Помилка "SQLSTATE[HY000]"
- Переконайтеся, що MySQL запущений
- Перевірте конфігурацію .env файлу

### Помилка "Class not found"
```bash
composer dump-autoload
php artisan cache:clear
```

### Помилка прав доступу до storage
```bash
chmod -R 775 storage bootstrap/cache
```

## Ліцензія

Цей проект ліцензований під MIT ліцензією.**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
