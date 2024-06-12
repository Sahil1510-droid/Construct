<?php

require ("../connection.php");

if (isset($_POST)){

    $title = $_POST["title"];
    $link = $_POST["link"];



    if ($_FILES["icon"]["size"]!=0){

        $hedef_yol = dirname(__FILE__,3)."/images/";
        $hedef_dosya= $hedef_yol.basename($_FILES["icon"]["name"]);
        move_uploaded_file($_FILES['icon']['tmp_name'],$hedef_dosya);
        $yol = "images/".basename($_FILES["icon"]["name"]);

        $query = $pdo->prepare("INSERT INTO social (ad,image,link) VALUES (:ad,:gorsel,:link)");
        $query->execute([
           "ad"=>$title,
           "gorsel"=>$yol,
           "link"=>$link,
        ]);

        header("Location:../communication.php");

    }








}