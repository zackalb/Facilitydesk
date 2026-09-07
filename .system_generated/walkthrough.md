# Walkthrough: Penyempurnaan Dashboard Admin, Manajemen Work Order, Real Data, dan Export Dokumen Resmi

## 1. Pembaruan Dashboard Admin (`/admin/dashboard`)
- **Penghapusan Banner "Perlu Tindakan"**: Banner merah statis di bagian atas telah dihilangkan sesuai permintaan.
- **Tabel Tindakan Cepat (Persetujuan RAB)**:
  - Kolom **Action** kini hanya menampilkan tombol **Icon Mata (👁️)**. Tombol aksi cepat Setujui/Tolak langsung di tabel telah dihapus.
  - Mengklik icon mata membuka modal formulir lengkap **Approval RAB: [Nama Fasilitas]** yang memuat:
    - Informasi Bukti (Lokasi, Deskripsi Kerusakan, Pelapor, Foto Bukti Before).
    - Tabel Rincian Anggaran Biaya (RAB) (Item, Qty, Satuan, Harga Satuan, Subtotal, Total Estimasi Biaya).
    - Catatan Keputusan Admin.
    - Tombol Tolak / Minta Revisi dan Setujui (Approve).
- **Mekanisme Otomatis Selesai Approve**:
  - Proposal yang telah disetujui atau ditolak otomatis **keluar dari daftar Tindakan Cepat** karena query hanya memuat proposal yang berstatus `menunggu_persetujuan`.
  - Data tersimpan aman di database, memotong saldo kas sarpras di `SchoolBudget`, dan masuk ke riwayat finansial.

---

## 2. Pemisahan Hak Akses & Peran pada Detail Work Order (`/admin/work-orders/{id}`)
- Panel aksi yang sebelumnya menyerupai formulir teknisi lapangan (seperti unggah foto after & inspeksi teknis) telah diubah menjadi **Manajemen & Penugasan SarPras (Perspektif Administrator)**:
  - **Tinjauan Hasil Kerja Petugas**: Menampilkan bukti foto *After* yang diunggah teknisi dan rangkuman proposal biaya.
  - **Formulir Disposisi Administrator**:
    1. Pengaturan Prioritas Work Order (Ringan / Sedang / Berat).
    2. Penugasan Petugas Teknisi Lapangan + Kontak Cepat WhatsApp.
    3. Pembaruan Status Work Order (Inspeksi / Perbaikan / Selesai).

---

## 3. Integrasi Data Riil Database (`Real Data`)
- Seluruh data KPI (Total Tiket Aktif, Menunggu Persetujuan, SLA %, Serapan Anggaran %, Fasilitas Sering Rusak) dihitung dinamis dari database (`DamageReport`, `BudgetProposal`, `SchoolBudget`, `Facility`).
- Menu **Laporan & Analitik Strategis** (`/admin/analytics`) terhubung dengan realisasi anggaran dari proposal yang disetujui.

---

## 4. Fitur Export Dokumen Resmi (PDF & Excel)
Diterapkan secara merata pada:
1. **Work Orders** (`/admin/work-orders`)
2. **Katalog Inventaris** (`/admin/inventory`)
3. **Laporan & Analitik** (`/admin/analytics`)

### Format Dokumen:
- 5. **Penyempurnaan Halaman Login & Keamanan**:
   - Penghapusan tombol dan pembatas Google SSO.
   - Penyesuaian placeholder input menjadi: `Masukkan email`.
   - Proteksi **Rate Limiting**: Maksimal 5 kali percobaan gagal berturut-turut. Jika mencapai 5 kali, akun diblokir selama **10 menit** dengan pemberitahuan sisa menit/detik.
   - Fitur **Lupa & Reset Kata Sandi**: Halaman `auth/forgot-password.blade.php` dan `auth/reset-password.blade.php` untuk mereset kata sandi baru.

