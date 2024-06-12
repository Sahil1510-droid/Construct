<?php

require("../connection.php");

if (isset($_POST["order_dizi"])){

    $dizi = $_POST["order_dizi"];


    foreach ($dizi as $key=>$value){


        $query=$pdo->prepare("UPDATE menus SET order=:morder WHERE id=:mid");

        $query->execute([
            "morder"=>$key,
            "mid"=>$value
        ]);

    }




//    $id=$_POST["h_id"];
//
//    $query=$pdo->prepare("UPDATE menus SET order=:morder WHERE id=:mid");
//    $query->execute([
//        "morder"=>$menu_ad,
//        "mid"=>$id
//    ]);

    //header("Location:../menu-islem.php");

}