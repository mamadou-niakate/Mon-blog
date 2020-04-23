<?php
    use Core\HTML\BootstrapForm ;

    $categoryTable= App::getInstance()->getTable('category') ;

    $result = false ;
    if(!empty($_POST))
    {
        $result = $categoryTable->delete($_POST['id']) ;
    }

    if($result)
    {
        
        header('Location: admin.php?page=category.index') ;
    }