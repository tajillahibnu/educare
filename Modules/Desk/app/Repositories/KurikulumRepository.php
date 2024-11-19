<?php

namespace Modules\Desk\Repositories;

use App\Models\AcademicYear;
use App\Repositories\BaseRepository;

use App\Models\Kurikulum as MainModel;
use App\Models\Rombel;
use App\Models\TahunKurikulum;
use App\Models\TahunRombel;
use Illuminate\Support\Facades\DB;

class KurikulumRepository extends BaseRepository
{
    public function __construct(MainModel $model)
    {
        parent::__construct($model);
    }

    public function enrolTahunKurikulum($data)
    {
        try {
            // Memulai transaksi
            DB::beginTransaction();

            // Menggunakan updateOrCreate untuk TahunKurikulum
            $model = TahunKurikulum::updateOrCreate(
                [
                    'kurikulum_id' => $data['kurikulum_id'],
                    'tingkat_id' => $data['tingkat_id'],
                    'tahun' => $data['tahun_pelajaran'],
                ],
                [
                    'kurikulum_id' => $data['kurikulum_id'],
                    'tingkat_id' => $data['tingkat_id'],
                    'tahun' => $data['tahun_pelajaran'],
                ]
            );

            // Mendapatkan ID dari TahunKurikulum yang baru saja disimpan
            $tahunKurikulumId = $model->id;

            $aArrRomble = Rombel::where('kurikulum_id', $data['kurikulum_id'])->get();
            // Menyimpan data ke dalam tabel tahun_rombel setelah tahun_kurikulum disimpan
            foreach ($aArrRomble as $romble) {
                TahunRombel::updateOrCreate(
                    [
                        'rombel_id' => $romble->id,
                        'tahun' => $data['tahun_pelajaran'], // Pastikan ini ada
                        'kurikulum_id' => $data['kurikulum_id'],
                    ],
                    [
                        'tingkat_id' => $romble->tingkat_id,
                        'tahun_kurikulum_id' => $tahunKurikulumId,
                        // 'walikelas_id' => 1,
                    ]
                );
            }

            // Jika semua operasi berhasil, commit transaksi
            DB::commit();
            return $model;
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, rollback transaksi
            DB::rollBack();

            // Menangani kesalahan
            // Anda bisa mencatat kesalahan atau mengembalikan respons yang sesuai
            // \Log::error('Error saat menyimpan data: ' . $e->getMessage());

            // Mengembalikan respons error
            abort(500, 'Gagal menyimpan data.' . $e->getMessage());
        }
    }
}
