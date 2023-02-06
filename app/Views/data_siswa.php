<!DOCTYPE html>
<html lang="en">

<head>
    <title>Import Excel Codeigniter</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-3">
        <?php
		if(session()->getFlashdata('message')){
			?>
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?= session()->getFlashdata('message') ?>
        </div>
        <?php
		}
		?>
        <form method="post" action="<?=base_url()?>/siswa/simpanExcel" enctype="multipart/form-data">
            <div class="form-group">
                <label>File Excel</label>
                <input type="file" name="fileexcel" class="form-control" id="file" required accept=".xls, .xlsx" /></p>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Upload</button>
            </div>
        </form>
        <table class="table table-bordered" id="user">
            <thead>
                <tr>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Alamat Siswa</th>
                </tr>
            </thead>
            <tbody id="contactTable">
                <?php
			if(!empty($Siswa)){
				foreach($Siswa as $dt){
				?>
                <tr>
                    <td><?= $dt['nis'] ?></td>
                    <td><?= $dt['nama_siswa'] ?></td>
                    <td><?= $dt['alamat'] ?></td>
                </tr>
                <?php
				}
			}else{
			?>
                <tr>
                    <td colspan="3">Tidak ada data</td>
                </tr>
                <?php
			}
			?>
            </tbody>
        </table>
    </div>
    <a href="<?php echo base_url('siswa/simpanpdf') ?>">
        Download PDF
    </a>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.13.2/r-2.4.0/datatables.min.css" />

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.13.2/r-2.4.0/datatables.min.js">
    </script>
    <script>
    $(document).ready(function() {
        $('#user').DataTable();
    });
    </script>
</body>

</html>