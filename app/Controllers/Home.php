<?php

namespace App\Controllers;
use App\Models\ModelSiswa;


class Home extends BaseController
{
    public function __construct(){
		$this->model = new ModelSiswa();
        $this->db =  \Config\Database::connect();
	}
    
    public function index()
    {
        $data['menu'] = 'Dashboard';
        return view('user/index', $data);
    }

    public function login()
    {
        $data['menu'] = 'Dashboard';
        return view('auth/login', $data);
    }
    public function register()
    {
        $data['menu'] = 'Dashboard';
        return view('auth/register', $data);
    }
    public function user()
    {
        $data['menu'] = 'Dashboard';
        return view('user/index', $data);
    }
    public function tulis()
    {
        $data['post'] = $this->request->getPost('name');
        $data['siswa'] = $this->model->findAll();
        return view('siswa',$data);
    }
    public function baca()
    {        
        $id = 5;
        $nama = 'Slamet';
        $this->model->where('id', $id)
        ->set(['nama_siswa' => $nama])
        ->update();

    }
    public function json()
    {        
        $json = $this->model->findAll();
        // return json_encode($json);
        return json_encode($json);

    }

    public function hapus ($id) {
        // $this->model->where('id', $id)->delete();
    }
    public function hapusdata () {
        
        // $json = $this->model->findAll();
        // return json_encode($json);

        // echo $_POST['id'];
        // echo $this->request->getPost('nama');
        $id = $this->request->getPost('id');
        $this->model->where('id', $id)->delete();
    }

    public function join(){
        $builder = $this->db->table('siswa');    
        $builder->select('*');
        $builder->join('users', 'users.id = siswa.id');    
        $query = $builder->get()->getResult();
        dd($query);
    }

    public function cetak(){
        $newdata = [
            'basd'  => 'Muhammad Dian Nafi',
            'sfs'     => 'johndoe@some-site.com',
            'logsfdsn' => true,
        ];
        
        $this->session->set($newdata);
        // dd($this->session->get());
        $log=$this->session->get('logsfdsn');
        echo $log;
        if ($log == 1) {
            echo '<hr>'.'login';
        } else {
            echo 'not ';
        }
       
    }
    public function update(){
        $builder = $this->db->table('siswa'); 
        $builder->set('nama_siswa', $this->request->getVar('nama'));
$builder->where('id', $this->request->getVar('id'));
$builder->update();
    }

    public function tampilhtml(){     
        $html = [];
        for ($i = 10;$i<100;$i++) {
            $html[] = '<li class="list-group-item">'.'Nomor '.$i.'</li>';
         }
        echo json_encode(['data'=>$html]);
}
}
