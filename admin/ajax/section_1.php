<?php
require ("../connection.php");

if (isset($_POST)){

    $main_title =$_POST["main_title"];
    $sub_title=$_POST["sub_title"];
    $project_number=$_POST["project_number"];
    $calisan_sayi=$_POST["calisan_sayi"];
    $contents=$_POST["contents"];


   if ($_FILES["image"]["size"]!=0){

       $hedef_yol = dirname(__FILE__,3)."/images/";
       $hedef_dosya= $hedef_yol.basename($_FILES["image"]["name"]);

       move_uploaded_file($_FILES['image']['tmp_name'],$hedef_dosya);

       $yol = "images/".basename($_FILES["image"]["name"]);




       $query = $pdo->prepare("UPDATE section_1 SET 
                                        main_title=:main_title,
                                        sub_title=:sub_title,
                                        project_number=:project_number,
                                        number_of_persons=:number_of_persons,
                                        image=:gorsel,
                                        contents=:contents  WHERE id=:aid");
       $query->execute([
           "aid"=>1,
           "main_title"=>$main_title,
           "sub_title"=>$sub_title,
           "project_number"=>$project_number,
           "number_of_persons"=>$calisan_sayi,
           "gorsel"=>$yol,
           "contents"=>$contents,
       ]);

   }else{
       $query = $pdo->prepare("UPDATE section_1 SET 
                                        main_title=:main_title,
                                        sub_title=:sub_title,
                                        project_number=:project_number,
                                        number_of_persons=:number_of_persons,
                                        contents=:contents  WHERE id=:id");
       $query->execute([
           "main_title"=>$main_title,
           "sub_title"=>$sub_title,
           "project_number"=>$project_number,
           "number_of_persons"=>$calisan_sayi,
           "contents"=>$contents,
           "id"=>1
       ]);


   };



  header("Location:../Home Page.php");
}