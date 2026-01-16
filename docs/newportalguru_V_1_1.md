# PORTAL DATA GURU (CI-4)
## Dokumen Acuan Teknis & Arsitektural

---

## 1. FRAMEWORK & LINGKUNGAN

1.1 Framework  
- CodeIgniter 4

1.2 Bahasa & Runtime  
- PHP >= 8.1

1.3 Database  
- MySQL / MariaDB

1.4 Arsitektur  
- MVC + Service Layer (Layered Architecture)

1.5 Routing  
- AutoRoute : OFF  
- Rewrite URL : ON  
- index.php : AKTIF

1.6 Lingkungan Pengembangan  
- Editor : VSCode  
- Terminal : PowerShell  
- Web Server : XAMPP (Apache, htdocs)

---

## 2. FRONTEND DEPENDENCIES

- Vanilla JavaScript (ES6+)
- Bootstrap 4 + jQuery bawaan
- AdminLTE 3.2.x  
  (Dashboard v3, Simple Tables, General Forms, Profile Page)
- Clipboard API (native browser)
- (Opsional) Simple-Datatables 7.x

Catatan:
- Tidak menggunakan SPA framework (React/Vue)
- Frontend bersifat server-rendered + client-side manipulation

---

## 3. STRUKTUR DATABASE + FUNGSI KOLOM

### 3.1 Tabel `guru`
Menyimpan data utama dan akun login guru.

- id_guru => int(11) // Primary key
- gelar_depan => varchar(50)
- nama_lengkap => varchar(150)
- gelar_belakang => varchar(50)
- nik => char(16)
- nuptk => varchar(30)
- jenis_kelamin => enum('L','P')
- tempat_lahir => varchar(100)
- tanggal_lahir => date
- agama => varchar(30)
- no_wa => varchar(20)
- jenis_ptk => varchar(50)
- email => varchar(100)
- jarak_tempat_tinggal => decimal(5,2)
- alamat => text
- foto => varchar(255)
- username => varchar(50)
- password => varchar(255) // hash
- aktif => tinyint(1)
- created_at => timestamp
- updated_at => timestamp

---

### 3.2 Tabel `users`
Menyimpan akun Admin dan Operator.

- id => int(11)
- username => varchar(50)
- password => varchar(255) // hash
- role => enum('admin','operator')
- aktif => tinyint(1)
- created_at => timestamp

---

### 3.3 Tabel `keluarga`
Data keluarga inti guru.

- id => int(11)
- id_guru => int(11)
- ibu_kandung => varchar(150)
- status_perkawinan => varchar(30)
- nama_pasangan => varchar(150)
- jumlah_anak => int(11)

---

### 3.4 Tabel `kepegawaian`
Status kepegawaian aktif (state saat ini).

- id => int(11)
- id_guru => int(11)
- status_kepegawaian => varchar(50)
- nip => varchar(30)
- jenis_asn => varchar(30)
- tmt_asn => date
- no_sk_asn => varchar(100)
- tgl_sk_asn => date
- file_sk_asn => varchar(255)
- tmt_guru => date
- tmt_pegawai => date

---

### 3.5 Tabel `riwayat_kepegawaian`
Riwayat perubahan kepegawaian (append-only).

- id => int(11)
- id_guru => int(11)
- tanggal_efektif => date
- jabatan => varchar(150)
- golongan => varchar(50)
- status_penugasan => varchar(50)
- status_keaktifan => varchar(30)
- jenis_sk => varchar(100)
- penerbit_sk => varchar(150)
- file_sk => varchar(255)
- created_at => timestamp

---

### 3.6 Tabel `riwayat_pendidikan`
Riwayat pendidikan formal guru.

- id => int(11)
- id_guru => int(11)
- jenjang => varchar(30)
- institusi => varchar(150)
- fakultas => varchar(150)
- jurusan => varchar(150)
- tahun_masuk => year(4)
- tahun_lulus => year(4)
- gelar => varchar(50)
- no_ijazah => varchar(100)
- file_ijazah => varchar(255)

