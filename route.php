<?php

function call($controller, $action, $id = null)
{

    $con = 'controllers/' . $controller . 'Controller.php';
    require_once($con);

    switch ($controller) {
        case 'Reserve':
            require_once('models/Reserve.php');
            $controller = new ReserveController();
            break;
        case 'Comments':
            require_once('models/Comments.php');
            $controller = new CommentsController();
            break;
        case 'Publication':
            require_once('models/Publication.php');
            $controller = new PublicationController();
            break;
        case 'Users':
            require_once('models/Users.php');
            $controller = new UsersController();
            break;
        case 'Category':
            require_once('models/Category.php');
            $controller = new CategoryController();
            break;
        case 'Book':
            require_once('models/Book.php');
            $controller = new BookController();
            break;
        case 'Author':
            require_once('models/Author.php');
            $controller = new AuthorController();
            break;
        case 'Login':
            require_once('models/Users.php');
            $controller = new LoginController();
            break;
    }
    $controller->{$action}();
}


$controllers = array(
    'Reserve' => ['index', 'create', 'store', 'edit', 'update', 'show', 'destroy'],
    'Publication' => ['index', 'create', 'store', 'edit', 'update', 'show', 'destroy','likeBook'],
    'Comments' => ['index', 'create', 'store', 'edit', 'update', 'show', 'destroy'],
    'Category' => ['index', 'create', 'store', 'edit', 'update', 'show', 'destroy'],
    'Users' => ['index', 'create', 'store', 'edit', 'update', 'show', 'destroy'],
    'Book' => ['index', 'create', 'store', 'edit', 'update', 'show', 'destroy'],
    'Author' => ['index', 'create', 'store', 'edit', 'update', 'show', 'destroy'],
    'Login' => ['loginu', 'logout', 'index'],
);

if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
        call($controller, $action, $id);
    } else {
        var_dump('el metodo no existe en el controlador');
        die();
        call('pages', 'error');
    }
} else {
    var_dump('el controlador no existe en el array');
    die();
    call('pages', 'error');
}
