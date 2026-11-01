# Aplikasi Pelaporan Kebakaran Hutan dan Lahan (Karhutla)

Sistem Informasi berbasis web untuk pelaporan dan manajemen penanganan kebakaran hutan dan lahan menggunakan Laravel dan Tailwind CSS. Dilengkapi dengan *Role-Based Access Control* (RBAC) untuk membedakan hak akses antara Pelapor, Relawan Pemantau, dan Koordinator.

---

## 1. Identitas Mahasiswa
* **Nama:** Muhammad Raka Pratama
* **NIM:** 251511052
* **Kelas:** 2B 

---

## 2. Kebutuhan Environment
Pastikan perangkat Anda telah terinstal perangkat lunak berikut sebelum menjalankan aplikasi:
* PHP (Versi >= 8.2)
* Composer
* Node.js & NPM
* Database Server (MySQL / MariaDB / SQLite)

---

## 3. Langkah Instalasi
1. Kloning atau unduh repositori proyek ini ke komputer Anda.
2. Buka terminal pada folder proyek, lalu instal dependensi PHP dengan perintah:
   ```bash
   composer install
   ```
3. Instal dependensi JavaScript/CSS dengan perintah:
   ```bash
   npm install
   ```
4. Salin file konfigurasi lingkungan:
   ```bash
   cp .env.example .env
   ```
5. Buat *key* aplikasi unik:
   ```bash
   php artisan key:generate
   ```
6. Buat *symlink* untuk penyimpanan foto bukti laporan:
   ```bash
   php artisan storage:link
   ```

---

## 4. Konfigurasi Database
1. Buka file `.env` yang berada di akar folder proyek menggunakan teks editor (misal: VS Code).
2. Sesuaikan pengaturan koneksi database Anda (gunakan MySQL atau SQLite):
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nama_database_anda
   DB_USERNAME=root
   DB_PASSWORD=
   ```

---

## 5. Cara Migration dan Seeding
Jalankan perintah berikut di terminal untuk membuat tabel database sekaligus memasukkan data awal (*seed* data wilayah dan akun demo):
```bash
php artisan migrate:fresh --seed
```

---

## 6. Akun Demo Setiap Role
Berikut adalah daftar kredensial akun uji coba yang tersedia setelah proses *seeding* dijalankan:

* **Role: Pelapor (Masyarakat)**
  * Email: `pelapor@example.com`
  * Password: `password`
* **Role: Relawan Pemantau**
  * Email: `relawan@example.com`
  * Password: `password`
* **Role: Koordinator**
  * Email: `koordinator@example.com`
  * Password: `password`

---

## 7. Cara Menjalankan Aplikasi
Untuk menjalankan aplikasi secara penuh, Anda perlu membuka **dua tab terminal** terpisah:

* **Terminal 1 (Menjalankan Server Backend Laravel):**
  ```bash
  php artisan serve
  ```
* **Terminal 2 (Menjalankan Kompilasi Aset CSS/Tailwind secara permanen atau pengembangan):**
  ```bash
  npm run build
  ```
  *(Atau gunakan `npm run dev` jika sedang dalam tahap pengembangan aktif)*

Setelah server aktif, buka *browser* dan akses tautan berikut:
`http://127.0.0.1:8000`