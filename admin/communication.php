<?php
session_start();
if (!$_SESSION["login"]) {
    header("Location:login.php");
}
?>
<?php
require "connection.php";
$query = $pdo->query("SELECT * FROM admin")->fetch();
?>

<!DOCTYPE html>
<html lang="en-gb">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css">
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 25px;

        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 99999px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 25px;
            width: 25px;
            left: 0px;
            bottom: 0px;
            border-radius: 100%;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(25px);
            -ms-transform: translateX(25px);
            transform: translateX(25px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php
include "templates/nav.php"
?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>


                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">



                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $query["first_name"] . " " . $query["last_name"] ?></span>
                            <img class="img-profile rounded-circle"
                                 src="img/undraw_profile.svg">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">

                            <a class="dropdown-item" href="admin_ayar.php">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Exit
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Communication</h1>

                    <div class="card mt-3 mb-5">
                    <div class="card-header d-flex justify-content-between">
                        <span>Address Information</span>
                        <?php
$query = $pdo->prepare("SELECT * FROM settings WHERE id=:aid");
$query->execute([
    "aid" => 1,
]);
$ayar = $query->fetch();

?>
                    </div>
                    <div class="card-body">
                        <form action="ajax/contact_transaction.php"  method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">E-mail Address</label>
                                        <input name="email" type="text" value="<?php echo $ayar["email"]; ?>" class="form-control" id="formGroupExampleInput" placeholder="bilgi@siteadi.com">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Mobile No.</label>
                                        <input type="tel" name="tel" value="<?php echo $ayar["tel"]; ?>" class="form-control" id="formGroupExampleInput" placeholder="XXXXX-XXXXX">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Address Information</label>
                                        <textarea name="address"  id="" class="d-block w-100 form-control" rows="7" placeholder="address bilgisi giriniz..."><?php echo $ayar["address"]; ?></textarea>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Google Maps Link</label>
                                        <textarea name="harita" id="" class="d-block w-100 form-control"  rows="7" placeholder="Google harita linkini giriniz.."><?php echo $ayar["map_link"]; ?></textarea>
                                    </div>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary">Save Changes</button>

                        </form>
                    </div>
                </div>

                    <div class="card mt-3 mb-5">
                        <div class="card-header d-flex justify-content-between">
                            <span>Social Media Area</span>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_service">
                            Add Account
                            </button>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Transactions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
$query = $pdo->query("SELECT * FROM social");
$socials = $query->fetchAll();
?>
                                <?php foreach ($socials as $social): ?>
                                    <tr>
                                        <td><?=$social["ad"]?></td>
                                        <td>
                                            <img src="<?="../" . $social["image"]?>" alt="" width="50" height="50">
                                        </td>
                                        <td><?=$social["link"]?></td>
                                        <td>
                                            <a href="<?="ajax/social_delete.php?sil_id=" . $social["id"]?>" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach;?>

                                </tbody>
                            </table>
                        </div>
                    </div>

            </div>


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    <div class="modal fade close_pass" id="add_service" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Social Media Account</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="ajax/social_add.php" enctype="multipart/form-data" method="post">

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Title</label>
                            <input type="text" class="form-control" name="title"  placeholder="Add Title">
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlInput1" class="d-block">Icon</label>
                            <img src="#" id="image_goster1"  data-fancybox="gallery" style="height: 150px;width: 150px;object-fit: contain">
                            <input type="file" id="slider_image1" name="icon" accept="images/*" class="d-block form-control mt-3">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Link</label>
                            <input name="link" class="form-control">
                        </div>

                        <div class="float-right">
                            <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                            <input type="submit"  class="btn btn-success guncelle_btn" value="Save">
                        </div>

                    </form>

                    </form>

                </div>
            </div>
        </div>




    </div>

    <!-- Footer -->

    <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade close_pass" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Log out</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Are you sure you want to exit the current session ?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="logout.php">Exit</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    $("#image_goster1").hide();
    $("#slider_image1").change(function (e) {
        let input = e.target;
        const reader = new FileReader();

        reader.onload = function () {
            const dataURL = reader.result;
            $("#image_goster1").show();
            $("#image_goster1").attr("src",dataURL);
        }
        reader.readAsDataURL(input.files[0]);

    })

</script>


</body>

</html>

