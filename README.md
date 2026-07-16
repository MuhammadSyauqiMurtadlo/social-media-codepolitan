# Social Media Codepolitan

Project Laravel ini merupakan aplikasi sosial media sederhana yang dibangun dengan Laravel 12 untuk mendukung fitur dasar interaksi pengguna, seperti autentikasi, posting, komentar, like, dan pesan langsung.

## Fitur Utama

- Autentikasi pengguna dengan JWT
- Manajemen postingan pengguna
- Komentar pada postingan
- Fitur like pada postingan
- Pengiriman dan pengelolaan pesan
- API RESTful berbasis Laravel
- UI sederhana menggunakan Laravel Breeze + Vite + Tailwind CSS

## Teknologi yang Digunakan

- PHP 8.2
- Laravel 12
- Laravel Breeze
- Laravel Sanctum
- Tymon JWT Auth
- MySQL / database Laravel default
- Vite + Tailwind CSS
- Pest untuk testing

## Struktur Aplikasi

Project ini terdiri dari beberapa bagian utama:

- `app/Http/Controllers` untuk menghandle request API
- `app/Models` untuk model data seperti User, Post, Comment, Like, dan Message
- `routes/api.php` untuk endpoint API versi `v1`
- `database/migrations` untuk skema database
- `resources/views` untuk tampilan web

## Instalasi

1. Clone repository ini
2. Masuk ke direktori project
3. Install dependency PHP:

```bash
composer install
```

4. Salin file environment dan generate key:

```bash
cp .env.example .env
php artisan key:generate
```

5. Konfigurasi database di file `.env`
6. Jalankan migrasi:

```bash
php artisan migrate
```

7. Install dependency frontend:

```bash
npm install
npm run build
```

8. Jalankan aplikasi:

```bash
php artisan serve
```

Atau untuk menjalankan aplikasi lengkap dengan frontend dan server backend:

```bash
composer run dev
```

## API Endpoint

API utama tersedia di path `/api/v1`.

### Autentikasi

- `POST /api/v1/register`
- `POST /api/v1/login`

### Posts

- `GET /api/v1/posts`
- `POST /api/v1/posts`
- `GET /api/v1/posts/{id}`
- `PUT /api/v1/posts/{id}`
- `DELETE /api/v1/posts/{id}`

### Comments

- `POST /api/v1/comments`
- `DELETE /api/v1/comments/{id}`

### Likes

- `POST /api/v1/likes`
- `DELETE /api/v1/likes/{id}`

### Messages

- `GET /api/v1/messages`
- `POST /api/v1/messages`
- `GET /api/v1/messages/{id}`
- `GET /api/v1/messages/user/{user_id}`
- `PUT /api/v1/messages/{id}`
- `DELETE /api/v1/messages/{id}`

> Beberapa endpoint di atas memerlukan token JWT yang valid pada header `Authorization: Bearer ...`.

## Testing

Jalankan test dengan perintah:

```bash
php artisan test
```

## Lisensi

Project ini menggunakan lisensi MIT.
