<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Sistem Informasi Pustaka SMK Telkom

<br/>

### Tentang Project

Project ini dibuat untuk mendigitalisasi proses peminjaman buku di SMK Telkom Pekanbaru. Project ini merupakan salah satu tugas matakuliah Sistem Informasi.
<br/>
<br/>

### Cara Menjalankan

Prasyarat :

-   php (XAMPP)
-   composer

Langkah-langkah :

1. Clone repo ini

    ```
    git clone https://github.com/XMirz/pustaka.git
    ```

1. Masukkan ke directory repo yang telah diclone

    ```
    cd pustaka
    ```

1. Install dependencies

    ```
    composer install
    ```

1. Copy file .env.example, lalu ganti nama menjadi .env saja
1. Buat database baru pada mysql atau dbms lain, berikut commandnya jika melalui commandline atau terminal

    ```
    mysql -u root
    CREATE DATEBASE pustaka;
    exit;
    ```

1. Jalankan migrasi database
    ```
    php artisan migrate:fresh --seed
    ```
1. Jalankan pada local server

    ```
    php artisan serve
    ```

1. Silahkan login

    email = `x@x.com`
    password = `x`

### Library yang digunakan

1. [TailwindCSS](https://tailwindcss.com/) - Styling UI
