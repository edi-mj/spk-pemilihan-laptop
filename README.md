# Sistem Pendukung Keputusan Pemilihan Laptop

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)

## Deskripsi Proyek

Aplikasi web berbasis PHP yang membantu pengguna menemukan laptop yang sesuai dengan kebutuhan dan budget mereka menggunakan metode **Simple Additive Weighting (SAW)**. Sistem ini menganalisis berbagai kriteria seperti harga, RAM, storage, kapasitas baterai, dan berat laptop untuk memberikan rekomendasi terbaik.

## Fitur Utama

### Admin

- **Manajemen Kriteria**: Mengelola kriteria penilaian dan bobot masing-masing kriteria
- **Manajemen Alternatif**: Menambah, edit, dan hapus data laptop
- **Input Penilaian**: Memasukkan nilai untuk setiap alternatif berdasarkan kriteria
- **Normalisasi Data**: Melihat hasil normalisasi menggunakan metode SAW

### User

- **Pencarian Laptop**: Mencari laptop berdasarkan kategori dan budget maksimal
- **Rekomendasi Personal**: Mendapatkan 3 rekomendasi laptop terbaik berdasarkan preferensi
- **Detail Laptop**: Melihat spesifikasi lengkap setiap laptop
- **Daftar Laptop**: Menampilkan semua laptop yang tersedia

## Teknologi yang Digunakan

- **Backend**: PHP (Native)
- **Database**: MySQL dengan PDO
- **Frontend**: HTML5, CSS3, JavaScript
- **Framework CSS**: Bootstrap 5.3.3
- **Icons**: Bootstrap Icons 1.11.3
- **Package Manager**: npm

## Metode SAW (Simple Additive Weighting)

Metode SAW bekerja dengan cara:

1. Menentukan kriteria dan bobot untuk setiap kriteria
2. Normalisasi matriks keputusan
3. Menghitung nilai preferensi dengan mengalikan bobot kriteria dengan nilai normalisasi
4. Mengurutkan alternatif berdasarkan nilai preferensi tertinggi

## Kriteria Penilaian

- **Harga**: Semakin rendah semakin baik (cost)
- **RAM**: Semakin tinggi semakin baik (benefit)
- **Kapasitas Storage**: Semakin tinggi semakin baik (benefit)
- **Kapasitas Baterai**: Semakin tinggi semakin baik (benefit)
- **Berat Laptop**: Semakin ringan semakin baik (cost)

## Instalasi

### Prasyarat

- PHP >= 7.4
- MySQL/MariaDB
- Web Server (Apache/Nginx)
- Node.js dan npm

### Langkah Instalasi

1. Clone repository

```bash
git clone https://github.com/edi-mj/spk-pemilihan-laptop.git
cd spk-pemilihan-laptop
```

2. Install dependencies frontend

```bash
npm install
```

3. Konfigurasi database

   - Buat database baru dengan nama `spk_laptop`
   - Import file SQL (jika ada) atau buat struktur tabel sesuai kebutuhan

4. Konfigurasi koneksi database
   - Edit file `src/base.php`
   - Sesuaikan kredensial database (host, username, password)

```php
define("BASEURL", "http://localhost/spk-pemilihan-laptop");
define("BASEPATH", $_SERVER["DOCUMENT_ROOT"] . "/spk-pemilihan-laptop");
define("DB", new PDO('mysql:host=localhost;dbname=spk_laptop', 'root', '', [...]));
```

5. Jalankan aplikasi melalui web server
   - Akses `http://localhost/spk-pemilihan-laptop`

## Struktur Database

### Tabel Users

- `id`: Primary Key
- `username`: Username pengguna
- `password`: Password (SHA2 encrypted)
- `email`: Email pengguna
- `role`: Role pengguna (admin/user)

### Tabel Kriteria

Menyimpan data kriteria penilaian dan bobotnya

### Tabel Alternatif

Menyimpan data laptop yang menjadi alternatif pilihan

### Tabel Penilaian

Menyimpan nilai untuk setiap alternatif berdasarkan kriteria

## Cara Penggunaan

### Sebagai Admin

1. Login dengan akun admin
2. Kelola data kriteria dan bobotnya
3. Tambahkan data laptop (alternatif)
4. Input nilai penilaian untuk setiap laptop
5. Sistem akan otomatis menghitung normalisasi

### Sebagai User

1. Register atau login dengan akun user
2. Pilih kategori laptop yang diinginkan
3. Tentukan budget maksimal (opsional)
4. Sistem akan memberikan 3 rekomendasi laptop terbaik
5. Lihat detail laptop untuk informasi lebih lengkap

## Struktur Folder

```
spk-pemilihan-laptop/
├── src/
│   ├── admin/          # Modul administrator
│   ├── users/          # Modul pengguna
│   ├── assets/         # Assets (images, css, js)
│   └── *.php           # File konfigurasi dan helper
├── node_modules/       # Dependencies frontend
├── usecase/            # Dokumentasi use case
├── index.php           # Halaman login
└── package.json        # Konfigurasi npm
```

## Kontribusi

Kontribusi selalu terbuka untuk pengembangan proyek ini. Silakan fork repository dan buat pull request untuk fitur atau perbaikan baru.

## Lisensi

Proyek ini menggunakan lisensi ISC.

## Author

Dikembangkan sebagai implementasi Sistem Pendukung Keputusan menggunakan metode SAW untuk pemilihan laptop.
