# PORTAL DATA GURU (CI-4)
## ROUTE MAPPING & PHASE IMPLEMENTATION

---

## STATUS DOKUMEN
- Status : FINAL
- Fungsi : Acuan route detail & phase kerja
- Relasi : Turunan DOC-01 s/d DOC-04

---

## 1. TUJUAN

Dokumen ini melengkapi acuan utama dengan:
- Mapping route → controller → fungsi
- Definisi Phase & Sub-Phase implementasi
- Batas kerja per Phase

---

## 2. ATURAN UMUM ROUTING

- AutoRoute : OFF
- Rewrite URL : ON
- Semua route didefinisikan eksplisit
- Semua route role wajib filter

---

## 3. ROUTE MAPPING ROLE: ADMIN

| Method | URL | Controller | Fungsi |
|------|-----|-----------|--------|
| GET | /admin/dashboard | Admin\DashboardController | index |
| GET | /admin/operators | Admin\UserController | index |
| GET | /admin/operators/create | Admin\UserController | create |
| POST | /admin/operators/store | Admin\UserController | store |
| GET | /admin/operators/{id}/edit | Admin\UserController | edit |
| POST | /admin/operators/{id}/update | Admin\UserController | update |
| POST | /admin/operators/{id}/deactivate | Admin\UserController | deactivate |
| GET | /admin/monitoring | Admin\MonitoringController | index |

---

## 4. ROUTE MAPPING ROLE: OPERATOR

### Dashboard & Search
| Method | URL | Controller | Fungsi |
|------|-----|-----------|--------|
| GET | /operator/dashboard | Operator\DashboardController | index |
| GET | /operator/guru/search | Operator\GuruController | search |

### Guru Management
| Method | URL | Controller | Fungsi |
|------|-----|-----------|--------|
| GET | /operator/guru | Operator\GuruController | index |
| GET | /operator/guru/create | Operator\GuruController | create |
| POST | /operator/guru/store | Operator\GuruController | store |
| GET | /operator/guru/{id} | Operator\GuruController | show |
| POST | /operator/guru/{id}/update | Operator\GuruController | update |
| POST | /operator/guru/{id}/deactivate | Operator\GuruController | deactivate |

### Export
| Method | URL | Controller | Fungsi |
|------|-----|-----------|--------|
| POST | /operator/guru/export | Operator\ExportController | guru |

---

## 5. ROUTE MAPPING ROLE: GURU

| Method | URL | Controller | Fungsi |
|------|-----|-----------|--------|
| GET | /guru/dashboard | Guru\DashboardController | index |
| GET | /guru/biodata | Guru\ProfilController | index |
| POST | /guru/biodata/update | Guru\ProfilController | update |
| POST | /guru/biodata/upload-foto | Guru\ProfilController | uploadFoto |
| GET | /guru/kepegawaian | Guru\KepegawaianController | index |
| POST | /guru/kepegawaian/update | Guru\KepegawaianController | update |
| POST | /guru/kepegawaian/upload-sk | Guru\KepegawaianController | uploadSK |
| GET | /guru/keluarga | Guru\KeluargaController | index |
| POST | /guru/keluarga/update | Guru\KeluargaController | update |
| GET | /guru/riwayat-kepegawaian | Guru\RiwayatKepegawaianController | index |
| POST | /guru/riwayat-kepegawaian/store | Guru\RiwayatKepegawaianController | store |
| POST | /guru/riwayat-kepegawaian/upload | Guru\RiwayatKepegawaianController | upload |
| GET | /guru/riwayat-pendidikan | Guru\RiwayatPendidikanController | index |
| POST | /guru/riwayat-pendidikan/store | Guru\RiwayatPendidikanController | store |
| POST | /guru/riwayat-pendidikan/upload | Guru\RiwayatPendidikanController | upload |
| GET | /guru/sertifikasi | Guru\SertifikasiController | index |
| POST | /guru/sertifikasi/update | Guru\SertifikasiController | update |
| POST | /guru/sertifikasi/upload | Guru\SertifikasiController | upload |
| GET | /guru/portofolio/pdf | Guru\PortofolioController | pdf |

---

## 6. PHASE IMPLEMENTATION (FINAL)

### PHASE 1 — Environment Setup
- Server
- PHP
- Database
- CI4 fresh install

### PHASE 2 — Skeleton
- Folder structure
- MVC + Service
- Layout dasar

### PHASE 3 — Routing & Auth
- Routes.php
- Filter
- Login & logout

### PHASE 4 — Database & Model
- Schema final
- Model per tabel

### PHASE 5 — Core Auth Service
- AuthService
- Session handling

### PHASE 6 — Admin Module
- Dashboard
- Operator management
- Monitoring

### PHASE 7 — Operator Module
- Hybrid table
- Guru management
- Export

### PHASE 8 — Guru Module
- Self-service data
- Upload dokumen
- PDF

### PHASE 9 — Audit & Frontend Interaction
- Logging konsisten
- JS non-SPA
- UX helper

### PHASE 10 — Hardening
- Index
- Performance
- Security

### PHASE 11 — Dokumentasi & Handover
- Final docs
- SOP

---

## 7. ATURAN PHASE

- Phase dikerjakan berurutan
- Tidak lompat phase
- Commit git hanya di akhir Phase

---

AKHIR DOKUMEN
