<?php include "assets/templates/header.php";?>

<?php


$sql = "SELECT * FROM kelas";
$data_kelas =$crud->tampilAll($sql);

$sql2 = "SELECT * FROM spp";
$data_spp =$crud->tampilAll($sql2);


$sql3 = "SELECT * FROM siswa WHERE nisn = $_GET[edit]";
$data = $crud->tampilAll($sql3);
// echo "<pre>";
// print_r($_GET[edit]);
// echo "</pre>";
?>

<div class="container mt-5 ">
<div class="card shadow bg-info text-white" >
    <h2 class="card-title text-center">Edit Data siswa</h2>
    <div class="card-body">
    <form action="" method="post">
        <div class="form-group" >
        <label for="">Nisn</label>
        <input type="text" class="form-control" disabled name="nisn" value="<?= $data[0]['nisn'];  ?>" id="">
        </div>  
        <div class="form-group" >
        <label for="">nis</label>
        <input type="text" class="form-control" name="nis" value="<?= $data[0]['nis'];  ?>" id="">
        </div>  
        <div class="form-group">
        <label for="">Nama</label>
        <input type="text" class="form-control" name="nama" value="<?= $data[0]['nama'];  ?>" id="">
        </div>  
        <div class="form-group">
        <label for="">Kelas</label>
       <select class='form-control' name="kelas" id="">
           <?php foreach($data_kelas as $k){ ?>

           <?php if( $k['id_kelas'] == $data[0]['id_spp'] ): ?>
            <option selected value="<?= $k['id_kelas'] ?>" > <?=$k['nama_kelas']?></option>
           <?php else: ?>
            <option value="<?= $k['id_kelas'] ?>" > <?=$k['nama_kelas']?></option>
           <?php endif;?>

          
           <?php } ?>
       </select>
        </div> 
        <div class="form-group">
        <label for="">Alamat</label>
        <textarea name="alamat" id="" cols="30" class="form-control"><?= $data[0]['alamat'];  ?></textarea>
        </div>  
        <div class="form-group">
        <label for="">No telp</label>
        <input type="text" class="form-control" name="telp" value="<?= $data[0]['no_telp'];  ?>" id="">
        </div>  
        <div class="form-group">
        <label for="">Spp</label>
        <select class='form-control' name="spp" id="">
           <?php foreach($data_spp as $s){ ?>
        
            <?php if( $k['id_kelas'] == $data[0]['id_spp'] ): ?>
                <option selected value="<?= $s['id_spp'] ?>" > <?=$s['nominal']?></option>
            <?php else: ?>
                <option value="<?= $s['id_spp'] ?>" > <?=$s['nominal']?></option>
            <?php endif;?>


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
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $alamat = $_POST['alamat'];
        $no_telp = $_POST['telp'];
        $spp = $_POST['spp'];


        $data = array(
            'nis' => $nis,
            'nama' => $nama,
            'id_kelas' => $kelas,
            'alamat' => $alamat,
            'no_telp' => $no_telp,
            'id_spp' => $spp
        );

        $id = "nisn=" . $_GET['edit'];
      $edit = $crud->update('siswa', $data,$id);
      
     
     
        if ($edit) {
            $crud::set_flashdata("success","Data berhasil diubah");
            echo "<script>location='index.php?menu=siswa'</script>";
        }
        else
        {
            $crud::set_flashdata("danger","Data tidak berhasil diubah ");
            echo "<script>location='index.php?menu=siswa'</script>";
        }
        
    }
   
    
    ?>

    </div>
</div>
</div>

<?php include "assets/templates/footer.php";?>