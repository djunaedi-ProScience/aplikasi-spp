<?php

$data = $crud->tampilAll("SELECT * FROM kelas");


?>


<div class="container">
    <div class="card">
        <div class="card-body">
        <div class="container-fluid w-auto">
    <?php $crud::flashdata("success","Data berhasil ditambahkan"); ?>
<a href="tambah_data_kelas.php" class="btn btn-info mx-2">Tambah Data petugas</a>
    <table class="table table-responsive table-striped table-lg mt-5" >
        <thead>
            <th>No</th>
            <th>Nama Kelas</th>
            <th>Level</th>
            <th>action</th>
        </thead>
        <?php
        $no = 1;
        foreach ($data as $key) {
        ?>
        <tbody>
            <td><?= $no++ ?></td>
            <td><?= $key['nama_kelas'] ?></td>
            <td><?= $key['kompetensi_keahlian'] ?></td>
            <td>
            <a href="edit_kelas.php?edit=<?= $key['id_kelas'] ?>" class="btn btn-primary"> Edit </a>
            <a onclick="confirm('Apakah Ingin Menghapus?');" href="?menu=kelas&hapus=<?= $key['id_kelas'] ?>" class="btn btn-danger"> Hapus </a>
            </td>
        </tbody>
        <?php } 
        
        if (isset($_GET['hapus'])) {
            $id = $_GET['hapus'];

          $hapus =$crud->hapus("kelas", 'id_kelas', $id );
    
            if ($hapus) {
                $crud::set_flashdata("success","Data berhasil dihapus");
                echo "<script>location='index.php?menu=petugas'</script>";
            }
            else
            {
                $crud::set_flashdata("danger","Data tidak berhasil dihapus");
                echo "<script>location='index.php?menu=petugas'</script>";
            }
        }
       
        
        ?>
    </table>
</div>
        </div>
    </div>
</div>