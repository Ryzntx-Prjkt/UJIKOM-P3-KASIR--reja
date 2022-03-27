# UJIKOM P3 - Kasir

Aplikasi berbasis web dengan teknologi PHP dan Framework [Laravel](https://laravel.com/)

## Kebutuhan
+ xampp / laragon
+ PHP dengan versi 8.0+
+ [composer](https://getcomposer.org/download/)
+ Text Editor ([VS Code](https://code.visualstudio.com/download) / Sublime)

## Petunjuk

+ Buka terminal / command prompt
+ Unduh Projek atau Clone dengan perintah

```
git clone https://github.com/ryzntx/UJIKOM-P1-CATATAN
```

+ Setelah selesai mengunduh masuk ke folder UJIKOM-P3-KASIR

```
cd UJIKOM-P3-KASIR
```

+ Lalu jalankan perintah di terminal

```
composer upgrade
cp .env.example .env
php artisan key:generate
php artisan storage:link
```

+ Buatlah database baru di phpmyadmin
+ dan buka file .env lalu cari DB_DATABASE lalu ubah isinya dengan nama database yang telah anda buat

+ Lalu jalankan perintah

```
php artisan migrate --seed
```

#### Aplikasi siap di jalankan

+ Jalankan perintah di terminal untuk menjalankan aplikasi
```
php artisan serve
```
+ dan buka link yang tertera pada layar terminal

### Akun untuk masuk
| # | Username | Password  |
| --|:--------:| ---------:|
| 1 | admin    | 12345678  |
| 2 | manajer  | 12345678  |
| 3 | kasir    | 12345678  |

