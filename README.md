# Tes Junior Programmer

Sebuah aplikasi tes junior programmer buatan Muhammad Afriza Hanif.

## Link Video Dokumentasi

Dikarenakan ukuran video melebihi limit 10MB, maka video tersebut hanya dapat dilihat melalui Youtube: https://youtu.be/JBVJIYvmSyg

## Teknologi yang Digunakan

- **Framework:** Laravel 12 (PHP)
- **Frontend:** Bootstrap
- **Database:** MySQL
- **Tools:** Composer

## Kebutuhan Software

Pastikan komputer anda memiliki software yang dibutuhkan untuk aplikasi ini:

- [PHP](https://www.php.net/) (8.1 atau tinggi) atau [XAMPP](https://www.apachefriends.org/) (Disarankan)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) & NPM

### Catatan untuk PHP

Pastikan ekstensi ZIP menyala dengan cara:

1. Buka php.ini di folder (C:\xampp\php) (Jika tidak ditemukan, cari php.ini di search). Atau buka XAMPP (Run as Administrator), lalu klik config pada Apache dan klik php.ini
2. Pada Notepad (Windows), tekan ctrl + F dan ketik zip untuk menemukan keyword extension=zip
3. Jika terdapat semicolon (;) pada extension=zip, hapus untuk menyalakan extensi
4. Simpan dan tutup. Jika Apache dan MySQL masih menyala, mohon untuk melakukan restart ulang

### Cek Instalasi

Sebelum melanjutkan, pastikan software sudah terinstall dengan benar dengan menjalankan perintah berikut di terminal (Command Prompt / PowerShell):

```bash
php -v
composer -v
node -v
```

## Instalasi

1. **Pembuatan Database**

    Sebelum melakukan instalasi, hal yang pertama dilakukan adalah membuat database melalui PHPMyAdmin (Jika menggunakan XAMPP).

2. **Clone Repositori**

    Menggunakan Terminal:

    ```bash
    git clone https://github.com/AfrizaHanif/test-fastprint.git
    cd fastprint-test
    ```

    Atau menggunakan [GitHub Desktop](https://desktop.github.com/).

3. **Install PHP dependencies**

    ```bash
    composer install
    ```

4. **Install JavaScript dependencies**

    ```bash
    npm install
    npm run build
    ```

5. **Konfigurasi Environment**

    Salin file .env.example menjadi .env dan sesuaikan konfigurasi database Anda.

    ```bash
    cp .env.example .env
    ```

    Update `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` di dalam file `.env` sesuai dengan database yang ada di komputer anda.

    Catatan: Pastikan nama database (`DB_DATABASE`) sama dengan nama database yang dibuat melalui phpMyAdmin.

7. **Generate Application Key**

    Jalankan perintah berikut untuk membuat application key.

    ```bash
    php artisan key:generate
    ```

    Perintah tersebut akan membuat application key di file .env.

8. **Jalankan Migration**

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
