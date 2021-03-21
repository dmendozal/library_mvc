<?php

require_once('models/Users.php');
class CommentsController
{
    public function index()
    {
        $fkidpublication = $_GET['id'];
        $comments = Comments::getComments($fkidpublication);
        require_once('views/comments/index.php');
    }

    public function create()
    {
        $fkidpublication = $_GET['id'];
        require_once('views/comments/create.php');
    }

    public function store()
    {
        $user = Users::getCurrentUser();
        $fkidpublication = $_POST['fkidpublication'];
        Comments::insert($_POST['comment'], $user->idusers, $fkidpublication);
        header("location:?controller=Comments&action=index&id=$fkidpublication");
    }

    public function edit()
    {
        $comment = Comments::find($_GET['id']);
        require_once('views/comments/edit.php');
    }
    public function update()
    {
        Comments::update($_GET['id'], $_POST['comment']);
        $fkidpublication = $_POST['fkidpublication'];
        header("location:?controller=Comments&action=index&id=$fkidpublication");
    }
    public function show()
    { 
        
    }
    public function destroy()
    {
        $comment = Comments::delete($_GET['id']);
        header("location:?controller=Comments&action=index&id=$comment->fkidpublication");
    }
}
