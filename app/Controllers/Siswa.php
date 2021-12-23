<?php namespace App\Controllers;
use App\Models\ModelSiswa;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;

class Siswa extends BaseController
{
	public function __construct(){
		$this->siswa = new ModelSiswa();
	}
	public function index(){
		$data['Siswa'] = $this->siswa->findAll();
		echo view('data_siswa',$data);
	}
	public function simpanExcel()
		{
			$file_excel = $this->request->getFile('fileexcel');
			$ext = $file_excel->getClientExtension();
			if($ext == 'xls') {
				$render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
			} else {
				$render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}
			$spreadsheet = $render->load($file_excel);
	
			$data = $spreadsheet->getActiveSheet()->toArray();
			foreach($data as $x => $row) {
				if ($x == 0) {
					continue;
				}
				
				$Nis = $row[0];
				$NamaSiswa = $row[1];
				$Alamat = $row[2];
	
				$db = \Config\Database::connect();

				$cekNis = $db->table('siswa')->getWhere(['nis'=>$Nis])->getResult();

				if(count($cekNis) > 0) {
					session()->setFlashdata('message','<b style="color:red">Data Gagal di Import NIS ada yang sama</b>');
				} else {
                    $Alamat = password_hash($Alamat, PASSWORD_DEFAULT);
                    dd($Alamat);
				$simpandata = [
					'nis' => $Nis, 'nama_siswa' => $NamaSiswa, 'alamat'=> $Alamat
				];
	
				$db->table('siswa')->insert($simpandata);
				session()->setFlashdata('message','Berhasil import excel'); 
			}
		}
			
			return redirect()->to('/siswa');
		}

        public function exportExcel()
		{
			$sisw = $this->siswa->findAll();
	
			$spreadsheet = new Spreadsheet();
	
			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('A1', 'NIS')
				->setCellValue('B1', 'Nama Siswa')
				->setCellValue('C1', 'Alamat');
	
			$column = 2;
	
			foreach ($sisw as $sisdata) {
				$spreadsheet->setActiveSheetIndex(0)
					->setCellValue('A' . $column, $sisdata['nis'])
					->setCellValue('B' . $column, $sisdata['nama_siswa'])
					->setCellValue('C' . $column, $sisdata['alamat']);
	
				$column++;
			}
            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(120, 'pt');
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(200, 'pt');
	
            $spreadsheet->getActiveSheet()->getStyle('A1:C1')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('ffdedddd');

            $writer = new Xlsx($spreadsheet);
            $file_name = 'data.xlsx';

		$writer->save($file_name);

		header("Content-Type: application/vnd.ms-excel");

		header('Content-Disposition: attachment; filename="' . basename($file_name) . '"');

		header('Expires: 0');

		header('Cache-Control: must-revalidate');

		header('Pragma: public');

		header('Content-Length:' . filesize($file_name));

		flush();

		readfile($file_name);

		exit;
		}

        public function simpanpdf()
    {
        $filename = date('y-m-d-H-i-s'). '-qadr-labs-report';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $data['Siswa'] = $this->siswa->findAll();
        $dompdf->loadHtml(view('data_siswa',$data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename);
    }

    public function cekpassword() {
        $password = 'Jakarta 6';
        $dikunci = password_hash($password, PASSWORD_DEFAULT);
        // $dikunci = '$2y$10$hE05EJk9bTwBldyYUSXsv.lW8pUebaJlJpJkBOOqhC.d0ppOAgUfy';
        echo $dikunci;
        echo '<hr>';
        if(password_verify($password, $dikunci)) {
           echo 'Password cocok';
        } else {
            echo 'Password tidak cocok';
        }

    }
	
} 
