<?php

require ("../connection.php");

if (isset($_POST["id_onay"])){

    $id = $_POST["id_onay"];

    $query = $pdo->prepare("UPDATE menus SET status = :mstatus WHERE id=:mid");
    $query->execute([
        "mstatus" =>1,
        "mid"=>$id
    ]);

}

if (isset($_POST["id_red"])){

    $id = $_POST["id_red"];

    $query = $pdo->prepare("UPDATE menus SET status = :mstatus WHERE id=:mid");
    $query->execute([
        "mstatus" =>0,
        "mid"=>$id
    ]);

}