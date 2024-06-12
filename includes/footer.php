<style>
    #back-to-top {
    color: white;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s ease, text-decoration 0.3s ease;
}

#back-to-top:hover {
    color: red; /* Change to the color you want on hover */
    text-decoration: underline;
}

</style>


<?php
require "admin/connection.php";
$query = $pdo->query("SELECT * from menus WHERE status=1");
$menus = $query->fetchAll();

?>

<?php
$query = $pdo->query("SELECT *,concat(DATE_FORMAT(opening_time,\"%H:%i\"),\"-\",DATE_FORMAT(closing_time,\"%H:%i\")) as zaman  from settings");
$settings = $query->fetch();

?>

<footer class="container-fluid footer_color" style="background-color: <?=$settings["footer_color"]?>">
    <div class="container p-0 p-md-4">
        <div class="row">
            <div class="col-md-4">
                <h1 class="fs-6 text-white fw-bold mb-3">Who Are We ?</h1>
                <a href="index.php">
                    <img src="<?=$settings["logo_img"]?>" class="mb-3 logo" alt="">
                </a>
                <p class="text-white">
                    <?=$settings["short_introduction"]?>
                </p>
            </div>

            <div class="col-md">
                <h1 class="fs-6 text-white fw-bold mb-3">Support</h1>
                <ul class="d-flex  list-unstyled flex-column gap-3">
                    <li>
                        <a href=" #" class="text-white text-decoration-none menu_link">Frequently Asked Questions</a>
                    </li>
                    <li>
                        <a href="#" class="text-white text-decoration-none menu_link">Our Usage Rights</a>
                    </li>
                    <li>
                        <a href="#" class="text-white text-decoration-none menu_link">Confidentiality Agreement</a>
                    </li>
                    <li>
                        <a href="./communication.php" class="text-white text-decoration-none menu_link">Contact Us</a>
                    </li>

                </ul>
            </div>

            <div class="col-md">
                <h1 class="fs-6 text-white fw-bold mb-3">Links</h1>
                <ul class="d-flex  list-unstyled flex-column gap-3">
                    <?php foreach ($menus as $menu): ?>
                    <li>
                        <a href="<?=$menu["url"]?>" class="text-white text-decoration-none menu_link"><?=$menu["ad"]?></a>
                    </li>
                    <?php endforeach;?>

                </ul>
            </div>



            <div class="col-md-4">
                <h1 class="fs-6 text-white fw-bold mb-3">Our Communication Information</h1>
                <ul class="d-flex  list-unstyled flex-column gap-3">

                    <li class="text-white d-flex align-items-center">
                        <i class="fa-regular fa-map me-2"></i>
                        <span><?=$settings["address"]?></span>
                    </li>


                    <li class="text-white d-flex">
                        <i class="fa-solid fa-square-phone me-2"></i>
                        <?=$settings["tel"]?>
                    </li>
                    <li class="text-white d-flex">
                        <i class="fa-regular fa-envelope me-2"></i>
                        <span> <?=$settings["email"]?></span>
                    </li>
                    <li class="text-white d-flex">
                        <i class="fa-regular fa-calendar me-2"></i>
                        <?=$settings["zaman"]?>
                    </li>
                </ul>
            </div>

        </div>
    </div>
    <div class="container d-flex justify-content-between align-items-center pb-2 d-md-flex d-none">
        <?php
$query = $pdo->query("SELECT * FROM social");
$socials = $query->fetchAll();
?>
        <span class="text-white">© <?php echo date("Y"); ?> <?php echo $settings["site_ad"] ?></span>
        <ul class="d-flex list-unstyled gap-3 mb-0">
            <?php foreach ($socials as $social): ?>
            <li>
                <a href="<?=$social["link"]?>"
                   target="_blank"
                   >
                    <img src="<?=$social["image"]?>" class="icon_social" alt="">
                </a>
            </li>
            <?php endforeach;?>
<a href="#" id="back-to-top"><b>Back To Top &uarr;</b></a>
        </ul>
    </div>
</footer>