<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class AjaxModel extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nis', 'nama_siswa', 'alamat'];
}