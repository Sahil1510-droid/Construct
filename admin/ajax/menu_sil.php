<?php

require ("../connection.php");

if (isset($_GET["id"])){
    $id=$_GET["id"];


    $query=$pdo->prepare("DELETE FROM menus WHERE id=:mid");
    $query->execute([
        "mid"=>$id,
    ]);

    header("Location:../menu-islem.php");
}