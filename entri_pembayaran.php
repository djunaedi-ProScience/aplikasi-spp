
<?php


$data = $crud->tampilAll("SELECT * FROM spp");

?>

<?php crud::flashdata(); ?>
<div class="container">
        <h3 class="text-center">Masukan Pembayaran</h3>
        <form action="" method="post">
        <div class="form-group">
            <label for="siswa">Nisn</label>
            <input class="form-control border" type="text" name="nisn" id="">
        </div>
        <div class="form-group">
            <label for="pembayaran">bayar</label>
            <input class="form-control border" type="text" name="bayar" id="">
        </div>
        <div class="form-group">
            <label for="siswa">tanggal bayar</label>
            <input class="form-control border" type="date" name="tgl" id="">
        </div>
        <div class="form-group">
            <label for="pembayaran">bulan bayar</label>
            <input class="form-control border" type="text" name="bulan" id="">
        </div>
        <div class="form-group">
            <label for="pembayaran">tahun bayar</label>
            <input class="form-control border" type="text" name="tahun" id="">
        </div>
        <div class="form-group">
          <label for="">Nominal spp</label>
            <select class="form-control" name="nominal" id="">
          <?php foreach ($data as $key) {?>
            <option value="<?= $key['id_spp'] ?>"> <?=  $key['nominal'] ?></option>

          <?php } ?>
            </select>
            
        </div>
        <div class="form-group">
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