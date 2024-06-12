<?php
require ("../connection.php");

if (isset($_POST)){

    $email=$_POST["email"];
    $tel=$_POST["tel"];
    $address=$_POST["address"];
    $harita=$_POST["harita"];

    $query=$pdo->prepare("UPDATE settings SET 
                                        email=:aemail,
                                        tel=:atel,
                                        address=:aaddress,
                                        map_link=:amap_link
                                         WHERE id=:aid");
    $query->execute([
        "aemail"=>$email,
        "atel"=>$tel,
        "aaddress"=>$address,
        "amap_link"=>$harita,

        "aid"=>1
    ]);

    header("Location:../communication.php");


}