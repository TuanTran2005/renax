<?php
const DBNAME = "<db_name>";
const DBCHARSET = "utf8";
const DBUSER = "root";
const DBPASS = "";
const  DBHOST = "localhost";
const BASE_URL = "http://localhost/renax/";
function route($url) {
    return BASE_URL.$url;
}
// key co the truyen success hoac errors
function flash($key,$msg,$route)  {
    $_SESSION[$key] = $msg;
    switch ($key) {
        case 'success':
            unset($_SESSION['errors']);
            break;
        case 'errors':
            unset($_SESSION['success']);
            break;
    }
    header('location:'.BASE_URL.$route.'?msg='.$key);die;
}