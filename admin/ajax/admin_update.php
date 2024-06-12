<?php
require("../connection.php");

if (isset($_POST)){
    $kadi = $_POST["kadi"];
    $kmail = $_POST["kmail"];
    $kad = $_POST["kad"];
    $ksoyad = $_POST["ksoyad"];

    $query= $pdo->prepare("UPDATE admin SET admin_name=:kadi,admin_mail=:kmail,first_name=:kad,last_name=:ksoyad WHERE admin_id=1");
    $query->execute([
        "kadi"=>$kadi,
        "kmail"=>$kmail,
        "kad"=>$kad,
        "ksoyad"=>$ksoyad,
    ]);


}

