<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <title>Update</title>
</head>
<body>
  <div class="container">
  <?php
  include "koneksi.php";

  function input($data) {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if (isset($_GET['id_anggota'])) {
    $id_anggota=input($_GET['id_anggota']);
    $sql="select * from anggota where id_anggota=$id_anggota";
    $hasil=mysqli_query($kon,$sql);
    $data=mysqli_fetch_assoc($hasil);
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_anggota=htmlspecialchars($_POST["id_anggota"]);
    $username=input($_POST["username"]);
    $nama=input($_POST["nama"]);
    $alamat=input($_POST["alamat"]);
    $email=input($_POST["email"]);
    $no_hp=input($_POST["no_hp"]);

    $sql="update anggota set
        username='$username',
        nama='$nama',
        alamat='$alamat',
        email='$email',
        no_hp='$no_hp'
        where id_anggota=$id_anggota";
    
    $hasil=mysqli_query($kon,$sql);
    if ($hasil) {
      header("Location:index.php");
    }
    else {
      echo "<div class='alert alert-danger'> Gagal. </div>";
    }

  }
  ?>

  <h2>Update Data</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" name="username" class="form-control" value="<?php echo $data['$username'];?>" placeholder="Username" required />
        </div>

        <div class="form-group">
          <label for="nama">Nama:</label>
          <input type="text" name="nama" class="form-control" value="<?php echo $data['$nama'];?>" placeholder="Nama" required />
        </div>

        <div class="form-group">
          <label for="alamat">Alamat:</label>
          <input type="text" name="alamat" class="form-control" value="<?php echo $data['$alamat'];?>" placeholder="Alamat" required />
        </div>

        <div class="form-group">
          <label for="email">Email:</label>
          <input type="text" name="email" class="form-control" value="<?php echo $data['$email'];?>" placeholder="Email" required />
        </div>

        <div class="form-group">
          <label for="no_hp">No HP:</label>
          <input type="text" name="no_hp" class="form-control" value="<?php echo $data['$no_hp'];?>" placeholder="No HP" required />
        </div>

        <input type="hidden" name="id_anggota" value="<?php echo $data['id_anggota']; ?>" />
        <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
  </form>
  </div>
</body>
</html>