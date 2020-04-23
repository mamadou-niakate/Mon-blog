<?php
    use Core\Auth\DBAuth ;

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

    $app = App::getInstance() ;
    $auth = new DBAuth($app->getDB()) ;

    if(!$auth->logged())
    {
        $app->forbiden() ;
    }

    ob_start() ;
    switch($page)
    {
        case "home"    : require ROOT.'/pages/admin/posts/index.php' ; break ;
        case "posts.show" : require ROOT.'/pages/admin/posts/single.php'   ;break ;
        case "posts.categorie":require ROOT.'/pages/admin/posts/categorie.php';break;
        case "post.edit":require ROOT.'/pages/admin/posts/edit.php';break;
        case "post.add":require ROOT.'/pages/admin/posts/add.php';break;
        case "post.delete":require ROOT.'/pages/admin/posts/delete.php';break;
        case "category.index": require ROOT.'/pages/admin/categories/index.php' ; break ;
        case "category.edit":require ROOT.'/pages/admin/categories/edit.php';break;
        case "category.add":require ROOT.'/pages/admin/categories/add.php';break;
        case "category.delete":require ROOT.'/pages/admin/categories/delete.php';break;
    }
    $content = ob_get_clean() ;

    require ROOT.'/pages/templates/default.php';

