<?php

        session_start();
        unset($_SESSION["user_id"]);

        echo 'You have been log out';
        header('Refresh: 2; URL = login.php');
        ?>