---

### 3.7 Tabel `sertifikasi`
Data sertifikasi guru.

- id => int(11)
- id_guru => int(11)
- sertifikasi => enum('Ya','Tidak')
- jenjang => varchar(50)
- nrg => varchar(50)
- mapel => varchar(100)
- no_peserta => varchar(50)
- lptk => varchar(150)
- no_sertifikat => varchar(50)
- tanggal_lulus => date
- tahun => year(4)
- file_sertifikat => varchar(255)

---

### 3.8 Tabel `log_activity`
Audit trail seluruh aktivitas sistem.

- id => int(11)
- user_id => int(11)
- user_role => enum('guru','admin','operator')
- updated_by_role => enum('guru','operator','admin')
- aksi => varchar(50)
- modul => varchar(100)
- target_domain => varchar(50)
- target_id => int(11)
- deskripsi => text
- ip_address => varchar(50)
- user_agent => text
- created_at => timestamp

---

## 4. TEMPLATE MAPPING ROLE-BASED AKUN

### 4.1 Definisi Role

**Admin**
- Fokus: Monitoring & kontrol sistem
- Tidak mengelola data guru langsung

**Operator**
- Fokus: Operasi data guru massal
- Tidak memiliki akses audit global

**Guru**
- Fokus: Self-service data pribadi
- Akses terbatas pada data milik sendiri

---

### 4.2 Role Feature = Menu

Menu ditentukan oleh role:
- Dirender server-side
- Dilindungi filter
- Tidak boleh hanya disembunyikan via frontend

---

### 4.3 Menu per Role

**Admin**
- Dashboard Statistik Aplikasi
- User Operator Management
- Monitoring Log Activity

**Operator**
- Dashboard Operator (Hybrid Data Table)
- Guru Management
- Export Data Guru

**Guru**
- Dashboard Status Data Pribadi
- Biodata
- Kepegawaian
- Keluarga
- Riwayat Kepegawaian
- Riwayat Pendidikan
- Sertifikasi
- Portofolio PDF Pribadi

---

### 4.4 Dashboard Operator – Hybrid Data Table

- Data guru tidak dimuat saat awal
- Data dimuat setelah pencarian eksplisit
- Multi-select client-side
- Mode tampilan hanya data terpilih
- Counter jumlah terpilih
- Copy ke clipboard tanpa request ulang

Kolom tetap:
1. Nama Lengkap  
   (gelar_depan + nama_lengkap + gelar_belakang)
2. NIP
3. Golongan
4. Jabatan

---

### 4.5 Aturan Umum (DIKUNCI)

- Tidak ada preload data massal
- Tidak ada manipulasi data sensitif di frontend
- Semua Create / Update / Upload dicatat di log
- Scope data guru selalu dibatasi ke id_guru

---

# MAPPING ROUTE FINAL
## Portal Data Guru (CI-4)

Dokumen ini mendefinisikan **kontrak URL → Controller → Role**.
Digunakan sebagai acuan **Routes.php, Filter, dan Menu UI**.

---

## 1. ATURAN UMUM ROUTING (DIKUNCI)

- Rewrite URL : ON
- index.php   : tidak ditampilkan
- AutoRoute   : OFF
- URL format  : lowercase + dash (-)
- Akses route wajib melalui Filter Role

---

## 2. ROUTE ROLE: ADMIN

### Prefix
### Filter

### Routes

| Method | URL | Controller | Fungsi |
|------|-----|-----------|--------|
| GET | /admin/dashboard | Admin\DashboardController::index | Dashboard statistik aplikasi |
| GET | /admin/operators | Admin\UserController::index | Daftar operator |
| GET | /admin/operators/create | Admin\UserController::create | Form tambah operator |
| POST | /admin/operators/store | Admin\UserController::store | Simpan operator |
| GET | /admin/operators/{id}/edit | Admin\UserController::edit | Edit operator |
| POST | /admin/operators/{id}/update | Admin\UserController::update | Update operator |
| POST | /admin/operators/{id}/deactivate | Admin\UserController::deactivate | Nonaktifkan operator |
| GET | /admin/monitoring | Admin\MonitoringController::index | Monitoring log aktivitas |

