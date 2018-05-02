<?php
include 'classe/C_BDD.php';
$O_BDD = new C_BDD;
$rep = $O_BDD->Connect_DataBase("localhost", "site", "root");
?>

<!doctype html>
<html lang="en">
  <head>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/jumbotron.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">Test pour Site Conseil</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
              <a class="nav-link" href="index.php"><i class="fas fa-home"> Home </i><span class="sr-only">(current)</span></a>
          </li>
          <li class="navbar-nav mr-auto">
              <a class="nav-link" href="list.php"><i class="far fa-user"> Liste des utilisateur </i></a>
          </li>
          <li>
              <a class="nav-link" href="gestion.php"><i class="fas fa-cogs"> Gestion des utilisateur </i></a>
          </li>
      </div>
    </nav>

    <main role="main">
      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3">Test!</h1>
          <p>Cette page permet de tester les fonction des classe</p>
        </div>
      </div>

      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-md-4">
            <h2>Exemple de fonction</h2>
            <!--<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p> -->
            <p><a class="btn btn-secondary" href="fonction.php" role="button">View details &raquo;</a></p>
          </div>
          <div class="col-md-4">
              <h2>Liste du personelle </h2>
            <p><a class="btn btn-secondary" href="list.php" role="button">View details &raquo;</a></p>
          </div>
          <div class="col-md-4">
            <h2>Gestion des utilisateur</h2>
            <p><a class="btn btn-secondary" href="gestion.php" role="button">View details &raquo;</a></p>
          </div>
        </div>

        <hr>

      </div> <!-- /container -->
        <?php
            if($rep!=null){
                ?>
                <div class="alert alert-success" role="alert">
                    <strong>OK</strong> <?php echo $rep; ?></a>.
                </div>
                <?php
            }
        ?>
    </main>

    <footer class="container">
      <p>&copy; Company 2017-2018</p>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="css/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="css/assets/js/vendor/popper.min.js"></script>
    <script src="css/dist/js/bootstrap.min.js"></script>
  </body>
</html>
<?php 
    $O_BDD->Logout_DataBase();
?>