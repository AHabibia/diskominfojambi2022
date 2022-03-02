<div class="col d-flex justify-content-center">
    <div class="card" style="width: 90%">
        <div class="card-header bg-black text-white ">
            <h3>List Data Pegawai</h3>
            <h5>Diambil Dari Api</h5>
        </div>
    </div>
</div>
<table class="table table-bordered border-primary" align="center">
    <thead>
        <tr>
            <th>NIP</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Golongan</th>
            <th>Jabatan</th>
            <th>Unit Kerja</th>
            <th>Status Pegawai</th>
            <th>Status Aktif</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $link = file_get_contents("https://api.jambiprov.go.id/pegawai");
        $api = json_decode($link, TRUE);
        if (count($api) > 0) {
            for ($no = 0; $no < count($api); $no++) {
                $link = $api[$no]['nip'];
                echo '
						<tr>. 
							<td><a href ="https://api.jambiprov.go.id/pegawai/pegawai/nip/' . $link . '">' . $api[$no]['nip']        . '</td></a>
							<td><a href ="https://api.jambiprov.go.id/pegawai/pegawai/nip/' . $link . '">' . $api[$no]['nama']       . '</td></a>
							<td>' . $api[$no]['jenkel']     . '</td>
							<td>' . $api[$no]['tgl_lahir']  . '</td>
							<td>' . $api[$no]['golongan']   . '</td>
							<td>' . $api[$no]['jabatan']    . '</td>
							<td>' . $api[$no]['unit_kerja'] . '</td>
							<td>' . $api[$no]['status_pegawai'] . '</td>
							<td>' . $api[$no]['status_aktif']         . '</td>
						
						</tr>
						';
                $no++;
            }
        }
        ?>
        </td>
        </tr>
    </tbody>
</table>