<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php 
    session_start();
    if($_SESSION['status']!="login"){
      header("location:../../../login.php?pesan=belum_login");
    }
    ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
    
    <!-- tampilan navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
      <a class="navbar-brand text-light font-weight-bold" href="index.php">Hobimegel</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../../index.php">Home <span class="sr-only">(current)</span></a>
            <li class="nav-item">
                <a class="nav-link" href="../../admin.php">Admin</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Karyawan
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="../../datadiri.php">Data diri</a>
                <a class="dropdown-item" href="../../pendidikan.php">Pendidikan</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Absensi
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="../../absen.php">Absen</a>
                <a class="dropdown-item" href="../../izin.php">Izin</a>
              </div>
            </li>
        </ul>
        <span class="navbar-text font-weight-bold text-light">
          <?php echo $_SESSION['username']; ?>
          <a href="logout.php" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Logout</a>
        </span>
      </div>
    </nav>

    <!-- mengisi data -->
    <div class="container pt-5 pb-5" style="margin-top : 5rem;">
        <div class="row justify-content-md-center ">
            <div class="col-md-7">
            <div class="card shadow sm-3 mb-5 bg-white rounded">
                <div class="card-header bg-primary mb-0"><h5 class="text-center text-white">Tambah Data <span class="font-weight-bold text-light " >Izin Karyawan</span></h5></div>
                <div class="card-body">
                <?php
                include("../../koneksi.php");
                if(isset($_POST['tambah'])){
                  $NIK = $_POST['NIK'];
                  $keterangan = $_POST['keterangan'];
                  $izin_tanggal = $_POST['izin_tanggal'];
                  $sampai_tanggal = $_POST['izin_tanggal'];
                  $sampai_tanggal = $_POST['sampai_tanggal'];
                  $created_at = $_POST['created_at'];
                   
                  $data = mysqli_query($koneksi,"SELECT * FROM karyawan WHERE NIK='$NIK'");
                   
                  if($data->num_rows > 0){
                    $sql="INSERT INTO izin values ('','$NIK','$keterangan','$izin_tanggal','$sampai_tanggal','$created_at','')";
                    mysqli_query($koneksi,$sql) or die ('gagal');
                    echo '<script>alert("Berhasil menambah data."); document.location="../../izin.php";</script>';
                  
                    }else{ ?>
                        <div class="alert alert-primary text-center text-danger" role="alert">
                            NIK anda salah
                        </div>
                    <?php }
                }
                ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">NIK</label>
                        <textarea name="created_at" style="display:none"><?php echo date("h:i:s d/m/Y ");?></textarea>
                        <input type="text" name="NIK" class="form-control" placeholder="Masukkan NIK Anda">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Keterangan</label>
                        <textarea name="keterangan" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Masukkan keterangan anda"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Izin dari tanggal</label>
                        <input type="date" name="izin_tanggal" class="form-control" >
                        <label for="exampleFormControlSelect1">Izin sampai tanggal</label>
                        <input type="date" name="sampai_tanggal" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="tambah" value="Simpan" class="btn btn-primary btn-block">
                        <a href="../../izin.php" class="btn btn-danger btn-block active" role="button" aria-pressed="true">Batal</a>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>  
</body>
</html>