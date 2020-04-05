<?php include "assets/templates/header.php";?>


<div class="container mt-5 ">
<div class="card shadow bg-info text-white" >
    <h2 class="card-title text-center">Tambah Data Petugas</h2>
    <div class="card-body">
    <form action="" method="post">
        <div class="form-group" >
        <label for="">Username</label>
        <input type="text" class="form-control" name="username" id="">
        </div>  
        <div class="form-group" >
        <label for="">Password</label>
        <input type="text" class="form-control" name="password" id="">
        </div>  
        <div class="form-group">
        <label for="">Nama Petugas</label>
        <input type="text" class="form-control" name="nama_petugas" id="">
        </div>  
        <div class="form-group text-center "> 
        <button name="submit" class="btn btn-primary btn-lg btn-block ">Submit</button>
        </div>
    </form>  

    <?php 

    if(isset($_POST['submit']))
    {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $nama = $_POST['nama_petugas'];
        $level = 'petugas';



        $data = array(
            'username' => $user,
            'password' => $pass,
            'nama_petugas' => $nama,
            'level' => $level,

        );

        
      $insert = $crud->insert('petugas', $data);
      
    //  print_r($insert);
     
        if ($insert) {
            $crud::set_flashdata("success","Data berhasil ditambahkan");
            echo "<script>location='index.php?menu=petugas'</script>";
        }
        else
        {
            $crud::set_flashdata("success","Data berhasil ditambahkan");
            echo "<script>location='index.php?menu=petugas'</script>";
        }
        
    }
   
    
    ?>

    </div>
</div>
</div>

<?php include "assets/templates/footer.php";?>