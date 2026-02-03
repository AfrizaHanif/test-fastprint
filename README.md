# Tes Junior Programmer

Sebuah aplikasi tes junior programmer buatan Muhammad Afriza Hanif.

## Link Video Dokumentasi

Dikarenakan video tersebut melebihi 10MB, maka video tersebut hanya apat dilihat melalui Youtube
https://youtu.be/JBVJIYvmSyg

## Teknologi yang Digunakan

- **Framework:** Laravel 12 (PHP)
- **Frontend:** Bootstrap
- **Database:** MySQL
- **Tools:** Composer

## Kebutuhan Software

Pastikan komputer anda memiliki software yang dibutuhkan untuk aplikasi ini:

- [PHP](https://www.php.net/) (8.1 atau tinggi) atau [XAMPP](https://www.apachefriends.org/)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) & NPM

### Cek Instalasi

Sebelum melanjutkan, pastikan software sudah terinstall dengan benar dengan menjalankan perintah berikut di terminal (Command Prompt / PowerShell):

```bash
php -v
composer -v
node -v
```

## Instalasi

1. **Clone Repositori**

    Menggunakan Terminal:

    ```bash
    git clone https://github.com/AfrizaHanif/test-fastprint.git
    cd fastprint-test
    ```

    Atau menggunakan [GitHub Desktop](https://desktop.github.com/).

2. **Install PHP dependencies**

    ```bash
    composer install
    ```

3. **Install JavaScript dependencies**

    ```bash
    npm install
    npm run build
    ```

4. **Konfigurasi Environment**

    Salin file .env.example menjadi .env dan sesuaikan konfigurasi database Anda.

    ```bash
    cp .env.example .env
    ```

    Update `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` di dalam file `.env` sesuai dengan database yang ada di komputer anda.

5. **Generate Application Key**

    ```bash
    php artisan key:generate
    ```

6. **Jalankan Migration**

   Jalankan perintah berikut untuk membuat struktur tabel.

    ```bash
    php artisan migrate
    ```

    Atau anda dapat membuat struktur tabel dan mengisi data awal (jika tersedia).

    ```bash
    php artisan migrate:fresh --seed
    ```

## Jalankan Aplikasi

Untuk menjalankan aplikasi:

```bash
php artisan serve
```

atau

```bash
composer run dev
```

Aplikasi dapat diakses melalui link: `http://localhost:8000`.
