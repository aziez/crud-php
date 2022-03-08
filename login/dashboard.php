<?php 
    include "../config.php";

    session_start();

    if(!isset($_SESSION)){
        header("Location: login.php");
    }

    include "../header.php";
?>

<title>DASHBOARD</title>
<div class="container">
    <header class="d-flex justify-content-center py-3">
      <ul class="nav nav-pills">
        <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Features</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Pricing</a></li>
        <li class="nav-item"><a href="#" class="nav-link">FAQs</a></li>
        <li class="nav-item"><a href="#" class="nav-link">About</a></li>
      </ul>
      <div class="position-relative color-dark">
          <a href="logout.php" class="d-block link-dark text-decoration-none rounded-cicrle">
          <i class="bi bi-box-arrow-right" width="32" height="32">logout</i>
          </a>
      </div>
    </header>
  </div>
  <?php echo "<h1?>Selamat Datang, ".$_SESSION['username']." !"."</h1>"; ?>

<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand">Data Mahasiswa</a>
    <form class="d-flex">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <?php include "../mahasiswa/data.php" ?>
  </div>


</body>
</html>