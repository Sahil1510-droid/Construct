<?php
session_start();
if (!$_SESSION["login"]){
    header("Location:login.php");
}
?>
<?php
require ("connection.php");
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />


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
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $query["first_name"]." ". $query["last_name"] ?></span>
                            <img class="img-profile rounded-circle"
                                 src="img/undraw_profile.svg">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">

                            <a class="dropdown-item" href="admin_ayar.php">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                settings
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
                <div class="d-flex justify-content-between align-items-start">
                    <h1 class="h3 mb-4 text-gray-800">Home Page</h1>
                </div>
                <div class="card">
                    <div class="card-header">Section-1</div>
                    <div class="card-body">
                        <?php
                        $query = $pdo->prepare("SELECT * FROM section_1 WHERE id=:id");
                        $query->execute([
                            "id"=>1,
                        ]);
                        $tanitim = $query->fetch();

                        ?>
                        <form action="ajax/section_1.php" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Main Title</label>
                                <input type="text" name="main_title" class="form-control" id="exampleFormControlInput1" value="<?= $tanitim["main_title"] ?>">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Subtitle</label>
                                <input type="text" name="sub_title" class="form-control" id="exampleFormControlInput1" value="<?= $tanitim["sub_title"] ?>">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Number of Projects Completed</label>
                                        <input type="text" name="project_number" class="form-control" id="exampleFormControlInput1" value="<?= $tanitim["project_number"] ?>">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Number of Employees</label>
                                        <input type="text" name="calisan_sayi" class="form-control" id="exampleFormControlInput1" value="<?= $tanitim["number_of_persons"] ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1" class="d-block">First Featured Image</label>
                                <img src="<?= "../".$tanitim["image"] ?>" id="image_goster" data-fancybox="gallery" style="height: 250px;width: 250px;object-fit: contain">
                                <input type="file" id="slider_image" name="image" accept="images/*" class="d-block form-control mt-3">
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Contents</label>
                                <textarea name="contents" id="editor" class="form-control"><?= $tanitim["contents"] ?></textarea>
                            </div>
                            <button class="btn btn-primary" type="submit">Save</button>

                        </form>
                    </div>
                </div>

                <div class="card mt-3 mb-5">
                    <div class="card-header d-flex justify-content-between">
                        <span>Services Area</span>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_service">
                        Add Service
                        </button>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Icon</th>
                                <th scope="col">Contents</th>
                                <th scope="col">Transactions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $query= $pdo->query("SELECT * FROM services");
                            $services = $query->fetchAll();
                            ?>
                            <?php foreach ($services as $hizmet): ?>
                            <tr>
                                <td><?= $hizmet["title"] ?></td>
                                <td>
                                    <img src="<?= "../".$hizmet["image"] ?>" alt="" width="50" height="50">
                                </td>
                                <td><?= $hizmet["contents"] ?></td>
                                <td>
                                    <a href="<?= "ajax/hizmet_sil.php?sil_id=".$hizmet["id"] ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>

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
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Service</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="ajax/add_service.php" enctype="multipart/form-data" method="post">

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Title</label>
                            <input type="text" class="form-control" name="title"  placeholder="Main Title">
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlInput1" class="d-block">Icon</label>
                            <img src="#" id="image_goster1"  data-fancybox="gallery" style="height: 150px;width: 150px;object-fit: contain">
                            <input type="file" id="slider_image1" name="icon" accept="images/*" class="d-block form-control mt-3">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Explanation</label>
                            <textarea name="explanation"  cols="30" rows="5" class="form-control"></textarea>
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

    <!-- Footer -->
    <div class="modal fade close_pass" id="ekle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <form method="post" action="ajax/social_ekle.php" enctype="multipart/form-data">


                        <span class="mb-2 d-block">Ad</span>
                        <input type="text" id="duzenle_ad" class="w-100 p-2 mb-2" name="social_ad" placeholder="Menu Namenı giriniz...">

                        <span class="mb-2 d-block">Social Media Icon</span>
                        <img src="#" alt="" id="image_goster" style="height: 50px;width: 50px;object-fit: cover">
                        <input type="file" name="social_image" accept="image/*" id="slider_image">

                        <span class="mb-2 d-block mt-2">Social Media Link</span>
                        <input type="text"  name="social_baglanti" placeholder="Menu linkini giriniz..." class="w-100 p-2 mb-2">


                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit"  class="btn btn-success guncelle_btn" value="Save">
                </div>
                </form>

            </div>
        </div>
    </div>
    <!-- End of Footer -->

    <div class="modal fade close_pass" id="düzenle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Social Media Account</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="ajax/social_guncelle.php" enctype="multipart/form-data">

                        <input type="hidden" name="h_id" value="1" class="hidden_id">
                        <span class="mb-2 d-block">Ad</span>
                        <input type="text" id="duzenle_ad" class="w-100 p-2 mb-2 ds_ad" name="social_ad" placeholder="Menu Namenı giriniz...">

                        <span class="mb-2 d-block">Social Media Icon</span>
                        <img src="#" class="ds_img" alt="" id="image_goster1" style="height: 50px;width: 50px;object-fit: cover">
                        <input type="file" name="social_image" accept="image/*" id="slider_image1">

                        <span class="mb-2 d-block">Social Media Link</span>
                        <input type="text"  id="duzenle_link" name="social_link" placeholder="Menu linkini giriniz..." class="w-100 p-2 mb-2 ds_link">


                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit"  class="btn btn-success guncelle_btn" value="Update">
                </div>
                </form>

            </div>
        </div>
    </div>

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
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script src="vendor/ckeditör/ckeditor.js"></script>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            language: 'tr',
            height: 650
        } );

    $("#image_goster").show();
    $("#slider_image").change(function (e) {
        let input = e.target;
        const reader = new FileReader();

        reader.onload = function () {
            const dataURL = reader.result;
            $("#image_goster").show();
            $("#image_goster").attr("src",dataURL);
        }
        reader.readAsDataURL(input.files[0]);

    });

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

