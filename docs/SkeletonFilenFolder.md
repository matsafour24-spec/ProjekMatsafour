SKELETON FOLDER & FILE CI :
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
│  │  │  └─ main.php
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
├─ writable/
│  ├─ uploads/
│  │  ├─ foto/
│  │  ├─ sk/
│  │  ├─ ijazah/
│  │  └─ sertifikat/
│  │
│  └─ logs/