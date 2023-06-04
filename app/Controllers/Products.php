<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ProductModel;

class Products extends ResourceController
{
    protected $format       = 'json';
    protected $modelName   = ProductModel::class;

    public function index()
    {
        $data = $this->model->findAll();
        return $this->respond($data);
    }

    public function show($id = null)
    {
        $data = $this->model->find($id);
        return $this->respond($data);
    }

    public function create()
    {
        $data = $this->request->getPost();
        $this->model->insert($data);
        $response = [
            'status' => 201,
            'message' => 'Data has been created'
        ];
        return $this->respondCreated($response);
    }

    public function update($id = null)
    {
        $data = $this->request->getRawInput();
        $this->model->update($id, $data);
        $response = [
            'status' => 200,
            'message' => 'Data has been updated'
        ];
        return $this->respond($response);
    }

    public function delete($id = null)
    {
        $this->model->delete($id);
        $response = [
            'status' => 200,
            'message' => 'Data has been deleted'
        ];
        return $this->respondDeleted($response);
    }
}
