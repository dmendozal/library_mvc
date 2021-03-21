<?php
require_once('models/Users.php');
require_once('models/Book.php');
class PublicationController
{
    public function index()
    {
        $publications = Publication::all();
        $currentUser = Users::getCurrentUser();
        require_once('views/publication/index.php');
    }

    public function create()
    {
        $books = Book::all();
        require_once('views/publication/create.php');
    }

    public function store()
    {
        $fkidusers = Users::getCurrentUser();
        Publication::insert(($_POST['description']), $fkidusers->idusers, $_POST['fkidbook']);
        header("location:?controller=Publication&action=index");
    }

    public function edit()
    {
        $publication = Publication::find($_GET['id']);
        require_once('views/publication/edit.php');
    }
    public function update()
    {
        Publication::update($_GET['id'], $_POST['description']);
        header("location:?controller=Publication&action=index");
    }
    public function show()
    { }
    public function destroy()
    {
        Publication::delete($_GET['id']);
        header("location:?controller=Publication&action=index");
    }

    public function likeBook()
    {
        $publication = Publication::find($_GET['id']);
        Book::toLikeOnBook($publication->fkidbook);
        header("location:?controller=Publication&action=index");
    }
}
