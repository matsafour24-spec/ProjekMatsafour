# UX CHECK — PORTAL DATA GURU (CI-4)
Status: KONTRAK TERKUNCI  
Metode: End-to-End Role-Based UX Validation

---

## ATURAN POLA CEK (WAJIB)
Setiap poin UX **WAJIB** mengikuti pola berikut:

1. **Jalankan Poin Cek**
2. **Jika BERHASIL**
   - Tandai: ✅ LULUS
   - **KUNCI poin**
   - Lanjut ke poin berikutnya
3. **Jika ERROR / TIDAK JALAN**
   - Tandai: ❌ GAGAL
   - **HENTIKAN UX CHECK**
   - Lakukan langkah WAJIB:
     1. Daftar file terkait:
        - Controller
        - Service
        - Filter
        - Helper
        - View
        - Route (jika relevan)
     2. Lampirkan **Screenshot Error**
     3. Analisa singkat (penyebab teknis)
     4. Kesimpulan singkat
     5. **Eksekusi perbaikan: BUILDER FULL FILE**
        - Tidak patch
        - Tidak potong kode
        - File ditulis ulang UTUH
   - Setelah perbaikan → **ULANGI poin cek yang gagal**

❌ DILARANG:
- Lompat poin
- Lanjut role lain sebelum role aktif LULUS
- Perbaikan setengah file

---

## A. PRA-CEK SISTEM
### A1. Server & Environment
- Apache: RUN
- MySQL: RUN
- `.env`: tidak error
- `writable/`: writable
- `writable/logs/`: tidak ada fatal error
- Bootstrap 5 TIDAK digunakan
- jQuery tersedia (AdminLTE)
- Sidebar AdminLTE wajib tampil

**Status:** ⬜ LULUS / ⬜ GAGAL  
Jika GAGAL → STOP & ANALISA

---

## B. UX CHECK — ROLE ADMIN
### B1. Login Admin
- URL: `/login`
- Login admin
- Redirect ke `/admin/dashboard`

**File terkait jika error:**
- Controllers/AuthController.php
- Services/AuthService.php
- Filters/AuthAdmin.php
- Config/Routes.php
- Views/auth/login.php

**Status:** ⬜ LULUS / ⬜ GAGAL

---

### B2. Dashboard Admin
- URL: `/admin/dashboard`
- Layout tampil
- Tidak error

**File terkait:**
- Controllers/Admin/DashboardController.php
- Views/admin/dashboard/index.php
- Views/layout/main.php
- Views/partials/*

**Status:** ⬜ LULUS / ⬜ GAGAL

---

### B3. Operator Management
- `/admin/operators`
- `/admin/operators/create`
- `/admin/operators/{id}/edit`

**File terkait:**
- Controllers/Admin/UserController.php
- Views/admin/operator/index.php
- Views/admin/operator/form.php
- Filters/AuthAdmin.php

**Status:** ⬜ LULUS / ⬜ GAGAL

---

### B4. Monitoring
- `/admin/monitoring`

**File terkait:**
- Controllers/Admin/MonitoringController.php
- Views/admin/monitoring/index.php

**Status:** ⬜ LULUS / ⬜ GAGAL

➡️ **ADMIN LULUS jika semua B1–B4 = LULUS**

---

## C. UX CHECK — ROLE OPERATOR
### C1. Login Operator
- Login operator
- Redirect ke `/operator/dashboard`
- Tidak bisa akses `/admin/*`

**File terkait:**
- AuthController
- AuthService
- Filters/AuthOperator.php
- Routes.php

**Status:** ⬜ LULUS / ⬜ GAGAL

---

### C2. Dashboard Operator
- `/operator/dashboard`
- Tidak preload data

**File terkait:**
- Controllers/Operator/DashboardController.php
- Views/operator/dashboard/index.php

**Status:** ⬜ LULUS / ⬜ GAGAL

---

### C3. Manajemen Guru
- `/operator/guru`
- `/operator/guru/create`
- `/operator/guru/{id}`

**File terkait:**
- Controllers/Operator/GuruController.php
- Services/GuruService.php
- Views/operator/guru/*

**Status:** ⬜ LULUS / ⬜ GAGAL

---

### C4. Search Endpoint
- `/operator/guru/search`
- Return JSON
- Tidak error

**File terkait:**
- Controllers/Operator/GuruController.php
- Services/GuruService.php

**Status:** ⬜ LULUS / ⬜ GAGAL

---

### C5. Export
- `/operator/guru/export`

**File terkait:**
- Controllers/Operator/ExportController.php

**Status:** ⬜ LULUS / ⬜ GAGAL

➡️ **OPERATOR LULUS jika semua C1–C5 = LULUS**

---

## D. UX CHECK — ROLE GURU
### D1. Login Guru
- Redirect ke `/guru/dashboard`
- Tidak bisa akses admin/operator

**File terkait:**
- AuthController
- AuthService
- Filters/AuthGuru.php

**Status:** ⬜ LULUS / ⬜ GAGAL

---

### D2. Dashboard Guru
- `/guru/dashboard`

**File terkait:**
- Controllers/Guru/DashboardController.php
- Views/guru/dashboard/index.php

**Status:** ⬜ LULUS / ⬜ GAGAL

---

### D3. Data Pribadi Guru
Cek SATU-PER-SATU:
- `/guru/biodata`
- `/guru/kepegawaian`
- `/guru/keluarga`
- `/guru/riwayat-kepegawaian`
- `/guru/riwayat-pendidikan`
- `/guru/sertifikasi`
- `/guru/portofolio/pdf`

**File terkait (contoh):**
- Controllers/Guru/*
- Services/*
- Views/guru/*

**Status:** ⬜ LULUS / ⬜ GAGAL

➡️ **GURU LULUS jika semua D1–D3 = LULUS**

---

## E. ERROR & SECURITY CHECK
### E1. Akses Ilegal
- Guru akses `/admin/*` → redirect login
- Operator akses `/guru/*` → redirect login

### E2. Error Runtime
- Tidak ada 404/500
- Tidak ada infinite redirect
- Tidak ada Notice/Warning

### E3. Log
- `writable/logs/` bersih dari fatal error

---

## F. HASIL AKHIR
| Role | Status |
|------|--------|
| Admin | ⬜ LULUS / ⬜ GAGAL |
| Operator | ⬜ LULUS / ⬜ GAGAL |
| Guru | ⬜ LULUS / ⬜ GAGAL |

➡️ **SEMUA LULUS = UX CHECK SELESAI & KONTRAK TERPENUHI**
