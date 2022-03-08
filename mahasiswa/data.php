<?php 

include "../config.php";

$sql = mysqli_query($conn, "SELECT * FROM db_siswa");
$nomor = 1;

// $data = mysqli_query($conn, "SELECT * FROM db_siswa WHERE id=$id");

include "../header.php";

?>


<a href="../mahasiswa/tambah.php"><button type="button" class="btn btn-primary"><i
      class="bi bi-plus-lg"></i></button></a>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">NIM</th>
      <th scope="col">Kelamin</th>
      <th scope="col">Tgl Lahir</th>
      <th scope="col">Alamat</th>
      <th scope="col">Jurusan</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php while($data =  mysqli_fetch_array($sql)){ ?>
    <tr>
      <th scope="row"><?php echo $nomor++ ?></th>
      <td><?php echo $data['nama'] ?></td>
      <td><?php echo $data['nim'] ?></td>
      <td><?php echo $data['jkelamin'] ?></td>
      <td><?php echo $data['tgl_lahir'] ?></td>
      <td><?php echo $data['alamat'] ?></td>
      <td><?php echo $data['jurusan'] ?></td>
      <td align="center"><a href="../mahasiswa/edit.php?id=<?php echo $data['id'] ?>" class="btn btn-primary"><i
            class="bi bi-pencil-square"></i></a> | <a type="button" class="btn btn-danger" data-bs-toggle="modal"
          data-bs-target="#form_modal<?php echo $data['id'] ?>" data-bs-id="<?php echo $data['id']; ?>""><i class=" bi bi-trash3"></i></a></td>
    </tr>
    <div class="modal fade" id="form_modal<?php echo $data['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Apakah Anda Yakin akan menghapus Mahasiswa bernama <b><?php echo $data['nama'] ?></b></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">batal</button>
            <a href="../mahasiswa/hapus.php?id=<?php echo $data['id']; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
          </div>

        </div>
      </div>
    </div>
    <?php } ?>
  </tbody>
</table>

</body>

</html>