7. **Penyempurnaan Menu Work Orders & Konsistensi Topbar Global**:
   - **Hapus Kolom Aksi di Work Orders Admin** (`/admin/work-orders`):
     - Kolom **Aksi** beserta ikon mata detail di dalam tabel WO telah dihapus sesuai permintaan. Nomor tiket WO (`#TK-...`) kini langsung berfungsi sebagai tautan ke detail WO.
     - Penyesuaian `colspan` tabel kosong menjadi 7 kolom.
   - **Harmonisasi & Konsistensi Topbar di Seluruh Role**:
     - Seluruh halaman aplikasi (Admin, Pelapor, dan Petugas) kini menggunakan struktur **Topbar seragam** yang identik dengan Admin SarPras:
       - **Sisi Kiri**: Judul peran halaman tebal (`Admin SarPras`, `Pelapor SarPras`, `Petugas Teknisi`).
       - **Sisi Kanan**: Ikon Lonceng Notifikasi (dengan indikator status), Ikon Bantuan (Tanda Tanya), Garis Pemisah Vertikal (`border-l`), Nama Pengguna tebal, Subtitle Peran/Jabatan, dan Foto Avatar Pengguna melingkar berbingkai rapi.
   - **Laporan & Analitik Strategis Berbasis Data Real & Animasi**:
     - **Sistem Input Nominal "Total Anggaran (Dialokasikan)"**:
       - Hanya menggunakan **SATU tombol tunggal yang bersih: "Atur Anggaran"** (menghilangkan tombol ganda/duplikat *Ubah Pagu*).
       - Membuka Modal interaktif untuk mengubah nominal pagu anggaran sekolah (`SchoolBudget`) per tahun ajaran.
       - Dilengkapi *auto-formatting* rupiah saat mengetik, tombol *quick preset* (Rp 25Jt, Rp 50Jt, Rp 75Jt, Rp 100Jt, Rp 200Jt), dan perhitungan proyeksi sisa saldo secara langsung (*live calculation*).
     - **Filter Periode Berfungsi Penuh (Functional Tabs)**:
       - **Tahun Berjalan**: Memfilter data anggaran sepanjang tahun ajaran aktif.
       - **Triwulan**: Memfilter realisasi pengeluaran dalam 3 bulan terakhir.
       - **Semester**: Memfilter realisasi pengeluaran dalam 6 bulan terakhir.
       - **Tanggal Kustom**: Membuka modal pemilihan rentang tanggal (*Dari Tanggal* s/d *Sampai Tanggal*) dengan filter dinamis.
     - **Perbaikan Grafik Tren & Animasi Anti-Keluar (Bounded SVG)**:
       - Memperbaiki koordinat grafik dan menghapus efek CSS transform scale yang sebelumnya menyebabkan titik/cincin animasi loncat ke luar layar.
       - Menggunakan native SVG `<animate>` untuk cincin berdenyut (*pulsing ring*) yang 100% berpusat rapi pada titik koordinat tanpa bergeser.
       - Memperbaiki efek *hover* pada titik kurva dan memposisikan tooltip interaktif agar selalu berada di dalam batas grafik (*inside bounds*).
   - **Kustomisasi Foto Profil Berdasarkan Role & Abjad**:
     - **Admin**: Menggunakan **Icon Siluet Profil Vektor Berwarna Biru** (lingkaran background biru royal `#2563eb` dengan siluet kepala & bahu biru muda `#bfdbfe`) sesuai referensi desain yang diminta.
     - **Petugas & Pelapor**: Menggunakan **Inisial Huruf Pertama (Abjad)** nama pengguna (`{{ strtoupper(substr($user->nama, 0, 1)) }}`) dengan latar belakang biru muda bersih berbingkai elegan.
     - **Halaman Pengaturan (`/settings/security`)**: Dibuat dinamis otomatis menyesuaikan apakah pengguna yang login adalah Admin (menampilkan siluet biru) atau Teknisi/Pelapor (menampilkan inisial huruf nama).
- **Cetak / PDF**:
  - Dilengkapi Kop Surat Resmi Instansi (*FacilityDesk - Badan Pengelola Sarana & Prasarana Sekolah*).
  - Elemen navigasi web (sidebar, header, search bar, pagination) otomatis disembunyikan saat cetak.
  - Dilengkapi kolom pengesahan / tanda tangan resmi Kepala Sarpras di pojok kanan bawah.
- **Export Excel**:
  - Mengunduh file `.csv` dengan standar karakter UTF-8 BOM, terstruktur rapi untuk Microsoft Excel.
