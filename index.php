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
  <title>Home Page | <?= $settings["site_ad"] ?></title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
  <link rel="stylesheet" href="css/main.css">


</head>



<body style="background-color: <?= $settings["bg_color"] ?>">

<?php
include "includes/header.php";
?>
  <!-- Slider -->
  <div class="container-fluid p-0">
    <div class="swiper ana">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <!-- Slides -->
          <?php
          $query = $pdo->prepare("SELECT * FROM slider WHERE status=:status");
          $query->execute([
                  "status"=>1
          ]);

          $sliders = $query->fetchAll();

          ?>
          <?php foreach ($sliders as $slider): ?>
        <div class="swiper-slide">
            <div class="container-fluid position-relative p-0 ">
            <img src="<?= $slider["image"] ?>" class="slider_ana"  alt="">
                <div class="capture over_slide">
                    <div class="container">
                            <h1 class="fw-bold text-white display-3 w-75"><?= $slider["title"] ?></h1>
                            <p class="text-white fw-bold w-50"><?= $slider["explanation"] ?></p>

                    </div>
                </div>


            </div>
        </div>
          <?php endforeach; ?>

      </div>
      <!-- If we need pagination -->
      <div class="swiper-pagination"></div>

      <!-- If we need navigation buttons -->
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>

    </div>
  </div>
  <!-- Slider -->

  <!-- Hero -->
  <div class="container py-4 mt-md-5 mb-md-5">
    <div class="row">
      <div class="col">
<?php
$query=$pdo->query("SELECT * FROM section_1");
$bolum= $query->fetch();

?>
        <div>
          <h4 class="c-sari small fw-bold fs-6 mb-4"><?= $bolum["main_title"] ?></h4>
          <h1 class="c_mavi fw-bold mb-5"><?= $bolum["sub_title"] ?></h1>
        </div>

        <div class="d-flex flex-column">
          <p><?= $bolum["contents"] ?>
          </p>

<!--          <ul class="list-unstyled columcunt">-->
<!--            <li class="mb-3">-->
<!--              <i class="fa-solid fa-check bg_sari p-1 rounded-circle text-white"></i>-->
<!--              <span class="text-capitalize">Kalite Kontrol Sistemi </span>-->
<!--            </li>-->
<!--            <li class="mb-3">-->
<!--              <i class="fa-solid fa-check bg_sari p-1 rounded-circle text-white"></i>-->
<!--              <span class="text-capitalize">%100 Memnuniyet Garantisi </span>-->
<!--            </li>-->
<!--            <li class="mb-3">-->
<!--              <i class="fa-solid fa-check bg_sari p-1 rounded-circle text-white"></i>-->
<!--              <span class="text-capitalize">Son Derece Profesyonel Kadro </span>-->
<!--            </li>-->
<!---->
<!--            <li class="mb-3">-->
<!--              <i class="fa-solid fa-check bg_sari p-1 rounded-circle text-white"></i>-->
<!--              <span class="text-capitalize">Rakipsiz işçilik </span>-->
<!--            </li>-->
<!--            <li class="mb-3">-->
<!--              <i class="fa-solid fa-check bg_sari p-1 rounded-circle text-white"></i>-->
<!--              <span class="text-capitalize">Doğru Test Süreçleri </span>-->
<!--            </li>-->
<!--            <li class="mb-3">-->
<!--              <i class="fa-solid fa-check bg_sari p-1 rounded-circle text-white"></i>-->
<!--              <span class="text-capitalize">Profesyonel ve Nitelikli </span>-->
<!--            </li>-->
<!--          </ul>-->

        </div>

      </div>

      <div class="col">

        <div class="d-flex justify-content-between align-items-center mb-5">
          <div class="d-flex flex-column">
            <h1 class="fw-bold fs-1 c-sari"><?= $bolum["project_number"] ?>+</h1>
            <p class="fw-bold text-black">Projects Completed</p>
          </div>
          <div class="d-flex flex-column">
            <h1 class="fw-bold fs-1 c-sari"><?= $bolum["number_of_persons"] ?>+</h1>
            <p class="fw-bold text-black">Our Employees </p>
          </div>
        </div>

        <div>
          <img class="w-100 hero_logo" src="<?= $bolum["image"] ?>" alt="">
        </div>

      </div>
    </div>
  </div>
  <!-- Hero -->

  <!-- Our Services -->
  <div class="py-4 bg_hizmet">
    <div class="container py-4">
      <div class="text-center mb-5">
        <h1 class="fw-bold c_mavi">Our Services</h1>
        <p>We offer services at the most affordable and economical prices.</p>
      </div>
      <div class="swiper about_us">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <?php
            $query= $pdo->query("SELECT * FROM services");
            $services = $query->fetchAll();
            ?>
            <?php foreach ($services as $hizmet): ?>
          <div class="swiper-slide">
            <div class="d-flex flex-column align-items-center border border-1 border-secondary p-5 hizmet_eft">
              <img src="<?= $hizmet["image"] ?>" alt="" class="icon_hizmet">
              <span href="#" class="text-decoration-none my-4 fw-bold"><?= $hizmet["title"] ?></span>
              <p><?= $hizmet["contents"] ?></p>
            </div>
          </div>

            <?php endforeach; ?>


        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>


      </div>
    </div>
  </div>
  <!-- Our Services -->


  <!-- Güncel Yazılarımız -->
  <div class="container py-4">
    <div class="d-flex align-items-center justify-content-between my-4">
      <h1 class="c_mavi fw-bold">Our Projects</h1>

      <div>
        <i class="blog-button-prev fa-solid fa-arrow-left p-2 bg_mavi text-white"></i>
        <i class="blog-button-next fa-solid fa-arrow-right p-2 bg_sari text-white"></i>
      </div>

    </div>
    <div class="swiper blog">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
          <?php
          date_default_timezone_set('Europe/Istanbul');
          $date = new DateTime("2021-11-11 05:00");




          $query=$pdo->query("SELECT *,DATE_FORMAT(history,\"%d %M %Y\") as history_format FROM articles");
          $articles= $query->fetchAll();

          ?>

          <?php foreach ($articles as $yazi): ?>
        <div class="swiper-slide">
          <div class="d-flex flex-column gap-2 small">
            <a href="#" class="d-inline-flex text-decoration-none">
              <img src="<?= $yazi["yazi_image"] ?>" class="w-100 rounded slider_img" alt="">
            </a>
            <span class="fw-bold text-black-50"><?= $yazi["history_format"] ?></span>
            <a href="#" class="d-flex text-decoration-none">
              <h1 class="fs-3 c_mavi"><?= $yazi["title"] ?></h1>
            </a>
                <?= $yazi["contents"] ?>
          </div>
        </div>
          <?php endforeach; ?>

      </div>



    </div>
  </div>
  <!-- Güncel Yazılarımız -->



  <!-- Footer Bottom -->
<?php
include "includes/footer.php";
?>
  <!-- Footer Bottom -->
  <script src="js/bootstrap.bundle.js"></script>
  <script src="js/fontawesome.js"></script>
  <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
  <script src="js/app.js"></script>

</body>

</html>