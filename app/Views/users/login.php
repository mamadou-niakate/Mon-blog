<?php
    use Core\HTML\BootstrapForm ;
    use Core\Auth\DBAuth ;

    if(!empty($_POST))
    {
        $auth = new DBAuth(App::getInstance()->getDB()) ;
        if($auth->login($_POST['username'],$_POST['password']))
        {
            header('Location: admin.php') ;
        }else
        {
    ?>      <div class="alert alert-danger">
                Identifiacation incorrecte
            </div>
<?
        }
    }

    $form = new BootstrapForm($_POST) ;

?>

<form method="post">
    <?= $form->input('username',"Pseudo") ;?>
    <?= $form->input('password',"Mot de passe",['type' => 'password']) ;?>
    <button class="btn btn-primary">Envoyez</button>
</form>