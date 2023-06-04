<?php

namespace App\Controllers;

class Rapor extends BaseController
{
    public function __construct()
    {
        $custom = [
            'DSN'      => '',
            'hostname' => 'localhost',
            'username' => 'root',
            'password' => '',
            'database' => 'rapor',
            'DBDriver' => 'MySQLi',
            'DBPrefix' => '',
            'pConnect' => false,
            'DBDebug'  => true,
            'charset'  => 'utf8',
            'DBCollat' => 'utf8_general_ci',
            'swapPre'  => '',
            'encrypt'  => false,
            'compress' => false,
            'strictOn' => false,
            'failover' => [],
            'port'     => 3306,
        ];

        $this->db = \Config\Database::connect($custom);
    }

    public function index()
    {
        $query = $this->db->query("SELECT *
        FROM nilai_rapor n
        INNER JOIN siswa s ON n.siswa_id = s.id ORDER BY n.siswa_id
        ");
        $result = $query->getResultArray();
        function deepSort(&$arr, $cb)
        {
            $cb($arr);
            foreach ($arr as $k => $v) {
                if (is_array($v)) {
                    deepSort($arr[$k], $cb);
                }
            }
        }
        deepSort($result, 'asort');
        $data_nilai = [];
        foreach ($result as $item) {
            $id = $item['siswa_id'];
            $nama = $item['nama'];
            $semester = $item['semester'];
            $mata_pelajaran = $item['mata_pelajaran'];
            $nilai = $item['nilai_angka'];
            $kelas = $item['kelas'];

            // Jika data nilai belum ada pada array, tambahkan
            if (!isset($data_nilai[$id][$kelas][$semester][$mata_pelajaran])) {
                $data_nilai[$id][$kelas][$semester][$mata_pelajaran] = array();
            }

            // Tambahkan data nilai pada array
            $data_nilai[$id]['nama'] = $nama;
            $data_nilai[$id]['id'] = $id;
            array_push($data_nilai[$id][$kelas][$semester][$mata_pelajaran], $nilai);
        }
        $data['daftarnilai'] = $data_nilai;
        return view('rapor/daftarnilai', $data);
    }

    public function diagram()
    {
        $query = $this->db->query("SELECT siswa_id, siswa.nama as siswa, mata_pelajaran as mapel, round((nilai_angka),1) as nilai
        FROM nilai_rapor n 
        INNER JOIN siswa ON n.siswa_id = siswa.id 
        where mata_pelajaran=1
        group by siswa_id, mata_pelajaran");
        $result = $query->getResultArray();
        $data['label'] = json_encode(array_column($result, 'siswa'));
        $data['nilai'] = json_encode(array_column($result, 'nilai'));

        return view('rapor/graph', $data);
    }
    public function data()
    {
        $butuh = ['kelas', 'tahun_ajaran', 'semester', 'mata_pelajaran'];
        $data = [];
        foreach ($butuh as $b) {
            $query = $this->db->query("SELECT DISTINCT $b FROM nilai_rapor");
            $result = $query->getResultArray();
            $data[$b] = $result;
        }
        foreach ($data['mata_pelajaran'] as $m) {
            foreach ($m as $n) {
                echo $n;
            }
        }
    }

    public function qrcode()
    {
        echo "ok";
    }
}
