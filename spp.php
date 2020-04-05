<?php

$data = $crud->tampilAll("SELECT * FROM spp");


?>


<div class="container">
    <div class="card">
        <div class="card-body">
        <div class="container-fluid w-auto">
    <?php $crud::flashdata("success","Data berhasil ditambahkan"); ?>
<a href="tambah_data_spp.php" class="btn btn-info mx-2">Tambah Data Spp</a>
    <table class="table table-responsive table-striped table-lg mt-5" >
        <thead>
            <th>No</th>
            <th>nominal</th>
            <th>tahun</th>
            <th>action</th>
        </thead>
        <?php
        $no = 1;
        foreach ($data as $key) {
        ?>
        <tbody>
            <td><?= $no++ ?></td>
            <td><?= $key['nominal'] ?></td>
            <td><?= $key['tahun'] ?></td>
            <td>
            <a href="edit_spp.php?edit=<?= $key['id_spp'] ?>" class="btn btn-primary"> Edit </a>
            <a onclick="confirm('Apakah Ingin Menghapus?');" href="?menu=spp&hapus=<?= $key['id_spp'] ?>" class="btn btn-danger"> Hapus </a>
            </td>
        </tbody>
        <?php } 
        
        if (isset($_GET['hapus'])) {
            $id = $_GET['hapus'];

          $hapus =$crud->hapus("spp", 'id_spp', $id );
    
            if ($hapus) {
                $crud::set_flashdata("success","Data berhasil dihapus");
                echo "<script>location='index.php?menu=spp'</script>";
            }
            else
            {
                $crud::set_flashdata("danger","Data tidak berhasil dihapus");
                echo "<script>location='index.php?menu=spp'</script>";
            }
        }
       
        
        ?>
    </table>
</div>
        </div>
    </div>
</div>