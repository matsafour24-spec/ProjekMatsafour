<?php

namespace App\Services;

use App\Models\GuruModel;

class GuruService
{
    protected GuruModel $guruModel;

    public function __construct()
    {
        $this->guruModel = new GuruModel();
    }

    /**
     * Search Guru - Operator Dashboard
     * Sub-Phase 9.4 (Data Binding)
     * SUMBER KEBENARAN: Strukturdatabase.md
     */
    public function search(string $keyword): array
    {
        $keyword = trim(strtolower($keyword));

        $builder = $this->guruModel->builder('guru');

        $builder->select([
            'guru.id_guru',
            'guru.gelar_depan',
            'guru.nama_lengkap',
            'guru.gelar_belakang',

            // NIP dari tabel kepegawaian (STATUS AKTIF)
            'kp.nip',

            // Jabatan & Golongan dari riwayat_kepegawaian TERAKHIR
            'rk.jabatan',
            'rk.golongan',
        ]);

        // JOIN status kepegawaian aktif
        $builder->join(
            'kepegawaian kp',
            'kp.id_guru = guru.id_guru',
            'left'
        );

        // JOIN riwayat kepegawaian TERAKHIR
        $builder->join(
            'riwayat_kepegawaian rk',
            'rk.id_guru = guru.id_guru
             AND rk.id = (
                SELECT MAX(rk2.id)
                FROM riwayat_kepegawaian rk2
                WHERE rk2.id_guru = guru.id_guru
             )',
            'left',
            false
        );

        // Guru aktif saja
        $builder->where('guru.aktif', 1);

        // SEARCH
        $builder->groupStart()
            ->like('LOWER(guru.nama_lengkap)', $keyword)
            ->orWhere(
                "LOWER(CONCAT(
                    COALESCE(guru.gelar_depan,''),' ',
                    guru.nama_lengkap,' ',
                    COALESCE(guru.gelar_belakang,'')
                )) LIKE '%{$keyword}%'",
                null,
                false
            )
            ->orLike('kp.nip', $keyword)
            ->groupEnd();

        $builder->orderBy('guru.nama_lengkap', 'ASC');
        $builder->limit(20);

        return $builder->get()->getResultArray();
    }
}
