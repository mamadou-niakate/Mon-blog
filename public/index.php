<?php
    use App\Controller\PostController ;

    define('ROOT',dirname(__DIR__));
    require ROOT . '/app/App.php' ;

    App::load() ;

    if(isset($_GET['page']))
    {
        $page = $_GET['page'] ;
    }else
    {
        $page = "home" ;
    }

    ob_start() ;
    switch($page)
    {
        case "home" : $controller = new PostController() ; $controller->index() ; break ;
        case "posts.show" : $controller = new PostController() ; $controller->show() ; break ;
        case "posts.categorie":$controller = new PostController() ; $controller->categories() ; break;
        case "login" : $controller = new PostController() ; $controller->login()  ; break ;
    }
    $content = ob_get_clean() ;

    require ROOT.'/views/templates/default.php';

