<?php 
    include '../config.php';

    error_reporting(0);

    session_start();

    if(isset($_SESSION['username'])){
        header("Location: dashboard.php");
    }

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $pass = md5 ($_POST['password']);

        $sql = "SELECT * FROM db_users WHERE email='$email' AND password='$pass' ";
        $result = mysqli_query($conn, $sql);

        if($result->num_rows > 0){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];

            header("Location: dashboard.php");
        
        } else{
            echo "<script>alert('woops...!!! Email atau password salah')</script>";
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
    <title>Login Page</title>
</head>

<body class="text-center">
    <div class="alert alert-warning" role="alert">
            <?php echo $_SESSION['error']; ?>
    </div>
    <main class="form-signin">
        <form action="" method="post">
            <h1 class="h3 mb-3 fw-normal">Please Signin</h1>
            <div class="form-floating">
                <div class="form-floating">
                    <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" require>
                    <label for="email">Email address</label>
                </div>

                <div class="form-floating">
                    <input type="password" name="password" class="form-control" value="<?php echo $_POST['password']; ?>">
                    <label for="password">Password</label>
                </div>

                <!-- <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div> -->

                <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign in</button>

                <p class="text-center text-muted mt-5 mb-0">Not have account? <a href="register.php" class="fw-bold text-body"><u>Register here</u></a></p>

                <p class="mt-5 mb-3 text-muted">Ujikom Unpam 2022</p>
            </div>
        </form>
    </main>
</body>

</html>