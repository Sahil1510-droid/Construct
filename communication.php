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
  <title>Communication | <?= $settings["site_ad"] ?></title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">

</head>


<body style="background-color: <?= $settings["bg_color"] ?>">

<?php
include "includes/header.php";
?>

<div class="container mt-2">
    <h1 class="c-sari fs-3 fw-bold">Contact us</h1>
</div>

<div class="container">
<div class="card bg-light">
    <ul class="list-unstyled" style="column-count: 2">
        <li>
            <span class="fw-bold">Our Address:</span>
            <p><?= $settings["address"] ?></p>
        </li>
        <li>
            <span class="fw-bold">Telefon No:</span>
            <p><?= $settings["tel"] ?></p>
        </li>
        <li>
            <span class="fw-bold">Our Email Address</span>
            <p><?= $settings["email"] ?></p>
        </li>
        <li>
            <span class="fw-bold">Our Social Media Accounts:</span>
            <?php
            $query = $pdo->query("SELECT * FROM social");
            $socials= $query->fetchAll();
            ?>
            <ul class="d-flex list-unstyled gap-3 mb-0">
                <?php foreach ($socials as $social): ?>
                    <li>
                        <a href="<?= $social["link"] ?>"
                           target="_blank"
                        >
                            <img src="<?= $social["image"] ?>" class="icon_social" alt="">
                        </a>
                    </li>
                <?php endforeach; ?>

            </ul>
        </li>
    </ul>



</div>
</div>



  <div class="container py-3">
    <div class="row">
      <div class="col-md-7">
        <form class="row g-3" action="mail.php" method="POST">
          <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Your Name:</label>
            <input type="text" name="fname" class="form-control" id="inputEmail4" placeholder="Your Name">
          </div>
          <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Your Surname:</label>
            <input type="text" name="lname" class="form-control" id="inputPassword4" placeholder="Your Surname">
          </div>
          <div class="col-12">
            <label for="inputAddress" class="form-label">Your e-mail address:</label>
            <input type="email" name="email" class="form-control" id="inputAddress" placeholder="xxxx@gmail.com">
          </div>

          <div class="col-md-12">
            <label for="inputAddress" class="form-label">Topic Title:</label>
            <select class="form-select" name="subject" title="subject" aria-label="Default select example">
              <option value="Complaint">Complaint</option>
              <option value="Support ">Support</option>
            </select>
          </div>
          <div class="col-12">
            <label for="inputAddress" class="form-label d-block">Your Message:</label>
            <textarea name="message" id="" class="w-100" rows="10"></textarea>
          </div>
          <div class="col-12">
            <button type="submit" name="send" class="btn bg_mavi text-white">Send My Message</button>
          </div>

        </form>
      </div>
      <div class="col harita">
        <?= $settings["map_link"] ?>
      </div>

    </div>
  </div>

<?php
include "includes/footer.php";
?>

  <script src="js/bootstrap.bundle.js"></script>
  <script src="js/fontawesome.js"></script>
</body>

</html>