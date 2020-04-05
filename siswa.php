<?php
$sql = "SELECT * FROM siswa as s JOIN kelas as k ON k.id_kelas=s.id_kelas ";
$data = $crud->tampilAll($sql);


?>



<div class="container">

    <?php $crud::flashdata("success","Data berhasil ditambahkan"); ?>
<a href="tambah_data_siswa.php" class="btn btn-info mx-2">Tambah Data</a>
    <table class="table table-responsive table-striped mx-auto" >
        <thead>
            <th>No</th>
            <th>Nisn</th>
            <th>Nama</th>
            <th>kelas</th>
            <th>action</th>
        </thead>
        <?php
        $no = 1;
        foreach ($data as $key) {
        ?>
        <tbody>
            <td><?= $no++ ?></td>
            <td><?= $key['nisn'] ?></td>
            <td><?= $key['nama'] ?></td>
            <td><?= $key['nama_kelas'] ?></td>
            <td>
            <a href="edit.php?edit=<?= $key['nisn'] ?>" class="btn btn-primary"> Edit </a>
            <a onclick="confirm('Yakin ingin menghapus?');" href="?menu=siswa&hapus=<?= $key['id_siswa'] ?>" class="btn btn-danger"> Hapus </a>
            </td>
        </tbody>
        <?php } 
        
        if (isset($_GET['hapus'])) {
            $id = $_GET['hapus'];

          $hapus =$crud->hapus("siswa", 'id_siswa', $id );
    
            if ($hapus) {
                $crud::set_flashdata("success","Data berhasil dihapus");
                echo "<script>location='index.php?menu=siswa'</script>";
            }
            else
            {
                $crud::set_flashdata("danger","Data tidak berhasil dihapus");
                echo "<script>location='index.php?menu=siswa'</script>";
            }
        }
       
        
        ?>
    </table>
</div>