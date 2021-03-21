<?php
class ErrorController
{
    public function home()
    {
        require_once('login.php');
    }

    public function error()
    {
        echo "Error!";
    }
}

?>