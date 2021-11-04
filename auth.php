<?php
const ADMIN_EMAIL = 'admin@admin.com';
const ADMIN_PASSWORD = '111111';
session_start();
if($_POST['email'] === ADMIN_EMAIL && $_POST['password'] === ADMIN_PASSWORD){
    $_SESSION['auth'] = true;
    header('Location: adduser.php');
}else{
    $_SESSION['auth'] = false;
    header('Location: login.php');
}