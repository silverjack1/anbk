<?php namespace App\Models;
use CodeIgniter\Model;
class ModelSiswa extends Model
{
	protected $db;
	protected $table = 'siswa';
	protected $primaryKey = 'nis';
	protected $allowedFields =['nama_siswa','alamat'];

	
}