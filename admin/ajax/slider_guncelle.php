<?php

require("../connection.php");

if (isset($_POST)) {
    $id = $_POST["slider_id"];
    $title = $_POST["title"];
    $explanation = $_POST["contents"];

    if ($_FILES["image"]['size'] == 0){

        $query = $pdo->prepare("UPDATE slider SET title=:title,explanation=:explanation WHERE id=:id");
        $query->execute([
            "id"=>$id,
            "title" => $title,
            "explanation" => $explanation
        ]);

    }else{


        $hedef_yol = dirname(__FILE__,3)."/images/";
        $hedef_dosya= $hedef_yol.basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES['image']['tmp_name'],$hedef_dosya);
        $yol = "images/".basename($_FILES["image"]["name"]);


        $query = $pdo->prepare("UPDATE slider SET title=:title,image=:image,explanation=:explanation WHERE id=:id");
        $query->execute([
            "id"=>$id,
            "title" => $title,
            "image" => $yol,
            "explanation" => $explanation
        ]);
    }



    header("Location:../slider.php");
}