---

## 3. ROUTE ROLE: OPERATOR

### Prefix
### Filter

### 3.1 Dashboard Operator (Hybrid Data Table)

| Method | URL | Controller | Fungsi |
|------|-----|-----------|--------|
| GET | /operator/dashboard | Operator\DashboardController::index | Dashboard tabel operator |
| GET | /operator/guru/search | Operator\GuruController::search | Pencarian guru (on-demand) |

---

### 3.2 Guru Management

| Method | URL | Controller | Fungsi |
|------|-----|-----------|--------|
| GET | /operator/guru | Operator\GuruController::index | Halaman manajemen guru |
| GET | /operator/guru/create | Operator\GuruController::create | Form tambah guru |
| POST | /operator/guru/store | Operator\GuruController::store | Simpan guru baru |
| GET | /operator/guru/{id} | Operator\GuruController::show | Detail guru |
| POST | /operator/guru/{id}/update | Operator\GuruController::update | Update data guru |
| POST | /operator/guru/{id}/deactivate | Operator\GuruController::deactivate | Nonaktifkan guru |

---

### 3.3 Export Data

| Method | URL | Controller | Fungsi |
|------|-----|-----------|--------|
| POST | /operator/guru/export | Operator\ExportController::guru | Export data guru (Excel) |

---

## 4. ROUTE ROLE: GURU

### Prefix
### Filter

---

### 4.1 Dashboard Guru

| Method | URL | Controller | Fungsi |
|------|-----|-----------|--------|
| GET | /guru/dashboard | Guru\DashboardController::index | Status data pribadi |

---

### 4.2 Data Pribadi Guru

#### Biodata
| Method | URL | Controller |
|------|-----|-----------|
| GET | /guru/biodata | Guru\ProfilController::index |
| POST | /guru/biodata/update | Guru\ProfilController::update |
| POST | /guru/biodata/upload-foto | Guru\ProfilController::uploadFoto |

---

#### Kepegawaian
| Method | URL | Controller |
|------|-----|-----------|
| GET | /guru/kepegawaian | Guru\KepegawaianController::index |
| POST | /guru/kepegawaian/update | Guru\KepegawaianController::update |
| POST | /guru/kepegawaian/upload-sk | Guru\KepegawaianController::uploadSK |

---

#### Keluarga
| Method | URL | Controller |
|------|-----|-----------|
| GET | /guru/keluarga | Guru\KeluargaController::index |
| POST | /guru/keluarga/update | Guru\KeluargaController::update |

---

#### Riwayat Kepegawaian
| Method | URL | Controller |
|------|-----|-----------|
| GET | /guru/riwayat-kepegawaian | Guru\RiwayatKepegawaianController::index |
| POST | /guru/riwayat-kepegawaian/store | Guru\RiwayatKepegawaianController::store |
| POST | /guru/riwayat-kepegawaian/upload | Guru\RiwayatKepegawaianController::upload |

---

#### Riwayat Pendidikan
| Method | URL | Controller |
|------|-----|-----------|
| GET | /guru/riwayat-pendidikan | Guru\RiwayatPendidikanController::index |
| POST | /guru/riwayat-pendidikan/store | Guru\RiwayatPendidikanController::store |
| POST | /guru/riwayat-pendidikan/upload | Guru\RiwayatPendidikanController::upload |

---

#### Sertifikasi
| Method | URL | Controller |
|------|-----|-----------|
| GET | /guru/sertifikasi | Guru\SertifikasiController::index |
| POST | /guru/sertifikasi/update | Guru\SertifikasiController::update |
| POST | /guru/sertifikasi/upload | Guru\SertifikasiController::upload |

