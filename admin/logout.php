<?php
require ("./connection.php");

session_start();

$query=$pdo->prepare("INSERT INTO logs (ip_address,entry_history,exit_history) VALUES (:lip,:lentry_history,:lexit_history)");
$query->execute([
    "lip"=>$_SESSION["ip"],
    "lentry_history"=>$_SESSION["entry_history"],
    "lexit_history"=> date("Y-m-d H:m:s"),
]);

session_destroy();

header("Location:login.php");

