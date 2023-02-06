<table class="table table-bordered">
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