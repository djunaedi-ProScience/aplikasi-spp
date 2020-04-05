<?php include "assets/templates/header.php";?>

<div class="container">
    <div class="row ">
    <div class="col-md-4 col-sm-12">
        <section class="section">
            <h2></h2>
        <div class="card shadow mt-5 d-flex align-items-center " style="">
            <ul class="list-group list-group-flush text-center ">
                <h4>Navigasi</h4>
            <?php
            if($_SESSION['user']['level'] == 'siswa')
            {
              echo ' <li class="list-group-item"><a href="?menu=history_pembayaran">History Pembayaran</a></li>';
            } elseif($_SESSION['user']['level'] == 'petugas') {
            ?>
               
                <li class="list-group-item"><a href="?menu=entri">Entri Pembayaran</a></li>
                <li class="list-group-item"><a href="?menu=history_pembayaran">History Pembayaran</a></li>

            <?php } 
            else{
              echo ' <li class="list-group-item"><a href="?menu=siswa">siswa</a></li>
                <li class="list-group-item"><a href="?menu=petugas">petugas</a></li>
                <li class="list-group-item"><a href="?menu=kelas">kelas</a></li>
                <li class="list-group-item"><a href="?menu=spp">spp</a></li>
                <li class="list-group-item"><a href="?menu=entri">Entri Pembayaran</a></li>
                <li class="list-group-item"><a href="?menu=history_pembayaran">History Pembayaran</a></li>
                ';
            }
            
            
            ?>
            </ul>
        </div>
        </section>
    </div>
    <div class="col-md-8 col-sm-12">
        <div class="card shadow-none mt-5" >
            <div class="card-body ">
            <div class="card-title" >
                
                <?php 
                if (@$_GET['menu'] == 'siswa') {
                    include "siswa.php";
                }
                elseif (@$_GET['menu'] == "petugas") {
                    include "petugas.php";
                }
                elseif (@$_GET['menu'] == "kelas") {
                    include "kelas.php";
                }
                elseif (@$_GET['menu'] == "spp") {
                    include "spp.php";
                }
                elseif (@$_GET['menu'] == "entri") {
                    include "entri_pembayaran.php";
                }
                elseif (@$_GET['menu'] == "history_pembayaran") {
                    include "history_pembayaran.php";
                }
                elseif(!isset($_GET['menu']))
                {
                    include "history_pembayaran.php";
                }
                else{
                    header('index.php');
                }
                ?>
                </div>
            </div>
        </div>
    </div>
    </div>

</div>

<?php include "assets/templates/footer.php";?>
