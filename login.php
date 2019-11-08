<?php
require 'bootstrap.php';
?>
<?php
// define page variables
$title = "Login";
if(!isset($_SESSION)) {
    start_session();
}
?>
<?php include "templates/header.php"; ?>
<?php include ROOT_PATH. "templates/menu.php"; ?>

<?php
ini_set('display_errors', 1); error_reporting(E_ALL);

$user = $_POST['user'] ?? '';
$pass = $_POST['pass'] ?? '';
if (isset($_POST['btn'])) {
    $errors = [];
//    $_SESSION['user'] = $userDetails;



            if(!empty($_POST['user']) && !empty($_POST['pass'])) {
                $email = $_POST['user'];
                $password = $_POST['pass'];

                $con = mysqli_connect("localhost", "root", "", "project", 3306);

                if (!$con) {
                    die(mysqli_coonect_error());
                }

                $sql = "SELECT * FROM users WHERE email = '" . $user . "' AND password = '".$pass."'";
                $resultLogin = mysqli_query($con, $sql);

                $resultLogin =  $resultLogin->fetch_assoc();

                if(!empty($resultLogin)) {
                    $_SESSION['user_id'] = $resultLogin['id'];
                } else {
                    echo "Invalid credentials!";
                }
            }



    if (!empty($resultLogin)) {
        $message = "";
        $message .= "Full Name: {$user} \r\n";
        $message .= "Password: {$pass} \r\n";
        $bytes_written = file_put_contents('./messages.txt', $message, FILE_APPEND | LOCK_EX);

        if (false === $bytes_written) {
            die("Error, no bytes written");
        } else {
            echo "$bytes_written written to file";
        }
    }
}


if (!preg_match('/^[a-zA-Z0-9\s]+$/', $user)) {
    $nameError = 'Name can only contain letters, numbers and white spaces';
}


  ?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
    /*#frm{*/
        /*border: solid grey 1px;*/
        /*width: 20%;*/
        /*border-radius: 5px;*/
        /*margin: 100px auto;*/
        /*background: white;*/
        /*padding: 50px;*/
        /*text-align: center;*/
    /*}*/
    /*#btn{*/
        /*color: #fff;*/
        /*background: #337ab7;*/
        /*padding: 10px;*/
        /*margin-left: 69%;*/


    /*}*/
    .signup-form{
        width: 400px;
        margin: 100px auto;
        padding-top: 30px;
    }

    .signup-form input{
        width: 90%;
        height: 40px;
        padding: 0px 5%;
        margin-bottom: 4px;
        background-color: #fff;
        font-family: Arial;
        font-size: 16px;
        color: #111;
        line-height: 30px;
    }
    .signup-form button{
        display: block;
        margin: 20px auto;
        width: 50%;
        height: 40px;
        border: none;
        background-color: #222;
        font-size: 16px;
        color: #fff;
        cursor: pointer;

    }
    .signup-form button:hover {
        background-color: #111;

    }
</style>
<body>
<div id="frm" class="signup-form">

    <form method="POST">
        <form class = "form-signin" role = "form"
              action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
              ?>" method = "post">
        <?php if (isset($errors) && count($errors) > 0): ?>
            <div id="errors">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if(!empty($_SESSION['user_id'])):?>
            <div>You have connected successfully!!</div>
            Click here to <a href = "logout.php" title = "Logout">Log Out.
        <?php endif;?>
        <p>
            <label>Email:</label>
            <input type="text" id="user" name="user" value="<?= $user ?? '' ?>">
        </p>
        <p>
            <label>Password:</label>
            <input type="password" id="pass" name="pass" value="<?= $pass ?? '' ?>">
        </p>
        <p>
            <button type="submit" id="btn" name="btn" value="Login">Login</button>
        </p>
    </form>

</div>
<!-- Subscribe Form Starts Here -->
<div class="subscribe-form">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <div class="line-dec"></div>
                    <h1>Subscribe on PIXIE now!</h1>
                </div>
            </div>
            <div class="col-md-8 offset-md-2">
                <div class="main-content">
                    <p>Integer vel turpis ultricies, lacinia ligula id, lobortis augue. Vivamus porttitor dui id dictum efficitur. Phasellus vel interdum elit.</p>
                    <div class="container">
                        <form id="subscribe" action="" method="get">
                            <div class="row">
                                <div class="col-md-7">
                                    <fieldset>
                                        <input name="email" type="text" class="form-control" id="email"
                                               onfocus="if(this.value == 'Your Email...') { this.value = ''; }"
                                               onBlur="if(this.value == '') { this.value = 'Your Email...';}"
                                               value="Your Email..." required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-5">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="button">Subscribe Now!</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Subscribe Form Ends Here -->
</body>
</html>

    <?php include ROOT_PATH. "templates/footer.php"; ?>
