<?php

$sql = "SELECT * FROM pembayaran as p JOIN petugas as pe
ON pe.id_petugas=p.id_petugas JOIN spp ON spp.id_spp = p.id_spp
";

if($tampil = $crud->tampilAll($sql)):
    $tampil = $crud->tampilAll($sql);
    $nisn = $tampil[0]["nisn"];

    $sql2 = "SELECT * FROM siswa WHERE nisn=$nisn";
    $siswa = $crud->tampilAll($sql2);
endif;




?>


<div class="container">
<h2 class="text-center mb-5">History pembayaran</h2>
<?php crud::flashdata(); ?>
<?php 
if(!$_SESSION['user']['level'] == 'siswa' ):
?>
<a href="index.php?menu=entri" class="btn btn-info mb-3">Tambah Data Pembayaran</a>
<?php endif;?>
    <table class="table table-sm table-responsive">
        <thead>
        <tr>
            <th>No</th>
            <th>Nisn</th>
            <th>Nama siswa</th>
            <th>Tanggal Bayar</th>
            <th>Bulan Bayar</th>
            <th>Tahun Bayar</th>
            <th>Nominal SPP</th>
            <th>jumlah Bayar</th>
            <th>Nama Petugas</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php 
        $no = 1;
        foreach ($tampil as $t ) {  
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $t['nisn']; ?></td>
            <td><?= $siswa[0]['nama']; ?></td>
            <td><?= $t['tgl_bayar']; ?></td>
            <td><?= $t['bulan_bayar']; ?></td>
            <td><?= $t['tahun_bayar']; ?></td>
            <td><?= $t['nominal']; ?></td>
            <td><?= $t['jumlah_bayar']; ?></td>
            <td><?= $t['nama_petugas']; ?></td>
            <?php
            if($tampil[0]['jumlah_bayar'] == $tampil[0]['nominal']):
                echo '<td>Lunas</td>';
            else:
                echo '<td>Belum lunas</td>';
            endif;
            ?>
            <?php if ($_SESSION['user']['level'] != 'siswa') {
                ?>
                <td>
                   <a href="edit_pembayaran.php?edit=<?= $t['id_pembayaran'] ?>" class="btn btn-primary btn-sm" >Edit</a>
                   <a onclick="confirm('Yakin ingin menghapus?');" href="?menu=history_pembayaran&hapus=<?=$t['id_pembayaran'] ?>" class="btn btn-danger btn-sm" >Hapus</a>
                </td>
           <?php } ?>
            <td>
         

            </td>
        </tr>

        <?php } ?>
        <?php
        if (isset($_GET['hapus'])) {
           $id = $_GET['hapus'];

          $hapus =$crud->hapus("pembayaran", 'id_pembayaran', $id );
            print_r($id);
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

        </tbody>
    </table>

</div>