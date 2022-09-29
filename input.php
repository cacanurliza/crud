<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <title>Form Input data</title>
</head>
<body>
  <div class="container">
  <?php
  include "koneksi.php";

  function input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username=input($_POST["username"]);
    $nama=input($_POST["nama"]);
    $alamat=input($_POST["alamat"]);
    $email=input($_POST["email"]);
    $no_hp=input($_POST["no_hp"]);

      $sql="insert into anggota (username,nama,alamat,email,no_hp) values ('$username','$nama','$alamat','$email','no_hp')";
      $hasil=mysqli_query($kon,$sql);
  
    if ($hasil) {
    header("Location:index.php");
    }
    else {
    echo "<div class='alert alert-danger'>Data Gagal Disimpan.</div>";
  
    }
  }
  ?>
  <h2>Input Data</h2>

  <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" name="username" class="form-control" placeholder="Username" required>
    </div>
    
    <div class="form-group">
      <label for="nama">Nama</label>
      <input type="text" name="nama" class="form-control" placeholder="Nama" required>
    </div>
    
    <div class="form-group">
      <label for="alamat">Alamat</label>
      <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat" required></textarea>
    </div>
    
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" name="email" class="form-control" placeholder="Email" required>
    </div>

    <div class="form-group">
      <label for="no_hp">No Hp</label>
      <input type="number" name="no_hp" class="form-control" placeholder="No Hp" required>
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</body>
</html>