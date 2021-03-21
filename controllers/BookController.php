<?php
require_once('models/Author.php');
require_once('models/Category.php');
class BookController
{
    public function index()
    {
        $books = Book::all();
        require_once('views/book/index.php');
    }

    public function create()
    {
        $categories = Category::all();
        $authors = Author::all();
        require_once('views/book/create.php');
    }

    public function store()
    {
        Book::insert(ucwords($_POST['title']), $_POST['stock'], $_POST['image'], $_POST['year'], $_POST['fkidcategory'], $_POST['fkidauthor']);
        header("location:?controller=Book&action=index");
    }

    public function edit()
    {
        $book = Book::find($_GET['id']);
        $category = Category::find($book->fkidcategory);
        $author = Author::find($book->fkidauthor);
        $categories = Category::all();
        $authors = Author::all();
        require_once('views/book/edit.php');
    }
    public function update()
    {
        Book::update($_GET['id'], ucwords($_POST['title']), $_POST['stock'], $_POST['image'],$_POST['year'],$_POST['fkidcategory'],$_POST['fkidauthor']);
        header("location:?controller=Book&action=index");
    }
    public function show()
    {
        $book = Book::find($_GET['id']);
        require_once('views/book/show.php');
    }
    public function destroy()
    {
        Book::delete($_GET['id']);
        header("location:?controller=Book&action=index");
    }
}