---

#### Portofolio PDF
| Method | URL | Controller |
|------|-----|-----------|
| GET | /guru/portofolio/pdf | Guru\PortofolioController::pdf |

---

## 5. ROUTE UMUM (NON-ROLE)

| Method | URL | Controller | Fungsi |
|------|-----|-----------|--------|
| GET | /login | AuthController::login |
| POST | /login | AuthController::authenticate |
| GET | /logout | AuthController::logout |

---

## 6. CATATAN KEAMANAN (DIKUNCI)

- Semua route role **wajib Filter**
- Tidak ada akses lintas prefix role
- Semua aksi POST dicatat ke `log_activity`
- ID guru pada role Guru diambil dari session, bukan URL

---

# SKELETON FOLDER & FILE CI 
portal-data-guru/
│
├─ app/
│  ├─ Config/
│  │  ├─ App.php
│  │  ├─ Autoload.php
│  │  ├─ Database.php
│  │  ├─ Filters.php
│  │  └─ Routes.php              # ROUTE FINAL (dikunci)
│  │
│  ├─ Controllers/
│  │  ├─ AuthController.php
│  │  │
│  │  ├─ Admin/
│  │  │  ├─ DashboardController.php
│  │  │  ├─ UserController.php
│  │  │  └─ MonitoringController.php
│  │  │
│  │  ├─ Operator/
│  │  │  ├─ DashboardController.php
│  │  │  ├─ GuruController.php
│  │  │  └─ ExportController.php
│  │  │
│  │  └─ Guru/
│  │     ├─ DashboardController.php
│  │     ├─ ProfilController.php
│  │     ├─ KepegawaianController.php
│  │     ├─ KeluargaController.php
│  │     ├─ RiwayatKepegawaianController.php
│  │     ├─ RiwayatPendidikanController.php
│  │     ├─ SertifikasiController.php
│  │     └─ PortofolioController.php
│  │
│  ├─ Services/
│  │  ├─ AuthService.php
│  │  ├─ GuruService.php
│  │  ├─ KepegawaianService.php
│  │  ├─ KeluargaService.php
│  │  ├─ RiwayatKepegawaianService.php
│  │  ├─ RiwayatPendidikanService.php
│  │  ├─ SertifikasiService.php
│  │  ├─ UploadService.php
│  │  └─ LogService.php
│  │
│  ├─ Models/
│  │  ├─ GuruModel.php
│  │  ├─ UserModel.php
│  │  ├─ KepegawaianModel.php
│  │  ├─ KeluargaModel.php
│  │  ├─ RiwayatKepegawaianModel.php
│  │  ├─ RiwayatPendidikanModel.php
│  │  ├─ SertifikasiModel.php
│  │  └─ LogActivityModel.php
│  │
│  ├─ Filters/
│  │  ├─ AuthAdmin.php
│  │  ├─ AuthOperator.php
│  │  └─ AuthGuru.php
│  │
│  ├─ Helpers/
│  │  ├─ auth_helper.php
│  │  ├─ upload_helper.php
│  │  └─ format_helper.php
│  │
│  ├─ Views/
│  │  ├─ layout/
│  │  │  └─ main.php              # Template Inheritance (AdminLTE)
│  │  │
│  │  ├─ partials/
│  │  │  ├─ navbar.php
│  │  │  ├─ sidebar.php
│  │  │  └─ footer.php
│  │  │
│  │  ├─ auth/
│  │  │  └─ login.php
│  │  │
│  │  ├─ admin/
│  │  │  ├─ dashboard/
│  │  │  │  └─ index.php
│  │  │  ├─ operator/
│  │  │  │  ├─ index.php
│  │  │  │  └─ form.php
│  │  │  └─ monitoring/
│  │  │     └─ index.php
│  │  │
│  │  ├─ operator/
│  │  │  ├─ dashboard/
│  │  │  │  └─ index.php
│  │  │  └─ guru/
│  │  │     ├─ index.php
│  │  │     └─ form.php
│  │  │
│  │  └─ guru/
│  │     ├─ dashboard/
│  │     │  └─ index.php
│  │     ├─ profil/
│  │     │  └─ index.php
│  │     ├─ kepegawaian/
│  │     │  └─ index.php
│  │     ├─ keluarga/
│  │     │  └─ index.php
│  │     ├─ riwayat_kepegawaian/
│  │     │  └─ index.php
│  │     ├─ riwayat_pendidikan/
│  │     │  └─ index.php
│  │     ├─ sertifikasi/
│  │     │  └─ index.php
│  │     └─ portofolio/
│  │        └─ pdf.php
│  │
│  └─ Language/
│
├─ public/
│  ├─ assets/
│  │  ├─ adminlte/                # AdminLTE 3.2.x
│  │  ├─ js/
│  │  │  ├─ operator-table.js     # Hybrid DataTable logic
│  │  │  └─ clipboard.js
│  │  └─ css/
│  │
│  └─ index.php
│
├─ writable/
│  ├─ uploads/
│  │  ├─ foto/
│  │  ├─ sk/
│  │  ├─ ijazah/
│  │  └─ sertifikat/
│  │
│  └─ logs/
│
├─ docs/
│  ├─ 01_kondisi_awal.md
│  ├─ 02_arsitektur.md
│  ├─ 03_rolebase.md
│  ├─ 04_routes.md
│  └─ 05_database.md
│
├─ .env
├─ composer.json
└─ README.md
## ATURAN SKELETON (DIKUNCI)
### Controller
- Role-based (Admin / Operator / Guru)
- Tidak ada query DB
- Tidak ada logika bisnis
### Service
- Domain-based
- Semua aturan bisnis di sini
### Model
- Query DB saja
- Tidak tahu role / UI
### View
- Wajib pakai layout/main.php
- Tidak ada logic berat
### Assets
- JS untuk manipulasi data di public/js
- Tidak inline logic berat di view

