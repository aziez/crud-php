<?php
    include "../config.php";

    $id = $_GET['id'];

    $result = mysqli_query($conn, "DELETE FROM db_siswa WHERE id=$id");

    header("Location: ../login/dashboard.php");

    ?>