<?php

require ("../connection.php");

if (isset($_POST)){

    $title = $_POST["title"];
    $explanation = $_POST["explanation"];



    if ($_FILES["icon"]["size"]!=0){

        $hedef_yol = dirname(__FILE__,3)."/images/";
        $hedef_dosya= $hedef_yol.basename($_FILES["icon"]["name"]);
        move_uploaded_file($_FILES['icon']['tmp_name'],$hedef_dosya);
        $yol = "images/".basename($_FILES["icon"]["name"]);

        $query = $pdo->prepare("INSERT INTO services (title,image,contents) VALUES (:title,:gorsel,:contents)");
        $query->execute([
           "title"=>$title,
           "gorsel"=>$yol,
           "contents"=>$explanation,
        ]);

        header("Location:../Home Page.php");

    }








}