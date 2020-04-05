<?php include "assets/templates/header.php";?>

<?php

$data = $crud->tampilAll("SELECT * FROM kelas WHERE id_kelas='$_GET[edit]'");

?>

<div class="container mt-5 ">
<div class="card shadow bg-info text-white" >
    <h2 class="card-title text-center">Edit Data kelas</h2>
    <div class="card-body">
    <form action="" method="post">
        <div class="form-group" >
        <label for="">Nama Kelas</label>
        <input type="text" class="form-control" name="nama_kelas"  value="<?= $data[0]["nama_kelas"]  ?>" id="">
        </div>  
        <div class="form-group" >
        <label for="">Kompetensi Keahlian</label>
        <input type="text" class="form-control" name="keahlian" value="<?= $data[0]["kompetensi_keahlian"]  ?>" id="">
        </div>  
        <div class="form-group text-center "> 
        <button name="submit" class="btn btn-primary btn-lg btn-block ">Submit</button>
        </div>
    </form>  

    <?php 

    if(isset($_POST['submit']))
    {
        $kelas = $_POST['nama_kelas'];
        $keahlian = $_POST['keahlian'];




        $data = array(
            'nama_kelas' => $kelas,
            'kompetensi_keahlian' => $keahlian,

        );

        $id = "id_kelas=" . $_GET['edit'];
      $edit = $crud->update('kelas', $data, $id);
      
    //  print_r($edit);
     
        if ($edit) {
            $crud::set_flashdata("success","Data berhasil ditambahkan");
            echo "<script>location='index.php?menu=kelas'</script>";
        }
        else
        {
            $crud::set_flashdata("success","Data berhasil ditambahkan");
            echo "<script>location='index.php?menu=kelas'</script>";
        }
        
    }
   
    
    ?>

    </div>
</div>
</div>

<?php include "assets/templates/footer.php";?>