<?php


class CategoryController
{
    public function index()
    {
        $categories = Category::all();
        require_once('views/category/index.php');
    }

    public function create()
    {
        require_once('views/category/create.php');
    }

    public function store()
    {
        if (!isset($_POST['name']))
            var_dump('HOLA');

        Category::insert(ucwords($_POST['name']));
        header("location:?controller=Category&action=index");
    }

    public function edit()
    {
        $category = Category::find($_GET['id']);
        require_once('views/category/edit.php');
    }
    public function update()
    {
        Category::update($_GET['id'],$_POST['name']);
        header("location:?controller=Category&action=index");
    }
    public function show()
    {
        $category = Category::find($_GET['id']);
        require_once('views/category/show.php');
    }
    public function destroy()
    {
        Category::delete($_GET['id']);
        header("location:?controller=Category&action=index");
    }
}
