<?php
require ("../connection.php");
if (isset($_POST)){
    $site_ad =$_POST["site_adi"];
    $header_color=$_POST["header_color"];
    $footer_color=$_POST["footer_color"];
    $bg_color=$_POST["bg_color"];



    $short_introduction=$_POST["short_introduction"];
    $opening_time=$_POST["opening_time"];
    $closing_time=$_POST["closing_time"];




    if ($_FILES["logo_image"]["size"]!=0){


        $hedef_yol = dirname(__FILE__,3)."/images/";
        $hedef_dosya= $hedef_yol.basename($_FILES["logo_image"]["name"]);

        move_uploaded_file($_FILES['logo_image']['tmp_name'],$hedef_dosya);

        $yol = "images/".basename($_FILES["logo_image"]["name"]);





        $query=$pdo->prepare("UPDATE settings SET 
                                        site_ad=:asite_ad,
                                        logo_img=:alogo_image,
                                        header_color=:aheader_color,
                                        footer_color=:afooter_color,
                                      
                                        short_introduction=:ashort_introduction,
                                        
                                        opening_time=:aopening_time,
                                        closing_time=:aclosing_time,
                                        bg_color=:abg_color WHERE id=:aid");
        $query->execute([
            "asite_ad"=>$site_ad,
            "alogo_image"=>$yol,
            "aheader_color"=>$header_color,
            "afooter_color"=>$footer_color,

            "ashort_introduction"=>$short_introduction,


            "aopening_time"=>$opening_time,
            "aclosing_time"=>$closing_time,

            "abg_color"=>$bg_color,
            "aid"=>1
        ]);

    }else{
        $query=$pdo->prepare("UPDATE settings SET 
                                        site_ad=:asite_ad,
                                        header_color=:aheader_color,
                                        footer_color=:afooter_color,
                                       
                                        short_introduction=:ashort_introduction,
                                       
                                        opening_time=:aopening_time,
                                        closing_time=:aclosing_time,
                                        bg_color=:abg_color WHERE id=:aid");
        $query->execute([
            "asite_ad"=>$site_ad,
            "aheader_color"=>$header_color,
            "afooter_color"=>$footer_color,

            "ashort_introduction"=>$short_introduction,


            "aopening_time"=>$opening_time,
            "aclosing_time"=>$closing_time,

            "abg_color"=>$bg_color,
            "aid"=>1
        ]);
    }







   header("Location:../genel-ayar.php");


}