<?php

require ("../connection.php");

if (isset($_POST)){
    $title = $_POST["title"];
    $explanation = $_POST["contents"];



    $hedef_yol = dirname(__FILE__,3)."/images/";
    $hedef_dosya= $hedef_yol.basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES['image']['tmp_name'],$hedef_dosya);
    $yol = "images/".basename($_FILES["image"]["name"]);

    $query = $pdo->prepare("INSERT INTO slider (title,image,explanation) VALUES (:title,:image,:explanation)");
    $query->execute([
        "title"=>$title,
        "image"=>$yol,
        "explanation"=>$explanation
    ]);

    header("Location:../slider.php");
}