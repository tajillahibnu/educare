<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->dashboard(1);
        $this->data(20);
        $this->Management(30);
        $this->Master(80);
        $this->setting(90);
    }

    function dashboard($id)
    {

        $save['id']    = $id;
        $save['name']  = 'Dashboard';
        $save['type']  = 'admin';
        $save['url']   = 'dashboard';
        $save['view_path']  = 'dashboard/';
        $save['view_file']  = 'table';
        $save['level'] = null;
        $save['menu_order'] = 1;
        $save['middlewares'] = json_encode(['auth']);
        Menu::create($save);
    }

    function data($id)
    {
        $dd = $id;
        $save['id']    = $id;
        $save['name']  = 'Data';
        $save['type']  = 'admin';
        $save['url']   = null;
        $save['level'] = null;
        $save['menu_order'] = 2;
        $save['middlewares'] = json_encode(['auth']);
        Menu::create($save);

        $dd = $dd + 1;
        $save['id']         = $dd;
        $save['parent_id']  = $id;
        $save['name']       = 'Penilaian';
        $save['url']        = null;
        $save['level']      = null;
        $save['type']       = 'admin';
        $save['menu_order'] = 1;
        $save['middlewares'] = json_encode(['auth']);
        Menu::create($save);

        $dd = $dd + 1;
        $save['id']         = $dd;
        $save['parent_id']  = $id;
        $save['name']       = 'Absensi';
        $save['url']        = null;
        $save['level']      = null;
        $save['type']       = 'admin';
        $save['menu_order'] = 1;
        $save['middlewares'] = json_encode(['auth']);
        Menu::create($save);

        $dd = $dd + 1;
        $save['id']         = $dd;
        $save['parent_id']  = $id;
        $save['name']       = 'Jadwal';
        $save['url']        = null;
        $save['level']      = null;
        $save['type']       = 'admin';
        $save['menu_order'] = 1;
        $save['middlewares'] = json_encode(['auth']);
        Menu::create($save);

        $dd = $dd + 1;
        $save['id']         = $dd;
        $save['parent_id']  = $id;
        $save['name']       = 'Evaluasi & Ujian';
        $save['url']        = null;
        $save['level']      = null;
        $save['type']       = 'admin';
        $save['menu_order'] = 1;
        $save['middlewares'] = json_encode(['auth']);
        Menu::create($save);
    }

    function Management($id)
    {
        $dd = $id;
        $save['id']    = $id;
        $save['name']  = 'Management';
        $save['type']  = 'admin';
        $save['url']   = null;
        $save['level'] = null;
        $save['menu_order'] = 4;
        $save['middlewares'] = json_encode(['auth']);
        Menu::create($save);

        $dd = $dd + 1;
        $save['id']         = $dd;
        $save['parent_id']  = $id;
        $save['name']       = 'Siswa';
        $save['url']        = 'siswa';
        $save['level']      = null;
        $save['type']       = 'admin';
        $save['menu_order'] = 1;
        $save['middlewares'] = json_encode(['auth']);
        Menu::create($save);

        $dd = $dd + 1;
        $save['id']         = $dd;
        $save['parent_id']  = $id;
        $save['name']       = 'Guru';
        $save['url']        = 'guru';
        $save['level']      = null;
        $save['type']       = 'admin';
        $save['menu_order'] = 1;
        $save['middlewares'] = json_encode(['auth']);
        Menu::create($save);

        $dd = $dd + 1;
        $save['id']         = $dd;
        $save['parent_id']  = $id;
        $save['name']       = 'Karyawan';
        $save['url']        = 'karyawan';
        $save['level']      = null;
        $save['type']       = 'admin';
        $save['menu_order'] = 1;
        $save['middlewares'] = json_encode(['auth']);
        Menu::create($save);

        $dd = $dd + 1;
        $save['id']         = $dd;
        $save['parent_id']  = $id;
        $save['name']       = 'Akun User';
        $save['url']        = 'user_account';
        $save['level']      = null;
        $save['type']       = 'admin';
        $save['menu_order'] = 1;
        $save['middlewares'] = json_encode(['auth']);
        $save['view_path']       = 'managament/user_account/';
        $save['view_file']       = 'index';
        Menu::create($save);
    }

    function Master($id)
    {
        $dd = $id;
        $save['id']    = $id;
        $save['name']  = 'Master';
        $save['type']  = 'admin';
        $save['url']   = null;
        $save['level'] = null;
        $save['menu_order'] = 3;
        $save['middlewares'] = json_encode(['auth']);
        Menu::create($save);

        $dd = $dd + 1;
        $save['id']         = $dd;
        $save['parent_id']  = $id;
        $save['name']       = 'Mata Pelajaran';
        $save['url']        = null;
        $save['level']      = null;
        $save['type']       = 'admin';
        $save['menu_order'] = 1;
        $save['middlewares'] = json_encode(['auth']);
        Menu::create($save);

        $dd = $dd + 1;
        $save['id']         = $dd;
        $save['parent_id']  = $id;
        $save['name']       = 'Kurikulum';
        $save['url']        = null;
        $save['level']      = null;
        $save['type']       = 'admin';
        $save['menu_order'] = 1;
        $save['middlewares'] = json_encode(['auth']);
        Menu::create($save);

        $dd = $dd + 1;
        $save['id']         = $dd;
        $save['parent_id']  = $id;
        $save['name']       = 'Tahun Pelajaran';
        $save['url']        = null;
        $save['level']      = null;
        $save['type']       = 'admin';
        $save['menu_order'] = 1;
        $save['middlewares'] = json_encode(['auth']);
        Menu::create($save);

        $dd = $dd + 1;
        $save['id']         = $dd;
        $save['parent_id']  = $id;
        $save['name']       = 'Kelas';
        $save['url']        = null;
        $save['level']      = null;
        $save['type']       = 'admin';
        $save['menu_order'] = 1;
        $save['middlewares'] = json_encode(['auth']);
        Menu::create($save);

        $dd = $dd + 1;
        $save['id']         = $dd;
        $save['parent_id']  = $id;
        $save['name']       = 'Ruang Kelas';
        $save['url']        = null;
        $save['level']      = null;
        $save['type']       = 'admin';
        $save['menu_order'] = 1;
        $save['middlewares'] = json_encode(['auth']);
        Menu::create($save);
    }

    function setting($id)
    {
        $dd = $id;
        $save['id']    = $id;
        $save['name']  = 'Setting';
        $save['url']   = 'setting';
        $save['level'] = null;
        $save['type']  = 'admin';
        $save['menu_order'] = 9;
        $save['middlewares'] = json_encode(['auth']);
        Menu::create($save);

        $dd = $dd + 1;
        $save['id']         = $dd;
        $save['parent_id']  = $id;
        $save['name']       = 'App Settings';
        $save['url']        = null;
        $save['level']      = null;
        $save['type']       = 'admin';
        $save['menu_order'] = 1;
        $save['middlewares'] = json_encode(['auth']);
        $save['view_path']       = 'setting/app/';
        $save['view_file']       = 'index';
        Menu::create($save);
        
        $dd = $dd + 1;
        $save['id']         = $dd;
        $save['parent_id']  = $id;
        $save['name']       = 'Role & Permission';
        $save['url']        = null;
        $save['level']      = null;
        $save['type']       = 'admin';
        $save['menu_order'] = 1;
        $save['middlewares'] = json_encode(['auth']);
        Menu::create($save);

        $dd = $dd + 1;
        $save['id']         = $dd;
        $save['parent_id']  = $id;
        $save['name']       = 'Pengaturan Kurikulum';
        $save['url']        = null;
        $save['level']      = null;
        $save['type']       = 'admin';
        $save['menu_order'] = 1;
        $save['middlewares'] = json_encode(['auth']);
        Menu::create($save);
    }
}
