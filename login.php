<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<title>Login</title>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SIREVO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <!-- Font Google -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <?php
    require('koneksi.php');
    session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($conn, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        //Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username'
and password='" . md5($password) . "'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect user to index.php
            header("Location: index.php");
        } else {
            echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
        }
    } else {
    ?>
        <!-------Login Start------->
        <!-- Login Section Start -->
        <section class="login section-padding" data-scroll-index='7'>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="sectioner-header text-center">
                            <h3>Login</h3>
                            <span class="line"></span>
                            <p>Enter your credentials to log in.</p>
                        </div>
                        <div class="section-content">
                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                    <form id="login_form" action="login.php" method="post">
                                        <input type="text" id="username" class="form-input w-100" name="username" placeholder="Username" required>
                                        <input type="password" id="password" class="form-input w-100" name="password" placeholder="Password" required>
                                        <button class="btn-grad w-100 text-uppercase" type="submit" name="login_button">Login</button>
                                        <p>Not registered yet? <a href='registration.php'>Register Here</a></p>

                                        <footer class="footer-copy align-items-center">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p>2023 &copy; Kelompok 7 Rekayasa Perangkat Lunak</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </footer>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-------Login End------->

        </div>
    <?php } ?>
</body>




</html>