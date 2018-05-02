<?php
    include './classe/C_BDD.php';
    $O_BDD = new C_BDD;
    $rep = $O_BDD->Connect_DataBase("localhost", "site", "root");
    $id = $_GET['id'];
    if($rep!=null){
        echo 'connection avec la base donnée Valider <br><br>';
    }
    
    $O_BDD->Delete($id);
    
    $O_BDD->Logout_DataBase();
?>

