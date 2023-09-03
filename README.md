# Panduan Set Up Program

Ini adalah panduan singkat untuk mengatur program SNovel.

## Langkah-langkah Set Up

1. **Clone Repositori**: Clone repositori ini ke direktori lokal Anda dengan menggunakan perintah berikut:

    ```bash
    git clone https://github.com/Marthana4/sewa_novel.git
    ```

2. **Konfigurasi .env**: Buat salinan file `.env.example` menjadi `.env` dan konfigurasi sesuai dengan pengaturan database Anda:

    ```plaintext
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nama_database_anda
    DB_USERNAME=root
    DB_PASSWORD=
    ```

    Pastikan untuk membuat database dengan nama yang sesuai di MySQL Anda sebelum melanjutkan.

3. **Instalasi Dependensi**: Buka terminal di direktori proyek Anda dan jalankan perintah berikut untuk menginstal semua dependensi yang diperlukan:

    ```bash
    composer install
    ```

4. **Jalankan Migrasi dan Seeder**: Migrasi database dan isi data awal dengan menjalankan perintah berikut:

    ```bash
    php artisan migrate --seed
    ```

5. **Jalankan Server Lokal**: Jalankan server Laravel di localhost dengan perintah berikut:

    ```bash
    php artisan serve
    ```

    Anda sekarang dapat mengakses program ini melalui [http://localhost:8000](http://localhost:8000) di peramban web Anda.

## Kontribusi
Jika Anda ingin berkontribusi pada proyek ini, silakan lakukan fork repositori ini dan kirimkan pull request dengan perubahan Anda.

## Lainnya
- Untuk dokumentasi lebih lanjut tentang Laravel, silakan kunjungi [Laravel Documentation](https://laravel.com/docs).
- Proyek ini dilisensikan di bawah lisensi [MIT License](LICENSE).

Terima kasih sudah menggunakan program ini!