# PHASE 1 — ENVIRONMENT SETUP
Menyiapkan seluruh fondasi teknis sebelum development dimulai.

## Sub-Phase 1.1 — Runtime & Server
- Web server (Apache)
- PHP version sesuai CI-4
- Database engine (MySQL/MariaDB)

## Sub-Phase 1.2 — Framework Fresh
- Install CodeIgniter 4 (fresh)
- Konfigurasi `.env`
- Base URL
- Timezone
- Writable permission

## Sub-Phase 1.3 — Development Tools
- Editor (VSCode)
- Terminal
- Git (digunakan)

## Sub-Phase 1.4 — Frontend Dependencies (hanya install & setup)
- Vanilla JavaScript (ES6+)
- Bootstrap 4 + jQuery bawaan
- AdminLTE 3.2.x
- Clipboard API (native)
- (Opsional) Simple-Datatables 7.x

**Output Phase 1:**
- CI-4 berjalan normal
- Belum ada fitur aplikasi

---

# PHASE 2 — GENERATE SKELETON (NON-ASSET)
Mengunci struktur aplikasi sebelum logika ditulis.

## Sub-Phase 2.1 — Struktur Folder
- Controllers (role-based)
- Services (domain-based)
- Models
- Filters
- Helpers
- Views (layout + partial)
- Docs

## Sub-Phase 2.2 — Template Inheritance
- `layout/main.php`
- `partials` (navbar, sidebar, footer)
- View child menggunakan `extend + section`

## Sub-Phase 2.3 — Skeleton Validation
- Tidak ada query DB
- Tidak ada business logic
- Tidak ada asset frontend

**Output Phase 2:**
- Struktur final terkunci
- Tidak perlu refactor struktur di fase berikutnya

---

# PHASE 3 — ROUTING & AUTH FOUNDATION
Menyiapkan jalur akses dan kontrol keamanan dasar.

