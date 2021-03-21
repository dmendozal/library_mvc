<?php

class LoginController
{
    public function index()
    {
        require_once('login.php');
    }
    public function loginu()
    {
        $user_name = $_POST["user_name"];
        $password = $_POST["password"];
        $sw = Users::logIn($user_name, $password);
        if ($sw) {
            header("location:?controller=Publication&action=index");
        } else {
            header("location:?controller=Login&action=index");
        }
    }
    public function logout()
    {
        $sw = Users::logOut();
        if ($sw) {
            header("location:?controller=Login&action=index");
        } else {
            header("location:?controller=Publication&action=index");
        }
    }
}
