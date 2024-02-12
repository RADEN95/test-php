## LaraBus

### Install dan Konfigurasi

#### Install

```sh
git clone https://github.com/RADEN95/test-php.git
```

1. ke folder src/project/pemesanan0tiket-bus
2. jalankan `composer install` di terminal
3. jalankan perintah berikut ini di terminal `cp .env.example .env`

#### Konfigurasi

Jalankan perintah berikut ini di terminal

1. buatkan database pada webserver anda dengan nama `pesan_tiker_bus`
2. sesuaikan nama database, username dan password di file `.env` `DB_DATABASE= DB_USERNAME= DB_PASSWORD=`
3. `php artisan migrate`
4. `php artisan db:seed`
5. login dengan akun berikut email=`sektiawanandy1995@gmail.com` password=`password`

#### Run Web

> php artisan serve

### Terima Kasih
