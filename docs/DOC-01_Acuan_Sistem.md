# PORTAL DATA GURU (CI-4)
## DOKUMEN ACUAN SISTEM & RUANG LINGKUP

---

## STATUS DOKUMEN
- Status : FINAL
- Fungsi : Acuan induk sistem
- Posisi : Dokumen otoritas tertinggi

---

## 1. TUJUAN

Dokumen ini menjadi acuan utama dalam pengembangan sistem Portal Data Guru.
Seluruh keputusan teknis dan implementasi wajib tunduk pada dokumen ini.

---

## 2. RUANG LINGKUP SISTEM

- Jenis aplikasi : Web internal institusi
- Pola render : Server-rendered
- Arsitektur : MVC + Service Layer
- Bukan SPA
- Multi-role system

---

## 3. STACK TEKNOLOGI (DIKUNCI)

- Framework : CodeIgniter 4
- Bahasa : PHP >= 8.1
- Database : MySQL / MariaDB
- Frontend : AdminLTE 3 + Bootstrap 4 + jQuery terbatas

---

## 4. ROLE SISTEM

- Admin
- Operator
- Guru

---

## 5. PRINSIP UMUM

- Database adalah source of truth
- Semua perubahan data wajib tercatat
- Tidak ada asumsi fitur
- Tidak ada preload data massal
- Tidak ada logika bisnis di View

---

## 6. OTORITAS DOKUMEN

Urutan kekuatan dokumen:
1. DOC-01
2. DOC-02
3. DOC-03
4. DOC-04

Jika terjadi konflik, dokumen dengan nomor lebih kecil MENANG.

---

## LAMPIRAN A — POLA KERJA BERBASIS REPOSITORY (FINAL)

### A.1 Source of Truth
- Repository GitHub menjadi **sumber kebenaran utama**.
- Seluruh perubahan kode dilakukan di local (VS Code) lalu **di-push ke repo**.

REPO   : https://github.com/matsafour24-spec/ProjekMatsafour  
BRANCH : dev

---

### A.2 Prinsip Kerja Berbasis File
- AI **hanya bekerja pada file yang ditunjuk eksplisit**.
- AI **tidak melakukan scanning repo otomatis**.
- AI **menulis ulang ISI FILE PENUH**, bukan patch.

---

### A.3 Format Perintah Baku (WAJIB)
REPO : https://github.com/matsafour24-spec/ProjekMatsafour

BRANCH : dev
PHASE : X–Y
MODE : OPEN

FILE TERKAIT:

path/file.php

AKSI:

 CEK ISI FILE

 BUAT ISI FILE PENUH

 SARAN STRUKTURAL

ATURAN:

Sesuai DOC terkait

Tanpa asumsi tambahan

OUTPUT:

File utuh siap ditempel


Dokumen ini **mengikat seluruh proses kerja lanjutan**.

