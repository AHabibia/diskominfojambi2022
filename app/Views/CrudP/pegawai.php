 <div class="mx-auto" style="width: 90%;">
     <div class="card">
         <div class="card-header bg-black text-white ">
             <h3>List Data Pegawai</h3>
             <h5>Diambil Dari Database</h5>
         </div>
     </div>
     <button type="button " class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
         <i class="material-icons">&#xE147;</i> <span>+ Tambah Data Pegawai</span>
     </button>
     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-scrollable" id="scrollmodall">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data Pegawai</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body" id="modallbody">
                     <div class="alert alert-info sukses" role="alert" style="display: none;">
                     </div>
                     <div class="alert alert-danger error" role="alert" style="display: none;">
                     </div>
                     <div class="mb-3 row">
                         <label for="inputNIP" class="col-sm-2 col-form-label">NIP</label>
                         <div class="col-sm-10">
                             <input type="number" class="form-control" id="iNIP" name="iNIP">
                         </div><button type="button" class="btn btn" id="tbCek">Cek</button>
                     </div>
                     <div class="mb-3 row">
                         <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
                         <input class="form-control" type="text" value="" +$Nama aria-label="Disabled input example" disabled readonly id="iNama">
                     </div>
                     <div class="mb-3 row">
                         <label for="inputJK" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                         <input class="form-control" type="text" value="" aria-label="Disabled input example" disabled readonly id="iJK">
                     </div>
                     <div class="mb-3 row">
                         <label for="inputTL" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                         <input class="form-control" type="text" value="" aria-label="Disabled input example" disabled readonly id="iTL">
                     </div>
                     <div class="mb-3 row">
                         <label for="inputGol" class="col-sm-2 col-form-label">Golongan</label>
                         <input class="form-control" type="text" value="" aria-label="Disabled input example" disabled readonly id="iGol">
                     </div>
                     <div class="mb-3 row">
                         <label for="inputJab" class="col-sm-2 col-form-label">Jabatan</label>
                         <input class="form-control" type="text" value="" aria-label="Disabled input example" disabled readonly id="iJab">
                     </div>
                     <div class="mb-3 row">
                         <label for="inputUK" class="col-sm-2 col-form-label">Unit Kerja</label>
                         <input class="form-control" type="text" value="" aria-label="Disabled input example" disabled readonly id="iUK">
                     </div>
                     <div class="mb-3 row">
                         <label for="inputKes" class="col-sm-2 col-form-label">Kesempatan</label>
                         <input class="form-control" type="text" value="" aria-label="" disabled readonly id="iKes">
                     </div>
                     <div class="mb-3 row">
                         <label for="inputSP" class="col-sm-2 col-form-label">Status Pegawai</label>
                         <input class="form-control" type="text" value="" aria-label="Disabled input example" disabled readonly id="iSP">
                     </div>
                     <div class="mb-3 row">
                         <label for="inputSA" class="col-sm-2 col-form-label">Status Aktif</label>
                         <div class="col-sm-10"><input class="form-control" type="text" value="" aria-label="Disabled input example" disabled readonly id="iSA">
                         </div>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                         <button type="button" class="btn btn-primary" id="tbTambah">Tambah</button>
                     </div>
                 </div>
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
                 <th>Ubah</th>
                 <th>Hapus</th>
             </tr>
             <td>
                 <a href="edit" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
             </td>
             <td><a href="hapus" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
             </td>
         </thead>
 </div>


 <script>
     $('#tbCek').on('click', function() {
         var $vNIP = $('#iNIP').val();
         if ($vNIP > 0) {
             $.ajax({
                 url: "<?php echo base_url(); ?>/pegawaicrud/cek/",
                 type: "post",
                 data: {
                     'vNIP': $vNIP
                 },
                 success: function(hasil) {
                     var $obj = $.parseJSON(hasil);
                     $NIP = $('.NIP');
                     $Nama = $('.Nama').val();
                     console.log($Nama);
                 },
             });

         }
     })
 </script>