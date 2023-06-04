<?php

namespace App\Controllers;

use App\Models\UserDatatable;
use Config\Services;



class User extends BaseController
{

    public function index()
    {
        $data = [
            'title' => 'User List'
        ];

        return view('datatable', $data);
    }

    public function ajaxList()
    {
        $request = Services::request();
        $datatable = new UserDatatable($request);

        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatables();
            $data = [];
            $no = $request->getPost('start');

            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->nama_siswa;
                $row[] = $list->alamat;
                $data[] = $row;
            }

            $output = [
                'draw' => $request->getPost('draw'),
                'recordsTotal' => $datatable->countAll(),
                'recordsFiltered' => $datatable->countFiltered(),
                'data' => $data
            ];

            echo json_encode($output);
        }
    }

    public function alpine()
    {
        return view('alpine');
    }
}
