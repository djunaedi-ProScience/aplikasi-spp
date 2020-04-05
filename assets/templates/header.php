<?php
include "koneksi.php";
include 'crud.php';
session_start();
$crud = new Crud($koneksi);


if (!isset($_SESSION['user'])) {
    echo "<script>location='login.php'</script>";
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/js/bootstrap.min.js">
    <link rel="stylesheet" href="assets/style.css">
    <title>Aplikasi SPP</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary " >
    <div class="container" >
  <a class="navbar-brand"  href="index.php">Aplikasi SPP</a>
 
  <a class="navbar-brand ml-auto" href="#"><?php if(isset($_SESSION['user']))
                    {
                        
                        echo $_SESSION['user']['nama_petugas'] . "/" .  $_SESSION['user']['level'];
                        
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