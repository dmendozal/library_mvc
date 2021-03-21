<?php
require_once('models/Users.php');
require_once('models/Book.php');
class ReserveController
{
    public function index()
    {
        $reserves = Reserve::all();
        require_once('views/reserve/index.php');
    }

    public function create()
    {
        $fkidbook = $_GET['id'];
        $currentUser = Users::getCurrentUser();
        require_once('views/reserve/create.php');
    }

    public function store()
    {
        Reserve::insert($_POST['description'], $_POST['fkidbook'], $_POST['fkidusers']);
        $book = Book::find($_POST['fkidbook']);
        $book->stock--;
        Book::update($book->idbook, $book->title, $book->stock, $book->image, $book->year, $book->fkidcategory, $book->fkidauthor);
        header("location:?controller=Publication&action=index");
    }

    public function edit()
    {
        $reserve = Reserve::find($_GET['id']);
        require_once('views/reserve/edit.php');
    }
    public function update()
    {
        Reserve::update($_GET['id'], $_POST['state_reserve']);
        header("location:?controller=Reserve&action=index");
    }
    public function show()
    { }
    public function destroy()
    {
        Reserve::delete($_GET['id']);
        header("location:?controller=Reserve&action=index");
    }
}
