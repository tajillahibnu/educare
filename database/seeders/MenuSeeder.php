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
        $menuNumber = 1;
        $this->dashboard(1,$menuNumber);
        $menuNumber++;
        $this->data(20,$menuNumber);
        $menuNumber++;
        $this->Kelas(30,$menuNumber);
        $menuNumber++;
        $this->Kurikulum(40,$menuNumber);
        $menuNumber++;
        $this->Management(50,$menuNumber);
        $menuNumber++;
        $this->Master(80,$menuNumber);
        $menuNumber++;
        $this->setting(90,$menuNumber);
    }

    function dashboard($id,$menuNumber)
    {

        $save['id']    = $id;
        $save['name']  = 'Dashboard';
        $save['type']  = 'admin';
        $save['url']   = 'dashboard';
        $save['view_path']  = 'dashboard/';
        $save['view_file']  = 'table';
        $save['level'] = null;
        $save['menu_order'] = $menuNumber;
        $save['middlewares'] = json_encode(['auth']);
        Menu::create($save);
    }

    function data($id,$menuNumber)
    {
        $dd = $id;
        $save['id']    = $id;
        $save['name']  = 'Data';
        $save['type']  = 'admin';
        $save['url']   = null;
        $save['level'] = null;
        $save['menu_order'] = $menuNumber;
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

    function Kurikulum($id,$menuNumber)
    {
        $order = 1;
        $dd = $id;
        $save['id']    = $id;
        $save['name']  = 'Kurikulum';
        $save['type']  = 'admin';
        $save['url']   = null;
        $save['level'] = null;
        $save['menu_order'] = $menuNumber;
        $save['middlewares'] = json_encode(['auth']);
        Menu::create($save);

        $dd = $dd + 1;
        $save['id']         = $dd;
        $save['parent_id']  = $id;
        $save['name']       = 'Master Kurikulum';
        $save['url']        = null;
        $save['level']      = null;
        $save['type']       = 'admin';
        $save['menu_order'] = $order++;
        $save['middlewares'] = json_encode(['auth']);
        $save['view_path']       = 'kurikulum/master/';
        $save['view_file']       = 'index';
        Menu::create($save);

        $dd = $dd + 1;
        $save['id']         = $dd;
        $save['parent_id']  = $id;
        $save['name']       = 'Mapel Tingkat';
        $save['url']        = null;
        $save['level']      = null;
        $save['type']       = 'admin';
        $save['menu_order'] = $order++;
        $save['middlewares'] = json_encode(['auth']);
        Menu::create($save);
    }
    function kelas($id,$menuNumber)
    {
        $order = 1;
        $dd = $id;
        $save['id']    = $id;
        $save['name']  = 'Kelas';
        $save['type']  = 'admin';
        $save['url']   = null;
        $save['level'] = null;
        $save['menu_order'] = $menuNumber;
        $save['middlewares'] = json_encode(['auth']);
        Menu::create($save);

        $dd = $dd + 1;
        $save['id']         = $dd;
        $save['parent_id']  = $id;
        $save['name']       = 'Master Kelas';
        $save['url']        = null;
        $save['level']      = null;
        $save['type']       = 'admin';
        $save['menu_order'] = $order++;
        $save['middlewares'] = json_encode(['auth']);
        Menu::create($save);

        $dd = $dd + 1;
        $save['id']         = $dd;
        $save['parent_id']  = $id;
        $save['name']       = 'Ruang Kelas';
        $save['url']        = null;
        $save['level']      = null;
        $save['type']       = 'admin';
        $save['menu_order'] = $order++;
        $save['middlewares'] = json_encode(['auth']);
        Menu::create($save);
    }

    function Management($id,$menuNumber)
    {
        $order = 1;
        $dd = $id;
        $save['id']    = $id;
        $save['name']  = 'Management';
        $save['type']  = 'admin';
        $save['url']   = null;
        $save['level'] = null;
        $save['menu_order'] = $menuNumber;
        $save['middlewares'] = json_encode(['auth']);
        Menu::create($save);

        $dd = $dd + 1;
        $save['id']         = $dd;
        $save['parent_id']  = $id;
        $save['name']       = 'Siswa';
        $save['url']        = 'siswa';
        $save['level']      = null;
        $save['type']       = 'admin';
        $save['menu_order'] = $order++;
        $save['view_path']       = 'managament/siswa/';
        $save['view_file']       = 'index';
        Menu::create($save);

        $dd = $dd + 1;
        $save['id']         = $dd;
        $save['parent_id']  = $id;
        $save['name']       = 'Karyawan';
        $save['url']        = 'karyawan';
        $save['level']      = null;
        $save['type']       = 'admin';
        $save['menu_order'] = $order++;
        $save['view_path']       = 'managament/karyawan/';
        $save['view_file']       = 'index';
        Menu::create($save);

        $dd = $dd + 1;
        $save['id']         = $dd;
        $save['parent_id']  = $id;
        $save['name']       = 'Akun User';
        $save['url']        = 'user_account';
        $save['level']      = null;
        $save['type']       = 'admin';
        $save['menu_order'] = $order++;
        $save['view_path']       = 'managament/user_account/';
        $save['view_file']       = 'index';
        Menu::create($save);

        $dd = $dd + 1;
        $save['id']         = $dd;
        $save['parent_id']  = $id;
        $save['name']       = 'Menu';
        $save['url']        = 'menu';
        $save['level']      = null;
        $save['type']       = 'admin';
        $save['menu_order'] = $order++;
        $save['view_path']       = 'managament/menu/';
        $save['view_file']       = 'index';
        Menu::create($save);
    }

    function Master($id,$menuNumber)
    {
        $order = 1;

        $dd = $id;
        $save['id']    = $id;
        $save['name']  = 'Master';
        $save['type']  = 'admin';
        $save['url']   = null;
        $save['level'] = null;
        $save['menu_order'] = $menuNumber;
        $save['middlewares'] = json_encode(['auth']);
        Menu::create($save);

        $dd = $dd + 1;
        $save['id']         = $dd;
        $save['parent_id']  = $id;
        $save['name']       = 'Mata Pelajaran';
        $save['url']        = null;
        $save['level']      = null;
        $save['type']       = 'admin';
        $save['menu_order'] = $order++;
        $save['middlewares'] = json_encode(['auth']);
        $save['view_path']       = 'master/mapel/';
        $save['view_file']       = 'index';
        Menu::create($save);

        $dd = $dd + 1;
        $save['id']         = $dd;
        $save['parent_id']  = $id;
        $save['name']       = 'Tahun Pelajaran';
        $save['url']        = null;
        $save['level']      = null;
        $save['type']       = 'admin';
        $save['menu_order'] = $order++;
        $save['view_path']       = 'master/tahun_pelajaran/';
        $save['view_file']       = 'index';
        Menu::create($save);

        $dd = $dd + 1;
        $save['id']         = $dd;
        $save['parent_id']  = $id;
        $save['name']       = 'Role';
        $save['url']        = 'master_role';
        $save['level']      = 1;
        $save['type']       = 'admin';
        $save['menu_order'] = $order++;
        $save['view_path']       = 'master/role/';
        $save['view_file']       = 'index';
        Menu::create($save);
    }

    function setting($id,$menuNumber)
    {
        $dd = $id;
        $save['id']    = $id;
        $save['name']  = 'Setting';
        $save['url']   = 'setting';
        $save['level'] = null;
        $save['type']  = 'admin';
        $save['menu_order'] = $menuNumber;
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
