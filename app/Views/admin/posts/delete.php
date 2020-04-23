<?php
    use Core\HTML\BootstrapForm ;

    $postTable = App::getInstance()->getTable('post') ;
    $categoryTable= App::getInstance()->getTable('category') ;

    $result = false ;
    if(!empty($_POST))
    {
        $result = $postTable->delete($_POST['id']) ;
    }

    if($result)
    {
        
        header('Location: admin.php') ;
    }