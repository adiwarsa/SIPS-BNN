<h1 align="center">Selamat datang di SIPS - BNN! 👋</h1>

## Apa itu SIPS - BNN?

Web Sistem Informasi Pengelola Surat yang dibuat oleh <a href="https://github.com/adiwarsa"> Adi Warsa </a>. **Sistem Informasi Pengelola Surat adalah Website untuk mengelola surat masuk, keluar, disposisi serta membuat template surat keluar pada BNN.**

## Fitur apa saja yang tersedia di SIPS - BNN?

- Autentikasi Admin
- User & CRUD
- Surat Masuk & CRUD
- Surat Keluar & CRUD
- Disposisi & CRU
- Dan lain-lain

## Release Date

**Release date : Jun 2023**

> SIPS - BNN merupakan project freelance skripsi yang dibuat oleh Adi Warsa. Kalian dapat download/fork/clone. Cukup beri stars di project ini agar memberiku semangat. Terima kasih!

---

## Default Account for testing

**Admin Default Account**

- email: admin@gmail.com
- Password: admin

---

## Install

1. **Clone Repository**

```bash
git clone https://github.com/adiwarsa/swadana.git
cd swadana
composer install
cp .env.example .env
```

2. **Buka `.env` lalu ubah baris berikut sesuai dengan databasemu yang ingin dipakai**

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

3. **Instalasi website**

```bash
php artisan key:generate
php artisan migrate --seed
```

4. **Jalankan website**

```bash
php artisan serve
```

## Author

- Facebook : <a href="https://www.facebook.com/adi.limitha13/"> Adi Warsa</a>
- LinkedIn : <a href="https://www.linkedin.com/in/adiwarsa/"> Adi Warsa</a>

## Contributing

Contributions, issues and feature requests di persilahkan.
Jangan ragu untuk memeriksa halaman masalah jika Anda ingin berkontribusi. **Berhubung Project ini saya sudah selesaikan sendiri, namun banyak fitur yang kalian dapat tambahkan silahkan berkontribusi yaa!**

## License

- Copyright © 2022 Adi Warsa.
- **SIPS - BNN licensed under the MIT license.**
