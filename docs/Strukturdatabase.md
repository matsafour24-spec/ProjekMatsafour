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