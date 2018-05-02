<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    include './classe/C_BDD.php';
    $O_BDD = new C_BDD;
    $rep = $O_BDD->Connect_DataBase("localhost", "site", "root");
    if($rep!=null){
        echo 'connection avec la base donnée Valider <br><br>';
    }
    if(!empty($_POST['name']) AND !empty($_POST['firstname']) AND !empty($_POST['birth']) AND !empty(['age'])){
        $name = htmlspecialchars($_POST['name']);
        $first_name = htmlspecialchars($_POST['firstname']);
        $birth = $_POST['birth'];
        $age = $_POST['age'];
        
        $O_BDD->Add_User_Client($name, $first_name, $age, $birth, "test@gmail.com", "123456789");
        $O_BDD->Add_User_Employee($name, $first_name, $age, $birth, "test2@gmail.com", "gerant", "1500");
        header('Location: gestion.php');
        
    }
    
    $O_BDD->Logout_DataBase();

