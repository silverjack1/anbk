<?php

namespace App\Controllers;

use CodeIgniter\Controller;


class Quiz extends BaseController
{

    public function __construct()
    {
        $this->request = \Config\Services::request();
    }
    public function index()
    {
        $data['tes_id'] = 10;
        $data['tes_user_id'] = 15;
        $data['tes_daftar_soal'] = 2;
        $data['tes_soal_jml'] = 4;
        $data['tes_soal'] = 1;
        $data['tes_ragu'] = 10;
        $data['tes_soal_id'] = 1;
        $data['tes_soal_nomor'] = 2;
        $data['tes_soal'] = "Soal pertama";
        return view('quiz', $data);
    }
    public function simpanjawaban()
    {

        $errors = [];
        $data = [];


        $data['success'] = true;
        $data['message'] = 'Success!';


        echo json_encode($data);
    }
}
