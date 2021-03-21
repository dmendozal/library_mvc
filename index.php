<?php

require_once('connection.php');

if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'];
    isset($_GET['id'])?$id=$_GET['id']:$id=null;
} else {
    $controller = 'pages';
    $action = 'home';
}

require_once('layout.php');
