# PORTAL DATA GURU (CI-4)
## KONTRAK AKSES, AUTH, & LAYOUT

---

## STATUS DOKUMEN
- Status : FINAL
- Fungsi : Kontrak akses & UI
- Relasi : Turunan DOC-01

---

## 1. TUJUAN

Menetapkan aturan akses sistem, autentikasi, dan pemisahan UI public vs authenticated.

---

## 2. HALAMAN PUBLIC

Termasuk:
- Login
- Error page (403, 404, 500)

Aturan:
- Tidak terikat role
- Tidak menggunakan layout utama
- Tidak menampilkan sidebar / navbar role

---

## 3. HALAMAN AUTHENTICATED

Termasuk:
- Admin
- Operator
- Guru

Aturan:
- Wajib session aktif
- Wajib role valid
- Menggunakan layout utama
- Sidebar & navbar sesuai role

---

## 4. ROUTING

- Rewrite URL : ON
- AutoRoute : OFF
- Role-based prefix:
  - /admin
  - /operator
  - /guru

---

## 5. AUTHENTIKASI

- Login server-side
- Role disimpan di session
- Redirect sesuai role
- Logout destroy session

---

## 6. LARANGAN

- UI role tampil di halaman public
- Role ditentukan dari URL
- Filter dibypass frontend

---

AKHIR DOKUMEN
