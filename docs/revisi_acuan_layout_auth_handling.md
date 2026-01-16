# REVISI DOKUMEN ACUAN

## Judul
Revisi Aturan Layout untuk Halaman Public (Auth) dan Role-Based UI

## Versi
- Acuan awal: `newportalguru_V_1_1.md`
- Revisi ini: **Tambahan resmi** (tanpa menghapus pasal lama)

---

## 1. Latar Belakang

Ditemukan kondisi **fatal desain UI** di mana **sidebar dan navbar (role-based UI)** muncul pada **halaman login**.

Hal ini bertentangan dengan prinsip:
- Pemisahan **public page** vs **authenticated page**
- Keamanan UX (role context bocor ke halaman public)

Masalah ini **bukan bug implementasi kecil**, melainkan **cacat desain layout global**, sehingga **wajib direvisi di dokumen acuan sebelum perubahan kode dilakukan**.

---

## 2. Klarifikasi Konsep Halaman

### 2.1 Halaman Public
Kategori:
- Login
- Error (403, 404, 500)

Karakteristik:
- Tidak terikat role (Admin / Operator / Guru)
- Tidak menampilkan sidebar
- Tidak menampilkan navbar role
- Tidak membutuhkan session aktif

### 2.2 Halaman Role-Based (Authenticated)
Kategori:
- Admin Dashboard
- Operator Dashboard
- Guru Dashboard

Karakteristik:
- Memerlukan session & role
- Menggunakan layout utama
- Menampilkan navbar & sidebar sesuai role

---

## 3. Aturan Layout (REVISI RESMI)

### 3.1 Layout Utama (`layout/main.php`)

**Fungsi:**
- Digunakan **HANYA** untuk halaman authenticated (Admin / Operator / Guru)

**Wajib:**
- Include `partials/navbar`
- Include `partials/sidebar`

**Larangan:**
- Tidak boleh digunakan oleh halaman public (login, error)

---

### 3.2 View Auth (`Views/auth/login.php`)

**Status:** Public View

**Aturan baru:**
- Login **TIDAK BOLEH** terikat layout dengan sidebar
- Login **TIDAK BOLEH** mewarisi UI role

**Implikasi desain:**
- Login harus dirender **tanpa sidebar & navbar role**
- Cara teknis implementasi **akan dibahas di fase implementasi**, bukan di dokumen ini

---

## 4. Aturan Include Partial

### 4.1 Navbar & Sidebar

- `partials/navbar` dan `partials/sidebar` adalah **role-based UI**
- Tidak boleh di-render otomatis ke semua halaman
- Rendering harus mempertimbangkan **konteks halaman (public vs authenticated)**

---

## 5. Dampak & Batasan Revisi

### Yang DIIZINKAN oleh revisi ini:
- Penyesuaian wiring layout untuk login
- Pemisahan UI public dan UI role

### Yang TIDAK DIIZINKAN:
- Penambahan fitur baru
- Perubahan alur autentikasi
- Implementasi logout / session (tetap di Sub-Phase 9.5)

---

## 6. Status Revisi

- **Jenis:** Revisi desain (fatal UI issue)
- **Waktu eksekusi kode:** Setelah revisi ini disetujui
- **Status saat ini:** DIUSULKAN & MENUNGGU DIKUNCI

---

## 7. Catatan Kontrak

- Revisi ini **WAJIB** dijadikan bagian dari dokumen acuan resmi
- Tidak ada implementasi sebelum dokumen ini disetujui
- Semua implementasi setelah ini **HARUS patuh revisi ini**

---

**Dokumen ini disusun sebagai respon atas temuan fatal desain UI pada Sub-Phase 9.4.**

