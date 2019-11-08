<?php
require 'bootstrap.php';
?>
<?php
// define page variables
$title = "Register";
?>
<?php include "templates/header.php"; ?>
<?php include ROOT_PATH . "templates/menu.php"; ?>

<?php
date_default_timezone_set('Europe/Bucharest');

ini_set('display_errors', 1);
error_reporting(E_ALL);

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$name = test_input($_POST['full_name'] ?? '');
$email = test_input($_POST['email'] ?? '');
$password = test_input($_POST['password'] ?? '');
$repeat_password = test_input($_POST['repeat_password'] ?? '');
$acceptTC = test_input($_POST['accepttc'] ?? '0');


//---------------------------------------------------------------------------------
if (isset($_POST['send'])) { // $_POST['send'] ?? false
    $errors = [];
    if (strlen($name) < 3) {
        $errors["full_name"] = 'Full Name is invalid (under 3 chars)';
    }

    if (false == filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email address';
    }

    if (true != $acceptTC) {
        $errors[] = 'You must accept the terms and conditions';
    }

    if (strlen($_POST["password"]) <= 4) {
        $errors[] = 'The password is invalid';
    }

    if ($_POST["password"] !== $_POST["repeat_password"]) {
        $errors[] = 'Passwords doesn`t match!';
    }


    if (count($errors) == 0) {
        // do this if everything is ok
        $message = "";
        $message .= "Full Name: {$name} \r\n";
        $message .= "Email: {$email} \r\n";
        $message .= "Accept T&C: {$acceptTC} \r\n";
        $message .= "Message Date: " . date('Y-m-d H:i:s') . "\r\n";
        $message .= "Password: {$password} \r\n";
        $message .= "Accept T&C: {$repeat_password} \r\n";
        $message .= "--------------- \r\n";

        $bytes_written = file_put_contents('./messages.txt', $message, FILE_APPEND | LOCK_EX);
        header("Location: " . SITE_URL . "login.php");
    } else {
//            echo "$bytes_written written to file";
    }

    // Insert daca nu sunt erori

    $con = mysqli_connect("localhost:3306", "root", "", "project");
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
//        echo "Connected successfully";
    $query = "INSERT INTO `users` (`fullName`, `password`, `repeat_password`, `email`, `agree_to_terms_and_conditions`) " .
            "VALUES ('" . $name . "', '" . $password . "', '" . $repeat_password . "', '" . $email . "',  '" . $acceptTC . "');";
    //echo $query;
    $result = mysqli_query($con, $query);
//        var_dump($result);

    if (!$con) {
        echo "ERROR." . PHP_EOL;
        echo "error number " . mysqli_connect_errno() . PHP_EOL;
        echo "error message " . mysqli_connect_error() . PHP_EOL;
    } else {
        echo "";
    }
}


        //end stuff to do if everything is ok
    
//------------------------------------------------------------------------------------
    ?>

    <!DOCTYPE html>
    <html>
        <style>
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
            input[type=text]:focus {
                background-color: lightblue;
            }
        </style>
        <head>
            <title>My Contact form</title>
        </head>
        <body>

            <div class="signup-form">
                <form method="POST">
                    <?php if (isset($errors) && count($errors) > 0): ?>
                        <div id="errors">
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li><?= $error ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php if (empty($errors) && isset($_POST['send'])): ?>
                        <div>Your account has been created!</div>
                    <?php endif; ?>

                    <label for="name">Full Name</label>
                    <input required="required" name="full_name" id="name" type="text" value="<?= $name ?? '' ?>"> <br/>
                    <label for="password">Password</label>
                    <input required="required" name="password" id="password" type="password" value="<?= $password ?? '' ?>"> <br/>
                    <label for="password">Repeat Password</label>
                    <input required="required" name="repeat_password" id="repeat_password" type="password" value="<?= $repeat_password ?? '' ?>"> <br/>
                    <label for="email">Email</label>
                    <input required="required" name="email" id="email" type="email" value="<?= $email ?? '' ?>" /> <br/>
                    <section id="accept">
                        <input name="accepttc"  id="accept" type="radio" value="1" <?= (isset($acceptTC) && $acceptTC == '1' ? 'checked="checked"' : '') ?> >
                        <label for="accept">I agree with the terms and conditions of this site</label> <br/>
                    </section>

                    <button type="submit" name="send" value="Sign Up">Sign Up</button>

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
                                                           onfocus="if (this.value == 'Your Email...') {
                                                                       this.value = '';
                                                                   }"
                                                           onBlur="if (this.value == '') {
                                                                       this.value = 'Your Email...';
                                                                   }"
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

    <?php include ROOT_PATH . "templates/footer.php"; ?>
