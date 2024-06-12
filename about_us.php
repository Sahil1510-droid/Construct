<?php
require "admin/connection.php";

$query=$pdo->query("SELECT *,concat(DATE_FORMAT(opening_time,\"%H:%i\"),\"-\",DATE_FORMAT(closing_time,\"%H:%i\")) as zaman  from settings");
$settings= $query->fetch();


?>


<!DOCTYPE html>
<html lang="en-gb">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About us | <?= $settings["site_ad"] ?></title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">

</head>



<body style="background-color: <?= $settings["bg_color"] ?>">

<?php
include "includes/header.php";
?>

<?php
$query=$pdo->query("SELECT * FROM about_us");
$about_us=$query->fetch();
?>
<div class="container-fluid p-0">
    <div>
        <img src="https://www.enka.com/wp-content/uploads/2015/07/About_Us_si_4_2018.jpg" alt="" class="w-100" >
    </div>

    <div class="container">
        <?= $about_us["contents"] ?>
    </div>
</div>


  <!-- Footer Bottom -->
<?php
include "includes/footer.php";
?>
  <!-- Footer Bottom -->
  <script src="js/bootstrap.bundle.js"></script>
  <script src="js/fontawesome.js"></script>

</body>

</html>