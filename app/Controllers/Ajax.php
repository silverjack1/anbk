<?php
 
namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\AjaxModel;
 
class Ajax extends ResourceController
{
    use ResponseTrait;
    // all users
    public function index()
    {
        $model = new AjaxModel();
        $data['user'] = $model->findAll();
        return $this->respond($data);
    }
    public function delete($id = null)
    {
        $model = new AjaxModel();
        $data = $model->where('id', $id)->delete($id);
      
        if ($model->db->affectedRows() !== 0) {
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data produk berhasil dihapus.'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }

    public function show($id = null)
    {
        $model = new AjaxModel();
        $data = $model->where('id', $id)->first();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }
 // create
 public function create()
 {
     $model = new AjaxModel();
     $data = [
         'nis' => $this->request->getVar('nis'),
         'nama_siswa'  => $this->request->getVar('nama_siswa'),
         'alamat'  => $this->request->getVar('alamat'),
     ];
     $model->insert($data);
     $response = [
         'status'   => 201,
         'error'    => null,
         'messages' => [
             'success' => 'Data produk berhasil ditambahkan.'
         ]
     ];
     return $this->respondCreated($response);
 }
}