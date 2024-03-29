<?php
require 'bootstrap.php';
?>
<?php
// define page variables
$title = "Homepage";
?>
<?php include "templates/header.php"; ?>
<?php include ROOT_PATH. "templates/menu.php"; ?>

<?php
date_default_timezone_set('Europe/Bucharest');

$fullName= $_POST['full_name'] ?? '';
$email = $_POST['email'] ?? '';
$subject = $_POST['subject'] ?? '';
$mesage_m = $_POST['message'] ?? '';
if ((isset($_POST['send']))) { // $_POST['send'] ?? false
    echo "Your message was send: " . $_POST['full_name'];
$errors = [];

//-----------------------------------------                                      Cazul 1.

    if (strlen($mesage_m) < 5){
        $errors[] = 'The sent message is invalid (under 5 characters)';
    }

    if (strlen($subject) < 3){
        $errors[] = 'The subject is to short (under 3 characters)';
    }


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = 'Invalid Email';
    }
    if (strlen($fullName) < 3){
        $errors[] = 'Full Name is invalid (under 3 characters)';
    }


    if (count($errors) == 0) {
        // do this if everything is ok
        $message = "";
        $message .= "Subject: {$subject} \r\n";
        $message .= "Full Name : {$fullName} \r\n";
        $message .= "Email: {$email} \r\n";;
        $message .= "Message: {$mesage_m} \r\n";
        $message .= "Message Date: " . date('Y-m-d H:i:s') ."\r\n" ;
        $message .= "--------------- \r\n";

        $bytes_written = file_put_contents('./messages.txt', $message, FILE_APPEND | LOCK_EX);

        if (false === $bytes_written) {
            die("Error, no bytes written");
        } else {
//            echo "$bytes_written written to file";

        }
    }
    //end stuff to do if everything is ok
}



?>
<!-- Page Content -->
<!-- About Page Starts Here -->
<div class="contact-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <div class="line-dec"></div>
                    <h1>Contact Us</h1>
                </div>
            </div>
            <div class="col-md-6">
                <div id="map">

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1197183.8373802372!2d-1.9415093691103689!3d6.781986417238027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdb96f349e85efd%3A0xb8d1e0b88af1f0f5!2sKumasi+Central+Market!5e0!3m2!1sen!2sth!4v1532967884907" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-md-6">
                <div class="right-content">
                    <div class="container">
                        <form id="contact" action="" method="post">
                            <?php if (isset($errors) && count($errors) > 0): ?>
                                <div id="errors">
                                    <ul>
                                        <?php foreach ($errors as $error): ?>
                                            <li><?= $error ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php else: ?>
                                <div>Thank you for your message!</div>
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <fieldset>
                                        <input name="full_name" type="text" class="form-control" id="name"  placeholder="Your name..." required="" value="<?= $fullName ?? '' ?>">
                                    </fieldset>
                                </div>
                                <div class="col-md-6">
                                    <fieldset>
                                        <input name="email" type="text" class="form-control" id="email"  placeholder="Your email..." required="" value="<?= $email ?? '' ?>">
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject..." required="" value="<?= $subject ?? '' ?>">
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your message..." required="" ><?= $mesage_m ?? '' ?></textarea>
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="button" name="send">Send Message</button>
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <div class="share">
                                        <h6>You can also keep in touch on: <span><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-twitter"></i></a></span></h6>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Page Ends Here -->

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
                    <p>Godard four dollar toast prism, authentic heirloom raw denim messenger bag gochujang put a bird on it celiac readymade vice.</p>
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






<?php include ROOT_PATH. "templates/footer.php"; ?>
