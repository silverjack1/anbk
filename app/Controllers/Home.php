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

public function inputcek(){
    $data['judul']='Input';
    return view('input',$data);
}

public function enkripsi(){
    // Storing a string into the variable which 
// needs to be Encrypted 
$simple_string = "Andika";

// Displaying the original string 
echo "Original String: " . $simple_string;

// Storingthe cipher method 
$ciphering = "AES-128-CTR";

// Using OpenSSl Encryption method 
// $iv_length = openssl_cipher_iv_length($ciphering);
$options   = 0;

// Non-NULL Initialization Vector for encryption 
$encryption_iv = '1234567891011121';

// Storing the encryption key 
$encryption_key = "jakarta";

// Using openssl_encrypt() function to encrypt the data 
$encryption = openssl_encrypt($simple_string, $ciphering, $encryption_key, $options, $encryption_iv);

// Displaying the encrypted string 
echo $encryption;

}
public function denkripsi($key){
  // Non-NULL Initialization Vector for decryption 
$decryption_iv = '1234567891011121';
$ciphering = "AES-128-CTR";
$options   = 0;
// Storing the decryption key 
$decryption_key = "jakarta";

// Using openssl_decrypt() function to decrypt the data 
$decryption = openssl_decrypt($key, $ciphering, $decryption_key, $options, $decryption_iv);

// Displaying the decrypted string 
echo "Decrypted String: " . $decryption;  
}
}
