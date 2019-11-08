<?php

function siteTitle(string $title): string{
    return $title . " | ". SITE_NAME;
}

function get_menu(): array {
    $sql = "SELECT * FROM dinamic";

    $resultMenu = mysqli_query(getDataBaseConnection(), $sql);

    $items_menu = [];

    while($items_from_menu = $resultMenu->fetch_assoc()){
        $items_menu[] = $items_from_menu;
    }

    return $items_menu;


}

//function get_details_from_users(){
//    $details_from_users = [];
//
//            if(!empty($_SESSION['user_id']) || !empty($_COOKIE['user_id'])) {
//            $userID = (int) !empty($_SESSION['user_id']) ? $_SESSION['user_id'] : $_COOKIE['user_id'];
//
//            $sql = "SELECT * FROM users WHERE id=" . $userID;
//            $resultUser = mysqli_query(getDataBaseConnection(), $sql);
//            $details_from_users = $resultUser->fetch_assoc();
//            if(!empty($details_from_users['lastname']) && !empty($details_from_users['firstname'])) {
//                $details_from_users['name'] = $details_from_users['firstname'] . "" . $details_from_users['lastname'];
//            }
//
//
//            }
//
//
//            return $details_from_users;
//
//        }

function getDataBaseConnection() {

    $con = mysqli_connect("localhost:3306","root","","project");
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    if(!$con){
        echo "ERROR." . PHP_EOL;
        echo "error number ". mysqli_connect_errno() . PHP_EOL;
        echo "error message ". mysqli_connect_error() . PHP_EOL;
    }else{
        echo "";
    }
    return $con;
}