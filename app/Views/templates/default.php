<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.css"/>

    <script src="/node_modules/popper.js/dist/popper.js"></script>
    <script src="/node_modules/jquery/dist/jquery.js"></script>
    <script src="/node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="/node_modules/@fortawesome/fontawesome-free/js/all.js"></script>

    <title><?= App::getInstance()->title ; ?></title>

        <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"/>

  </head>
  <body>
    
    <div class="navbar navbar-dark bg-dark">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Project name</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="starter-template" style="padding-top:10px;">
            <?php echo $content ; ?>
        </div>
    </div>
  </body>
</html>
