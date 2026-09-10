# Daftar Akun Login Sistem FacilityDesk

Dokumen ini berisi seluruh kredensial akun bawaan (*default seeder*) yang dapat digunakan untuk masuk ke dalam sistem **FacilityDesk**, dikelompokkan berdasarkan peran (*role*) dan spesialisasinya.

> **URL Halaman Login:** [http://127.0.0.1:8000/login](http://127.0.0.1:8000/login)  
> **Password Default Semua Akun:** `password123`

---

## 1. Akun Pelapor (Siswa & Guru)
 1  **Budi Santoso** | `pelapor@sekolah.com` | `password123` | `pelapor` | Akun Siswa (Default) |
 2 **Budi Santoso** | `siswa@sekolah.com` | `password123` | `pelapor` | Akun Siswa (Alternatif) |
 3  **Ibu Ratna** | `guru@sekolah.com` | `password123` | `pelapor` | Akun Guru 

**Akses & Dashboard:**
- Dashboard Pelapor: `/pelapor/dashboard`
- Riwayat & Pelacakan Tiket: `/pelapor/tickets`

---

## 2. Akun Petugas (Teknisi Lapangan Berdasarkan Spesialisasi)

Setiap teknisi memiliki **spesialisasi kategori** masing-masing. Ketika pelapor membuat laporan kerusakan dengan kategori tertentu, tiket akan **otomatis ditugaskan (*auto-assign*)** ke teknisi dengan spesialisasi yang cocok.

| No | Nama Teknisi | Email Login | Password | Kategori Spesialisasi | Kategori ID 
 1  **Andi Saputra** | `andi.petugas@sekolah.com` | `password123` | **Listrik** | `1` 
 2  **Budi Pratama** | `budi.petugas@sekolah.com` | `password123` | **Air (Plumbing)** | `2` 
 3  **Joko Susilo** | `joko.petugas@sekolah.com` | `password123` | **Bangunan (Fasilitas Fisik)** | `3` 
 4 **Deni Kurniawan** | `deni.petugas@sekolah.com` | `password123` | **IT & Elektronik** | `4`
 5 **ZAJA S.KOM** | `zaja.petugas@sekolah.com` | `password123` | **Jaringan** | `5` 
 6 **Bayu S.T** | `Bayu.petugas@sekolah.com` | `password123` | **Jaringan** | `6` 
 

**Akses & Alur Kerja Teknisi:**
- Dashboard Tugas: `/petugas/dashboard`
- Detail Pengerjaan & Eksekusi: `/petugas/tasks/{id}`
- **Alur Urgensi Rendah / Sedang**: Langsung dieksekusi di lapangan (*status: proses_perbaikan*).
- **Alur Urgensi Tinggi**: Mengisi dan mengajukan formulir RAB (*budget_proposals*) ke Admin Sarpras.
- **Alur Panggilan Darurat**: *Fast-Track*, langsung eksekusi tanpa perlu syarat RAB.

---

## 3. Akun Admin Sarpras (Koordinator & Manajemen)

Akun ini memiliki hak akses tertinggi untuk memantau seluruh *Work Order*, mengelola master inventaris sarana prasarana sekolah, melihat analitik laporan, serta menyetujui, menolak, atau meminta revisi pengajuan RAB dari teknisi.

| No | Nama Pengguna | Email Login | Password | Role / Peran | Keterangan |
| 1 | **Budi Santoso** | `admin@sekolah.com` | `password123` | `admin` | Koordinator & Kepala Sarpras |

**Akses & Dashboard Admin:** 
- Dashboard Manajemen: `/admin/dashboard`
- Monitoring Work Orders: `/admin/work-orders`
- Inventaris Fasilitas: `/admin/inventory`
- Laporan & Analitik: `/admin/analytics`

---

## Catatan Keamanan & Reset Akun
- **Batas Percobaan Login:** Sistem membatasi maksimal **5 kali percobaan gagal**. Jika 5 kali berturut-turut salah memasukkan email/password, akun akan terkunci sementara selama **10 menit**.
- **Lupa Kata Sandi:** Jika lupa password, gunakan fitur **[Lupa Kata Sandi?](http://127.0.0.1:8000/forgot-password)** pada halaman login untuk mengatur ulang kata sandi baru.
- Untuk mengembalikan semua data akun ke pengaturan awal seeder, Anda dapat menjalankan perintah:
  ```bash
  php artisan db:seed --class=UserSeeder
  ```
