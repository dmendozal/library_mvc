<?php


class UsersController
{
    public function index()
    {
        $users = Users::all();
        require_once('views/users/index.php');
    }

    public function create()
    {
        require_once('views/users/create.php');
    }

    public function store()
    {
        Users::insert($_POST['code'], ucwords($_POST['name']), ucwords($_POST['last_name']), ucwords($_POST['email']), $_POST['user_name'], $_POST['password']);
        header("location:?controller=Users&action=index");
    }

    public function edit()
    {
        $users = Users::find($_GET['id']);
        require_once('views/users/edit.php');
    }
    public function update()
    {
        Users::update($_GET['id'],$_POST['code'], ucwords($_POST['name']), ucwords($_POST['last_name']), $_POST['user_name']);
        header("location:?controller=Users&action=index");
    }
    public function show()
    {
        $users = Users::find($_GET['id']);
        require_once('views/users/show.php');
    }
    public function destroy()
    {
        Users::delete($_GET['id']);
        header("location:?controller=Users&action=index");
    }
}
