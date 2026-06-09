<div align="center">

<img src="https://img.shields.io/badge/-%F0%9F%8E%93%20SIAKAD-0d1117?style=for-the-badge" alt="SIAKAD"/>

# SIAKAD
### Sistem Informasi Akademik

<p>Aplikasi web untuk mengelola data akademik perguruan tinggi secara terpusat dan efisien.</p>

![Tugas Besar](https://img.shields.io/badge/Tugas%20Besar-Pemrograman%20Web%202-blue?style=flat-square)
![Status](https://img.shields.io/badge/Status-In%20Development-yellow?style=flat-square)
![PHP](https://img.shields.io/badge/PHP-8.0+-777BB4?style=flat-square&logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=flat-square&logo=laravel&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat-square&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-7952B3?style=flat-square&logo=bootstrap&logoColor=white)

</div>

---

## 📋 Tentang Proyek

**SIAKAD** *(Sistem Informasi Akademik)* adalah aplikasi berbasis web yang dikembangkan sebagai **Tugas Besar Mata Kuliah Pemrograman Web 2**. Aplikasi ini menyediakan platform terpusat bagi administrator, dosen, dan mahasiswa untuk mengelola seluruh kegiatan akademik — mulai dari data dosen dan mahasiswa, pengaturan mata kuliah, penjadwalan perkuliahan, hingga pengisian KRS.

---

## ✨ Fitur Utama

<table>
  <tr>
    <td align="center" width="200">👨‍🏫<br><b>Data Dosen</b></td>
    <td>Kelola profil dosen (NIDN, nama, bidang keahlian, jabatan, dan status)</td>
  </tr>
  <tr>
    <td align="center">👨‍🎓<br><b>Data Mahasiswa</b></td>
    <td>Kelola profil mahasiswa (NIM, nama, program studi, angkatan, dan status akademik)</td>
  </tr>
  <tr>
    <td align="center">📚<br><b>Mata Kuliah</b></td>
    <td>Kelola kode mata kuliah, jumlah SKS, semester, dan penugasan dosen pengampu</td>
  </tr>
  <tr>
    <td align="center">🗓️<br><b>Jadwal Perkuliahan</b></td>
    <td>Susun jadwal kuliah per semester, atur ruangan, hari & jam, dan cegah bentrok jadwal</td>
  </tr>
  <tr>
    <td align="center">📝<br><b>KRS</b></td>
    <td>Pengisian & persetujuan KRS, validasi batas SKS, dan riwayat KRS per mahasiswa</td>
  </tr>
</table>

---

## 🛠️ Teknologi

<div align="center">

| Layer | Teknologi |
|-------|-----------|
<!-- | **Frontend** | HTML5, | -->
| **Backend** | PHP 8.3, Laravel |
| **Database** | MySQL  |
| **Server** | Apache (Laragon) |
| **Version Control** | Git & GitHub |

</div>

---

## 🚀 Cara Menjalankan

### Prasyarat
Pastikan sudah terinstal:
- [PHP](https://www.php.net/) >= 8.0
- [Composer](https://getcomposer.org/)
- [MySQL](https://www.mysql.com/) / [XAMPP](https://www.apachefriends.org/) / [Laragon](https://laragon.org/)
- [Git](https://git-scm.com/)

<!-- ### Instalasi

```bash
# 1. Clone repositori
git clone https://github.com/username/siakad.git
cd siakad

# 2. Install dependensi PHP
composer install

# 3. Salin file environment
cp .env.example .env

# 4. Generate application key
php artisan key:generate
```

### Konfigurasi Database

Edit file `.env` dan sesuaikan konfigurasi berikut:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=siakad
DB_USERNAME=root
DB_PASSWORD=
```

```bash
# 5. Jalankan migrasi & seeder
php artisan migrate --seed

# 6. Jalankan server lokal
php artisan serve
```

Akses aplikasi di **http://localhost:8000** 🎉 -->

---

## 📁 Struktur Direktori

```
siakad/
├── 📂 app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── DosenController.php
│   │       ├── MahasiswaController.php
│   │       ├── MataKuliahController.php
│   │       ├── JadwalController.php
│   │       └── KrsController.php
│   └── Models/
│       ├── Dosen.php
│       ├── Mahasiswa.php
│       ├── MataKuliah.php
│       ├── Jadwal.php
│       └── Krs.php
├── 📂 database/
│   ├── migrations/
│   └── seeders/
├── 📂 resources/
│   └── views/
│       ├── dosen/
│       ├── mahasiswa/
│       ├── matakuliah/
│       ├── jadwal/
│       └── krs/
├── 📂 routes/
│   └── web.php
└── 📂 public/
```

---

## 👥 Tim Pengembang

<div align="center">

| Nama | NIM | 
|------|-----|
| Robi Septiandi | 5520124028 | 


</div>

> ✏️ *Sesuaikan dengan nama, NIM, dan peran anggota kelompokmu.*

---

## 📌 Informasi Akademik

<div align="center">

| Keterangan | Detail |
|------------|--------|
| 📖 Mata Kuliah | Pemrograman Web 2 |
| 📅 Semester | Genap 20XX/20XX |
| 🏛️ Program Studi | Teknik Informatika |
| 👨‍🏫 Dosen Pengampu | Nama Dosen |
| 🏫 Institusi | Universitas Suryakancana|

</div>

---

## 📄 Lisensi

Proyek ini dibuat murni untuk keperluan akademik sebagai **Tugas Besar Mata Kuliah Pemrograman Web 2**.


---

<div align="center">
  <sub>Dibuat dengan ❤️ oleh Tim Pengembang SIAKAD &nbsp;·&nbsp; Pemrograman Web 2</sub>
</div>