## Sub-Phase 3.1 — Routing Configuration
- Rewrite URL aktif
- AutoRoute OFF
- Routes.php final
- Prefix route per role (admin / operator / guru)

## Sub-Phase 3.2 — Authentication Core
- Login
- Logout
- Session dasar
- Penyimpanan role di session

## Sub-Phase 3.3 — Authorization Filter
- AuthAdmin
- AuthOperator
- AuthGuru
- Proteksi prefix route per role

**Output Phase 3:**
- Sistem login berfungsi
- Role terdeteksi
- Route terlindungi

---

# PHASE 4 — DATABASE & MODEL FOUNDATION
Menyiapkan data layer sebelum service dan UI penuh.

## Sub-Phase 4.1 — Database Schema
- Struktur tabel final
- Relasi berbasis `id_guru`
- Soft-state (`aktif`)

## Sub-Phase 4.2 — Model Definition
- Satu model per tabel
- Query dasar
- Tanpa business logic

## Sub-Phase 4.3 — UI Login & Logout
- Halaman login
- Proses autentikasi
- Logout & destroy session

**Output Phase 4:**
- Data layer siap
- Login–logout terhubung ke DB

---

# PHASE 5 — CORE SERVICE AUTH (LOGIN–LOGOUT)
Mengunci logika autentikasi sampai UI.

## Sub-Phase 5.1 — Auth Service
- Validasi kredensial
- Mapping role
- Session handling

## Sub-Phase 5.2 — Auth Controller
- Controller tipis
- Delegasi ke AuthService

## Sub-Phase 5.3 — Auth UI Integration
- Validasi error
- Redirect sesuai role

**Output Phase 5:**
- Auth stabil
- Alur login–logout final

---

# PHASE 6 — CORE SERVICE ADMIN (SYSTEM CONTROL)
Implementasi role Admin (independen).

## Sub-Phase 6.1 — Admin Dashboard
- Statistik aplikasi
- Ringkasan data & status

## Sub-Phase 6.2 — Operator Account Management
- CRUD user operator
- Nonaktif akun

## Sub-Phase 6.3 — Monitoring & Log
- View log activity
- Filter & pagination

**Output Phase 6:**
- Admin siap mengontrol sistem
- Audit bisa dilakukan

---

# PHASE 7 — CORE SERVICE OPERATOR (DATA OPERATION)
Implementasi use case paling kompleks.

## Sub-Phase 7.1 — Operator Dashboard (Hybrid Data Table)
- On-demand search
- Client-side select
- Selected-only view
- Counter & copy ke clipboard

## Sub-Phase 7.2 — Guru Management
- Create guru
- Update data guru
- Nonaktif guru

## Sub-Phase 7.3 — Export Data
- Export data guru ke Excel
- Audit export

**Output Phase 7:**
- Operasi data massal berjalan
- Service domain teruji penuh

---

# PHASE 8 — CORE SERVICE GURU (SELF-SERVICE)
Implementasi role Guru dengan scope terbatas.

## Sub-Phase 8.1 — Guru Dashboard
- Status kelengkapan data
- Notifikasi kekurangan data

## Sub-Phase 8.2 — Individual Data Management
- Biodata + foto
- Kepegawaian + SK
- Keluarga
- Riwayat kepegawaian
- Riwayat pendidikan
- Sertifikasi

## Sub-Phase 8.3 — Portofolio PDF
- Generate PDF
- Read-only

**Output Phase 8:**
- Guru mandiri
- Data pribadi lengkap

---

# PHASE 9 — AUDIT, LOG & FILE GOVERNANCE
Menjamin akuntabilitas dan keamanan data.

## Sub-Phase 9.1 — Audit Logging
- Log create/update/upload/export
- Konsistensi log

## Sub-Phase 9.2 — File Governance
- Penamaan file aman
- Folder upload terpisah
- Tidak overwrite tanpa log

