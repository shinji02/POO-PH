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
    <script src="javacript.js"></script>
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
        
        </div>
        <h1> Liste des client </h1>
            <table class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">Numéro de l'utilisateur</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Age</th>
                    <th scope="col">Date de naissance</th>
                    <th scope="col">Email</th>
                    <th scope="col">Numéro de téléphone</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                    $list_idd = $O_BDD->getlistcustomer();
                    foreach ($list_idd as $id){
                        $list_user = $O_BDD->getInfo($id);
                        echo "<br>";
                        if($list_user['Id_Employee']!=0){
                             
                        }
                        else
                        {
                           ?>  
                            <tr>
                              <th scope="row"><?php echo $list_user['id'];?></th>
                              <td><?php echo $list_user['name'];?></td>
                              <td><?php echo $list_user['firstname'];?></td>
                              <td><?php echo $list_user['age'];?></td>
                              <td><?php echo $list_user['birth'];?></td>
                              <td><?php echo $list_user['Email'];?></td>
                              <td><?php echo $list_user['num_tel'];?></td>
                              <td>
                                  <a class="btn btn-danger btn-lg active" role="button" href="remove.php?id=<?php echo $list_user['id']; ?>">Surprimer</a>      
                              </td>
                            </tr>
                            <?php 
                        }
                    }
                    ?>                   
                </tbody>
            </table>
        <h1>Liste des employée</h1>
                    <table class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">Numéro de l'utilisateur</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Age</th>
                    <th scope="col">Date de naissance</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rang</th>
                    <th scope="col">Salaire</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                    $list_idd = $O_BDD->getlistIDEmployee();
                    foreach ($list_idd as $id){
                        $list_user = $O_BDD->getInfo($id);
                        echo "<br>";
                        if($list_user['id_Customers']!=0){
                             
                        }
                        else
                        {
                           ?>  
                            <tr>
                              <th scope="row"><?php echo $list_user['id'];?></th>
                              <td><?php echo $list_user['name'];?></td>
                              <td><?php echo $list_user['firstname'];?></td>
                              <td><?php echo $list_user['age'];?></td>
                              <td><?php echo $list_user['birth'];?></td>
                              <td><?php echo $list_user['Email'];?></td>
                              <td><?php echo $list_user['Rang'];?></td>
                              <td><?php echo $list_user['Salary'];?></td>
                              <td>
                                  <a class="btn btn-danger btn-lg active" role="button" href="remove.php?id=<?php echo $list_user['id']; ?>">Surprimer</a>      
                              </td>
                            </tr>
                            <?php 
                        }
                    }
                    ?>                   
                </tbody>
            </table>
            <h1> Ajout d'un nouveaux utilisateur </h1>
            <form method="POST" action="create.php" onclick="cal_age()">
                  <div class="form-group">
                      <input type="text" class="form-control" name="name" id="name" placeholder="Entrez un nom">
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Entrez le prénom">
                  </div>
                  <div class="form-group">
                      <input type="date" class="form-control" name="birth" id="birth" onchange="cal_age()" placeholder="Entrez la date de naissance">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="age" id="age" placeholder="Cacul de l'age">
                  </div>
                <button type="submit" class="btn btn-default">Submit</button>
              </form>
            
        <hr>

      </div> <!-- /container -->
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