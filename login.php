<?php
include "koneksi.php";
include 'crud.php';
$crud = new Crud($koneksi);
session_start();




error_reporting(0);



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <title>Aplikasi SPP</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary " >
    <div class="container" >
  <a class="navbar-brand"  href="index.php">Aplikasi SPP</a>
  <a class="navbar-brand ml-auto" href="login.php"><?php
                    if(!isset($_SESSION['user']))
                    {
                        echo "Login";
                    }

                    ?></a>
  
  <a class="navbar-brand" href="logout.php"><?php
                        if(isset($_SESSION['user']))
                        {
                            echo "logout";
                        }
                    ?></a>
  

  </div>
</nav>



<?php if (isset($_SESSION['user'])) {
    echo "<script>location='index.php'</script>";
}  ?>
<div class="container">
    <div class="card2">
    <form action="" method="post">
        <h2>Login</h2>
    <div class="form-group2">
        <label for="">Username/Nisn:</label>
        <input type="text" name="username" required id="">
    </div>
    <div class="form-group2">
        <label for="">password/Nama Siswa:</label>
        <input type="text" name="password" required id="">
    </div>
    <div class="form-group2">
        <label for="">level:</label>
        <select class="form-control" name="level" id="">
            <option value="admin">admin</option>
            <option value="petugas">petugas</option>
            <option value="siswa">siswa</option>
        </select>
    </div>
    <button name="submit">Login</button>

    <?php
    if(isset($_POST['submit'])):
    @$a = "SELECT * FROM petugas WHERE username='$username'";
    $tampil = $crud->tampilAll($a);
        if($_POST['level'] == "petugas" && $tampil[0]['username'] == "$username"):?>
        
            <a href="reset.php" class='btn bg-primary w-100 text-center'>Lupa password? silahkan tekan ini </a>
            
        <?php   endif;
    endif;?>
    
    <?php $crud::flashdata(); ?>
    </form>
  </div>  
    
</div>


<?php
    if (isset($_POST['submit'])) {
        if(isset($_POST['level']))
        {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            $a = "SELECT * FROM petugas WHERE username='$username' AND password='$password'";
            $tampil = $crud->tampilAll($a);
            $b = "SELECT * FROM siswa WHERE nisn='$username' AND nama='$password'";
            $tampil2 = $crud->tampilAll($b);

            if (@$_POST['level'] == "petugas" && $tampil[0]["level"] == $_POST['level'] && $tampil[0]['username'] == $username && $tampil[0]['password'] == $password) {
                $_SESSION['user'] = array(
                    'nama_petugas' => $username,
                    'id_petugas' => $tampil[0]['id_petugas'],
                    'level' => "petugas",

                );
                echo "<script>location='index.php'</script>";
            }
            elseif (@$_POST['level'] == "admin" && $tampil[0]["level"] == $_POST['level'] && $tampil[0]['username'] == $username && $tampil[0]['password'] == $password ) {
                $_SESSION['user'] = array(
                    'nama_petugas' => $username,
                    'level' => "admin",
                    'id_petugas' => $tampil[0]['id_petugas'],

                );
                echo "<script>location='index.php'</script>";
            }

           elseif (@$_POST['level'] == "siswa" && $tampil2[0]['nisn'] == $username && $tampil2[0]['nama'] == $password) {
                $_SESSION['user'] = array(
                    'nama_petugas' => $username,
                    'level' => "siswa",

                );
                echo "<script>location='index.php'</script>";

              }
            else{
                $crud::set_flashdata("danger","maaf username dan password salah");
                // echo "<script>location='login.php'</script>";
            }
        }



        




        // echo "<pre>";
        // print_r($_SESSION['user']);
        // echo "</pre>";
    }

?>
<?php include "assets/templates/footer.php";?>