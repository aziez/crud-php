<?php
    include '../config.php';

    error_reporting(0);

    session_start();

    if(isset($_SESSION['username'])){
        header("Location: dashboard.php");
    }

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5 ($_POST['password']);
        $cpassword = md5($_POST['cpassword']);

        if($password == $cpassword){
            $sql = "SELECT * FROM db_users WHERE email='$email'";
            $result = mysqli_query($conn, $sql);

            if(!$result->num_rows > 0){
                $sql = "INSERT INTO db_users (username, email, password) VALUE ('$username', '$email', '$password')";
                $result = mysqli_query($conn, $sql);

                if($result){
                    echo "<script>alert('Selamat Berhasil TErdafatar')</script>";
                    $username = "";
                    $email = "";
                    $_POST['password'] = "";
                    $_POST['cpassword'] = "";
                }else {
                    echo "<script>alert('woops....!! Terjadi kesalahan yang tak terduga')</script>";
                }
            }else{
                echo "<script>alert('woops...!!! Email sudah terdaftar')</script>";
            }
        }else{
            echo "<script>alert('Password Tidak Sesuai ')</script>";
        }

    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <title>Register Page</title>
</head>

<body class="text-center">
    <main class="form-signin">
        <form action="" method="post">
            <h1 class="h3 mb-3 fw-normal">Register</h1>

            <div class="form-floating">
                <div class="form-floating">
                    <input type="email" name="email" class="form-signin form-control" placeholder="name@example.com" value="<?php echo $email; ?>">
                    <label for="floatingInput">Email address</label>
                </div>

                <div class="form-floating">
                    <input type="username" name="username" class="form-signin form-control" placeholder="username" value="<?php echo $username; ?>">
                    <label for="floatingInput">Username</label>
                </div>

                <div class="form-floating">
                    <input type="password" name="password" class="form-signin form-control" placeholder="Password" value="<?php echo $_POST['password'] ?>" >
                    <label for="floatingPassword">Password</label>
                </div>

                <div class="form-floating">
                    <input type="password" name="cpassword" class="form-signin form-control" placeholder="Password" value="<?php echo $_POST['cpassword'] ?>">
                    <label for="floatingPassword">Re Enter Password</label>
                </div>
                 
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="agree">  I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                    </label>
                </div>

            </div>
    
                    
            <div class="form-floating">
                <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Register</button>
            </div>
            <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login.php" class="fw-bold text-body"><u>Login here</u></a></p>

            <p class="mt-5 mb-3 text-muted">Ujikom Unpam 2022</p>
        </form>
    </main>
</body>

</html>