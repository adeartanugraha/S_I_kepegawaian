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
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand text-light font-weight-bold" href="index.php">Hobimegel</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            <li class="nav-item">
                <a class="nav-link" href="../../admin.php">Admin</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Karyawan
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="../../datadiri.php">Data diri</a>
                <a class="dropdown-item" href="#">Pendidikan</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Absensi
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Absen</a>
                <a class="dropdown-item" href="#">Izin</a>
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
    <div class="container" style="margin-top : 8rem;">
        <div class="row justify-content-md-center ">
            <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary mb-0"><h5 class="text-center text-white">Tambah Data <span class="font-weight-bold text-light " >Admin</span></h5></div>
                <div class="card-body">
                <?php
                include("../../koneksi.php");
                if(isset($_POST['tambah'])){
                    $nama=$_POST['nama'];
                    $username = $_POST['username'];
                    $password=$_POST['password'];
                    $password2=$_POST['password2'];
                    if($password == $password2){
                        $sql="INSERT INTO admin (nama,username,password) values ('$nama','$username','$password')";
                        mysqli_query($koneksi,$sql) or die ('gagal');
                        header('location:../../admin.php');
                    }else{ ?>
                        <div class="alert alert-primary text-center text-danger" role="alert">
                            konfirmasi password tidak sesuai
                        </div>
                    <?php }
                }
                ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Confirm Password</label>
                        <input type="password" name="password2" class="form-control" placeholder="Confirm Password">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="tambah" value="Simpan" class="btn btn-primary btn-block">
                        <a href="../../admin.php" class="btn btn-danger btn-block active" role="button" aria-pressed="true">Batal</a>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>  
</body>
</html>