## Sub-Phase 9.3 — Frontend Interaction Layer
- Pemasangan Vanilla / Jquery terbatas
- JavaScript non-SPA (Vanilla / jQuery terbatas)
- AJAX on-demand (search, pagination ringan)
- UX helper (copy to clipboard)
- Tidak ada logika bisnis di frontend
- Fallback aman jika JavaScript nonaktif
Catatan konsistensi:
- Tidak mengubah Phase lain
- Tidak menambah asumsi
- Melegalkan operator-table.js & clipboard.js
- Selaras dengan AdminLTE 3 + Bootstrap 4 + jQuery
## Domain Terkait — Sub-Phase 9.3 (Frontend Interaction Layer)

### Operator Domain
- Interaksi tabel data guru
- Pencarian data guru (AJAX)
- Pagination ringan berbasis request
### Guru Domain
- UX helper copy data (NIP / NIK / ID Guru)
- Read-only (tidak mengubah data)
### Frontend Asset Domain
- JavaScript non-SPA
- Enhancement UX tanpa logika bisnis
File terkait:
- public/assets/js/operator-table.js
- public/assets/js/clipboard.js
### Endpoint / API Domain
- Menggunakan endpoint existing
- Response JSON
- Tidak menambah route baru
Endpoint terkait:
- /operator/guru/search
### Security & Governance Domain
- Tetap tunduk pada auth & filter role
- Tidak menyimpan state sensitif di browser
- Tidak bypass validasi backend
### UX Check Domain
- Tidak diuji pada UX CHECK awal
- Diuji setelah core UX (Admin → Operator → Guru) lulus

## Sub-Phase 9.4 — Data Binding & Dashboard Metrics
- Koneksi data dashboard dengan database (read-only)
- Query ringkasan (count / summary) per role
- Tidak ada logika bisnis di View
- Data diambil melalui Service layer
- Tanpa grafik kompleks (angka & tabel sederhana)
- Aman untuk performa (limit, index-aware)

## Sub-Phase 9.5 — Logout & Session Termination
- Proses logout terkontrol (destroy session)
- Audit log untuk aksi logout
- Redirect policy setelah logout
- Tidak menyisakan session aktif
- Berlaku untuk semua role (Admin, Operator, Guru)

**Output Phase 9:**
- Jejak aktivitas lengkap
- Aman untuk institusi

---

# PHASE 10 — PERFORMANCE, INDEX & HARDENING
Menyiapkan sistem untuk penggunaan nyata.

## Sub-Phase 10.1 — Database Index
- Index final per tabel
- Optimasi query dasar
- Validasi penggunaan index

## Sub-Phase 10.2 — Performance Tuning
- Pagination konsisten
- Query optimization
- Error handling terkontrol
- Tidak preload data besar

## Sub-Phase 10.3 — Production Config
- Environment production
- Security hardening
- Disable debug & dev tools

## Sub-Phase 10.4 — Session & Timeout Policy
- Session expiry (idle timeout)
- Regenerate session policy
- Pencegahan session hijacking

## Sub-Phase 10.5 — Access Denial & Error Pages
- Halaman 403 (akses ditolak)
- Halaman 404 custom
- Fallback error 500 (aman produksi)

## Sub-Phase 10.6 — Password & Account Security
- Ganti password
- Reset password
- Kebijakan password minimum

**Output Phase 10:**
- Stabil
- Aman
- Responsif
- Siap produksi


---

# PHASE 11 — DOCUMENTATION & HANDOVER
Menutup proyek secara profesional.

## Sub-Phase 11.1 — Dokumentasi Teknis
- Arsitektur
- Role & akses
- Routing

## Sub-Phase 11.2 — SOP & Maintenance
- Panduan penggunaan
- Checklist maintenance

**Output Phase 11:**
- Sistem siap dipelihara
- Tidak tergantung satu orang


**Status Dokumen:**  
FINAL – SIAP DIJADIKAN ACUAN IMPLEMENTASI
