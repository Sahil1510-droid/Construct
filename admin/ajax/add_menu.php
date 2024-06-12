<?php

require("../connection.php");

if (isset($_POST["menu_ad"])) {
    $menu_ad = $_POST["menu_ad"];
    $menu_link = $_POST["menu_link"];

    $order = $query1 = $pdo->query("SELECT * FROM menus")->rowCount();

    $query = $pdo->prepare("INSERT INTO menus (ad, url, `order`) VALUES (:mad, :murl, :morder)");
    $query->execute([
        "mad" => $menu_ad,
        "murl" => $menu_link,
        "morder" => $order + 1
    ]);

    header("Location: ../menu-islem.php");
}

