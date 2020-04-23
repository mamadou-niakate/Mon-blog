<?php
    use Core\HTML\BootstrapForm ;

    $categoryTable= App::getInstance()->getTable('category') ;

    $result = false ;
    if(!empty($_POST))
    {
        if(isset($_POST['titre']))
        {
            $result = $categoryTable->update($_GET['id'],["titre" => $_POST['titre']]
                                        );
        }
    }

    if($result)
    {
?>      <divs class="alert alert-success">
            La catégorie a bien été Sauvegarder
        </div><br/>
<?php
    }
    $category = $categoryTable->find($_GET['id']) ;
    $form = new BootstrapForm($category) ;
?>
    
<form method="post">
    <?= $form->input('titre',"Titire de la catégorie") ;?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>