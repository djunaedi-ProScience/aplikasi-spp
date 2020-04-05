<?php include "assets/templates/header.php";?>


<?php

$data = $crud->tampilAll("SELECT * FROM spp");

$sql = "SELECT * FROM pembayaran WHERE id_pembayaran=$_GET[edit]";
$tampil = $crud->tampilAll($sql);

?>


<div class="container">
        <h3 class="text-center">Edit Pembayaran</h3>
        <form action="" method="post">
        <div class="form-group">
            <label for="siswa">Nisn</label>
            <input class="form-control border" type="text" value = "<?= $tampil[0]['nisn'] ?>" name="nisn" id="">
        </div>
        <div class="form-group">
            <label for="pembayaran">bayar</label>
            <input class="form-control border" type="text" value = "<?= $tampil[0]['jumlah_bayar'] ?>" name="bayar" id="">
        </div>
        <div class="form-group">
            <label for="siswa">tanggal bayar</label>
            <input class="form-control border" type="date" value = "<?= $tampil[0]['tgl_bayar'] ?>" name="tgl" id="">
        </div>
        <div class="form-group">
            <label for="pembayaran">bulan bayar</label>
            <input class="form-control border" type="text" value = "<?= $tampil[0]['bulan_bayar'] ?>" name="bulan" id="">
        </div>
        <div class="form-group">
            <label for="pembayaran">tahun bayar</label>
            <input class="form-control border" type="text" value = "<?= $tampil[0]['tahun_bayar'] ?>" name="tahun" id="">
        </div>
        <div class="form-group">
          <label for="">Nominal spp</label>
            <select class="form-control" name="nominal" id="">
          <?php foreach ($data as $key) {?>

            <?php if($key['id_spp'] == $tampil[0]['id_spp']): ?> 
              <option selected value="<?= $key['id_spp'] ?>"> <?=  $key['nominal'] ?></option>
            <?php else: ?>
             <option value="<?= $key['id_spp'] ?>"> <?=  $key['nominal'] ?></option>
            <?php endif; ?>


          <?php } ?>
            </select>
            
        </div>
        <div class="form-group">
            <a href="index.php" class="btn btn-success btn-block">Ke Menu</a>
            <button type="submit" name="submit" class="btn btn-primary btn-block">Save</button>
        </div>
        </form>
        
</div>


<?php 

if(isset($_POST['submit']))
{
    $nisn = $_POST['nisn'];
    $bayar = $_POST['bayar'];
    $tgl_bayar = $_POST['tgl'];
    $bulan_bayar = $_POST['bulan'];
    $tahun_bayar = $_POST['tahun'];
    $nominal = $_POST['nominal'];




    $data = array(
        'id_petugas' => $_SESSION['user']['id_petugas'],
        'nisn' => $nisn,
        'tgl_bayar' => $tgl_bayar,
        'bulan_bayar' => $bulan_bayar,
        "tahun_bayar" => $tahun_bayar,
        'id_spp' =>$nominal,
        'jumlah_bayar' => $bayar,

    );
    // echo "<pre>";
    // print_r($data);
    // echo "</pre>";
    // print_r($_SESSION['user']);

    
  $insert = $crud->insert('pembayaran', $data);
  
//  print_r($insert);
 
    if ($insert) {
        $crud::set_flashdata("success","Data berhasil ditambahkan");
        echo "<script>location='index.php'</script>";
    }
    else
    {
        $crud::set_flashdata("success","Data berhasil ditambahkan");
        echo "<script>location='index.php'</script>";
    }
    
}


?>