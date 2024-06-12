<?php

require("../connection.php");

$logs = $pdo->query("DELETE FROM logs");
header("Location:../log-islem.php");