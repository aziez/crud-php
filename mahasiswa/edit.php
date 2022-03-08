<?php 
    include"../header.php";
    include"../config.php";

    $id  = $_GET['id'];
    $put = mysqli_query($conn, "SELECT * FROM db_siswa WHERE id=$id");

    if(isset($_POST['submit'])){

        $nim        = $_POST['nim'];
        $nama       = $_POST['nama'];
        $jkelamin   = $_POST['jkelamin'];
        $tgl_lahir  = $_POST['tgl_lahir'];
        $alamat     = $_POST['alamat'];
        $jurusan    = $_POST['jurusan'];
        // (nim, nama, jkelamin, tgl_lahir, alamat, jurusan) VALUE ('$nim', '$nama', '$jkelamin', '$tgl_lahir', '$alamat', '$jurusan')

        $sql = "UPDATE db_siswa SET nim='$nim', nama='$nama', jkelamin='$jkelamin', tgl_lahir='$tgl_lahir', alamat='$alamat', jurusan='$jurusan' WHERE id='$id' ";
        $result = mysqli_query($conn, $sql);

        if($result){
            echo"<script>alert('Tambah Siswa Berhasil !!')</script>";
            header("Location: ../login/dashboard.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>

<body>
<div class="container px-5 my-5">

<form action="" method="post">
<h3>Edit Data Mahasiswa</h3>
<?php while($data =  mysqli_fetch_array($put)){ ?>
  <div class="form-group row">
    <label for="nim" class="col-4 col-form-label">NIM</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-sort-numeric-desc"></i>
          </div>
        </div> 
        <input id="nim" name="nim" value="<?php echo $data['nim']; ?>" type="text" class="form-control" required="required">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Nama</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-user-o"></i>
          </div>
        </div> 
        <input id="nama" name="nama" value="<?php echo $data['nama']; ?>" type="text" class="form-control" required="required">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Jenis Kelamin</label> 
    <div class="col-8">
      <div class="form-check form-check-inline">
        <input name="jkelamin" id="jkelamin_0" type="radio" required="required" class="form-check-input" value="L"> 
        <label for="jkelamin_0" class="form-check-label">Laki-Laki</label>
      </div>
      <div class="form-check form-check-inline">
        <input name="jkelamin" id="jkelamin_1" type="radio" required="required" class="form-check-input" value="P"> 
        <label for="jkelamin_1" class="form-check-label">Perempuan</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="tgl_lahir" class="col-4 col-form-label">Tanggal Lahir</label> 
    <div class="col-8">
      <div class="input-group">
        <input id="tgl_lahir" value="<?php echo $data['tgl_lahir']; ?>" name="tgl_lahir" type="date" class="form-control" required="required"> 
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="alamat" class="col-4 col-form-label">Alamat</label> 
    <div class="col-8">
      <textarea id="alamat" name="alamat" cols="40" rows="3" class="form-control" required="required"><?php echo $data['alamat']; ?></textarea>
    </div>
  </div>
  <div class="form-group row">
    <label for="jurusan" class="col-4 col-form-label">Jurusan</label> 
    <div class="col-8">
      <select id="jurusan" name="jurusan" class="form-control" required="required" chechked="MG">
        <option value="TI">Teknik Informatika</option>
        <option value="MG">Management</option>
        <option value="SI">Sistem Informatika</option>
        <option value="ASC">Architecture</option>
        <option value="TK">Teknik Elektronik</option>
      </select>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
  <?php  } ?>
</form>
</div>

</body>

</html>