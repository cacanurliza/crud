<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <title>CRUD</title>
</head>
<body>
  <div class="container">
  <br>
  <h4>CRUD</h4>
<?php

      include "koneksi.php";

      if (isset($_GET['id_anggota'])) {
        $id_anggota=htmlspecialchars($_GET["id_anggota"]);
        $sql="delete from anggota where id_anggota='$id_anggota' ";
        $hasil=mysqli_query($kon, $sql);

        if ($hasil) {
          header("Location:index.php");

        }
        else {
          echo "<div class='alert alert-danger'> Data Gagal Dihapus.</div>";
        }
      }
?>

<table class="table table-bordered table-hover">
  <br>
    <thead>
      <tr>
        <th>No</th>
        <th>Username</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Email</th>
        <th>No Hp</th>
        <th colspan='2'>Opsi</th>
      </tr>
    </thead>
  <?php
  include "koneksi.php";
  $sql="select * from anggota order by id_anggota desc";

  $hasil=mysqli_query($kon,$sql);
  $no=0;
  while ($data = mysqli_fetch_array($hasil)) {
    $no++;
  ?>
  <tbody>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $data["username"]; ?></td>
      <td><?php echo $data["nama"]; ?></td>
      <td><?php echo $data["alamat"]; ?></td>
      <td><?php echo $data["email"]; ?></td>
      <td><?php echo $data["no_hp"]; ?></td>
      <td>
        <a href="update.php?id_anggota=<?php echo htmlspecialchars($data['id_anggota']); ?>" class="btn btn-warning" role="button">Update</a>
        <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id_anggota=<?php echo $data['id_anggota']; ?>" class="btn btn-danger" role="button">Hapus</a>
      </td>
    </tr>
  </tbody>
  <?php
  }
  ?>
</table>
<a href="input.php" class="btn btn-primary" role="button">Tambah Data</a>
  </div>
  

</body>
</html>