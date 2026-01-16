# PORTAL DATA GURU (CI-4)
## KONTRAK DATA & AUDIT

---

## STATUS DOKUMEN
- Status : FINAL
- Fungsi : Acuan database & audit
- Relasi : Turunan DOC-01

---

## 1. PRINSIP DATA

- Database = source of truth
- State ≠ Riwayat
- Tidak ada silent update
- Semua perubahan via Service

---

## 2. STRUKTUR DATABASE (FINAL)

### Tabel guru
- id_guru (PK)
- gelar_depan
- nama_lengkap
- gelar_belakang
- nik
- nuptk
- jenis_kelamin
- tempat_lahir
- tanggal_lahir
- agama
- no_wa
- jenis_ptk
- email
- jarak_tempat_tinggal
- alamat
- foto
- username
- password
- aktif
- created_at
- updated_at

### Tabel users
- id (PK)
- username
- password
- role
- aktif
- created_at

### Tabel keluarga
- id (PK)
- id_guru
- ibu_kandung
- status_perkawinan
- nama_pasangan
- jumlah_anak

### Tabel kepegawaian
- id (PK)
- id_guru
- status_kepegawaian
- nip
- jenis_asn
- tmt_asn
- no_sk_asn
- tgl_sk_asn
- file_sk_asn
- tmt_guru
- tmt_pegawai

### Tabel riwayat_kepegawaian
- id (PK)
- id_guru
- tanggal_efektif
- jabatan
- golongan
- status_penugasan
- status_keaktifan
- jenis_sk
- penerbit_sk
- file_sk
- created_at

### Tabel riwayat_pendidikan
- id (PK)
- id_guru
- jenjang
- institusi
- fakultas
- jurusan
- tahun_masuk
- tahun_lulus
- gelar
- no_ijazah
- file_ijazah

### Tabel sertifikasi
- id (PK)
- id_guru
- sertifikasi
- jenjang
- nrg
- mapel
- no_peserta
- lptk
- no_sertifikat
- tanggal_lulus
- tahun
- file_sertifikat

### Tabel log_activity
- id (PK)
- user_id
- user_role
- updated_by_role
- aksi
- modul
- target_domain
- target_id
- deskripsi
- ip_address
- user_agent
- created_at

---

## 3. AUDIT

- Semua aksi penting wajib log
- Log bersifat append-only
- Tidak boleh diedit / dihapus

---

AKHIR DOKUMEN
