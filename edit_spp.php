<?php include "assets/templates/header.php";?>

<?php

$data = $crud->tampilAll("SELECT * FROM spp WHERE id_spp='$_GET[edit]'");

?>

<div class="container mt-5 ">
<div class="card shadow bg-info text-white" >
    <h2 class="card-title text-center">Tambah Data Petugas</h2>
    <div class="card-body">
    <form action="" method="post">
        <div class="form-group" >
        <label for="">Nominal</label>
        <input type="text" class="form-control" value="<?= $data[0]["nominal"]  ?>" name="nominal" id="">
        </div>  
        <div class="form-group" >
        <label for="">Tahun</label>
        <input type="text" class="form-control" name="tahun" value="<?= $data[0]["tahun"]  ?>" id="">
        </div>  
        <div class="form-group text-center "> 
        <button name="submit" class="btn btn-primary btn-lg btn-block ">Submit</button>
        </div>
    </form>  

    <?php 

    if(isset($_POST['submit']))
    {
        $nominal = $_POST['nominal'];
        $tahun = $_POST['tahun'];


        $data = array(
            'tahun' => $tahun,
            'nominal' => $nominal,

        );

        
        $id = "id_spp=" . $_GET['edit'];
        $edit = $crud->update('spp', $data,$id);
      
    //  print_r($insert);
     
        if ($insert) {
            $crud::set_flashdata("success","Data berhasil diubah");
            echo "<script>location='index.php?menu=spp'</script>";
        }
        else
        {
            $crud::set_flashdata("success","Data berhasil diubah");
            echo "<script>location='index.php?menu=spp'</script>";
        }
        
    }
   
    
    ?>

    </div>
</div>
</div>

<?php include "assets/templates/footer.php";?>