# SIMAG v1.0

Judul Skripsi: Sistem Informasi Praktik Kerja Lapangan Berbasis Web (Studi Kasus: BPS Kota Malang).


Deskripsi Folder:
1. Folder Database berisi file SQL dari database Sistem
2. Folder Naskah berisi dokumen penulisan skripsi mulai dari proposal, makalah, hingga file akhir skripsi.
3. Folder Referensi berisi referensi yang digunakan dalam pembangunan Sistem
4. Folder kode program berisi project yang dibangun oleh peneliti

## Fungsi Secara Umum
<details><summary>Manajemen pendaftaran PKL</summary>

- Melihat kuota peserta PKL yang tersedia
- Melakukan pendaftaran
- Melihat status penerimaan pendaftaran

</details>

<details><summary>Manajemen pengisian absensi kehadiran</summary>

- Mengisi absensi kehadiran
- Melihat absensi kehadiran

</details>

<details><summary> Manajemen pencatatan laporan aktivitas harian</summary>

- Membuat laporan aktivitas harian
- Mengedit laporan aktivitas harian 
- Menghapus laporan aktivitas harian
- Melihat status laporan 

</details>

<details><summary>Pembimbing Lapangan</summary>

- Memanajemen pendaftar dan peserta PKL
- Memonitoring absen dan laporan peserta PKL

</details>

<details><summary>Admin</summary>

- Memanajemen pengguna

</details>

## Instalasi
### Persyaratan Sistem
- Windows 10 atau yang lebih baru
- XAMPP versi `3.3.0`
- Visual Studio Code versi `1.67.2`
- Google Chrome versi `102.0.5005.115` atau yang lebih baru

## Instalasi
- Install XAMPP
- Jalankan Apache dan MySQL pada XAMPP
- Buat folder dengan nama "simag" dan masukkan seluruh file project pada folder "kode program" kedalamnya.
- Buat basis data mysql dengan nama "simag" lalu impor "mhs_221810647.sql" dari folder "Database"

## Panduan Penggunaan
#### Manajemen pendaftaran PKL
_Melihat kuota PKL_
- Buka halaman utama Sistem
- Lihat jumlah peserta aktif pada bagian informasi 

_Melakukan pendaftaran_
- Buka halaman utama sistem
- Tekan tombol "Masuk/Ajukan Pendaftaran"
- Masuk menggunakan email
- Isi formulir pendaftaran dan dokumen pendukung lalu kirim

_Melihat status penerimaan pendaftaran_
- Buka halaman utama sistem
- Tekan tombol "Masuk/Ajukan Pendaftaran"
- Masuk menggunakan email pendaftaran
- Informasi penerimaan akan muncul pada halaman

#### Manajemen pengisian absensi kehadiran
_Mengisi absensi kehadiran_
- Tekan tombol "absen" pada halaman dashboard
- Ijinkan akses lokasi
- Absen dilakukan saat datang dan pulang

_Melihat absensi kehadiran_
- Tekan menu Data Absen pada sidebar
- Tekan tombol ":eye:" pada data absen
- Detai absen akan menampilkan lokasi saat melakukan absen

#### Manajemen pencatatan laporan aktivitas harian
_Membuat laporan aktivitas harian_
- Tekan menu Laporan Aktivitas 
- Tekan tombol ":heavy_plus_sign:"
- Isi formulir laporan aktivitas harian
- Tekan simpan

_Mengedit laporan aktivitas harian_ 
- Tekan menu Laporan Aktivitas 
- Tekan tombol edit
- Isi formulir yang akan diubah
- Tekan tombol "Simpan"

_Menghapus laporan aktivitas harian_
- Tekan menu Laporan Aktivitas 
- Tekan tombol ":wastebasket:"
- Tekan ok pada alert konfirmasi

_Melihat status laporan_
- Tekan menu Laporan Aktivitas
- Pilih kategori status laporan

#### Pembimbing Lapangan
##### Memanajemen pendaftar dan peserta PKL
_Menerima pendaftar_
- Tekan menu peserta PKL
- Tekan bar pendaftar
- Tekan tombol ":heavy_check_mark:"

_Menolak pendaftar_
- Tekan menu peserta PKL
- Tekan bar pendaftar
- Tekan tombol ":heavy_multiplication_x:"

_Melihat profil peserta_
- Tekan menu peserta PKL
- Tekan nama peserta

_Melihat dokumen peserta_
- Tekan menu peserta PKL
- Tekan nama peserta
- Tekan tombol "Lihat" pada tabel dokumen 

##### Memonitoring absen dan laporan peserta PKL
_Melihat absen peserta_
- Tekan menu Data Absen pada sidebar
- Tekan tombol ":eye:" pada data absen
- Detai absen akan menampilkan lokasi saat melakukan absen

_Mengkonfirmasi laporan aktivitas harian peserta_
- Tekan menu Laporan Aktivitas
- Tekan bar belum disetujui
- Tekan tombol ":heavy_check_mark:"

_Menolak laporan aktivitas harian peserta_
- Tekan menu Laporan Aktivitas
- Tekan bar belum disetujui
- Tekan tombol ":heavy_multiplication_x:"

#### Admin
##### Memanajemen pengguna
_Menambah pembimbing lapangan_
- Tekan menu Pembimbing Lapangan
- Tekan tombol ":heavy_plus_sign:"
- Isi formulir identitad pembimbing
- Tekan Simpan

_Mengedit pembimbing lapangan_
- Tekan menu pembimbing Lapangan 
- Tekan tombol edit
- Isi formulir yang akan diubah
- Tekan tombol "Simpan"

_Menghapus pembimbing lapangan_
- Tekan menu Pembimbing Lapangan
- Tekan tombol ":wastebasket:"
- Tekan ok pada alert konfirmasi
