<?php include "assets/templates/header.php";?>

<?php


$sql = "SELECT * FROM kelas";
$data_kelas =$crud->tampilAll($sql);

$sql2 = "SELECT * FROM spp";
$data_spp =$crud->tampilAll($sql2);

?>

<div class="container mt-5 ">
<div class="card shadow bg-info text-white" >
    <h2 class="card-title text-center">Tambah Data siswa</h2>
    <div class="card-body">
    <form action="" method="post">
        <div class="form-group" >
        <label for="">Nisn</label>
        <input type="text" class="form-control" name="nisn" id="">
        </div>  
        <div class="form-group" >
        <label for="">nis</label>
        <input type="text" class="form-control" name="nis" id="">
        </div>  
        <div class="form-group">
        <label for="">Nama</label>
        <input type="text" class="form-control" name="nama" id="">
        </div>  
        <div class="form-group">
        <label for="">Kelas</label>
       <select class='form-control' name="kelas" id="">
           <?php foreach($data_kelas as $k){ ?>
           <option value="<?= $k['id_kelas'] ?>" > <?=$k['nama_kelas']?></option>
           <?php } ?>
       </select>
        </div> 
        <div class="form-group">
        <label for="">Alamat</label>
        <textarea name="alamat" id="" cols="30" class="form-control"></textarea>
        </div>  
        <div class="form-group">
        <label for="">No telp</label>
        <input type="text" class="form-control" name="telp" id="">
        </div>  
        <div class="form-group">
        <label for="">Spp</label>
        <select class='form-control' name="spp" id="">
           <?php foreach($data_spp as $s){ ?>
           <option value="<?= $s['id_spp'] ?>" > <?=$s['nominal']?></option>
           <?php } ?>
       </select>
        </div>  
        <div class="form-group text-center "> 
        <button name="submit" class="btn btn-primary btn-lg btn-block ">Submit</button>
        </div>
    </form>  

    <?php 

    if(isset($_POST['submit']))
    {
        $nisn = $_POST['nisn'];
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $alamat = $_POST['alamat'];
        $no_telp = $_POST['telp'];
        $spp = $_POST['spp'];


        $data = array(
            'nisn' => $nisn,
            'nis' => $nis,
            'nama' => $nama,
            'id_kelas' => $kelas,
            'alamat' => $alamat,
            'no_telp' => $no_telp,
            'id_spp' => $spp
        );

        
      $insert = $crud->insert('siswa', $data);
      
     
     
        if ($insert) {
            $crud::set_flashdata("success","Data berhasil ditambahkan");
            echo "<script>location='index.php?menu=siswa'</script>";
        }
        else
        {
            $crud::set_flashdata("success","Data berhasil ditambahkan");
            echo "<script>location='index.php?menu=siswa'</script>";
        }
        
    }
   
    
    ?>

    </div>
</div>
</div>

<?php include "assets/templates/footer.php";?>