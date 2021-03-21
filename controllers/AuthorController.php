<?php


class AuthorController
{
    public function index()
    {
        $authors = Author::all();
        require_once('views/author/index.php');
    }

    public function create()
    {
        require_once('views/author/create.php');
    }

    public function store()
    {
        Author::insert(ucwords($_POST['name']), ucwords($_POST['nacionality']), $_POST['date_birth']);
        header("location:?controller=Author&action=index");
    }

    public function edit()
    {
        $author = Author::find($_GET['id']);
        require_once('views/author/edit.php');
    }
    public function update()
    {
        Author::update($_GET['id'], ucwords($_POST['name']), ucwords($_POST['nacionality']), $_POST['date_birth']);
        header("location:?controller=Author&action=index");
    }
    public function show()
    {
        $author = Author::find($_GET['id']);
        require_once('views/author/show.php');
    }
    public function destroy()
    {
        Author::delete($_GET['id']);
        header("location:?controller=Author&action=index");
    }
}
