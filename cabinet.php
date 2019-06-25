<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>
<body>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="bootstrap/jQuery%20v3.4.1.js"></script>
    <h5>Личный кабинет</h5>
    <form method="post" enctype="multipart/form-data">
        <!--<div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>-->
        <div class="form-group">
            <label for="exampleInputFile">File input Avatar(JPG, GIF, PNG)</label>
            <input type="file" id="exampleInputFile" name="user_file[]" multiple="multiple">
            <p class="help-block">Изображение аватара 320*240 пикселей и не более 200 КБ</p>
        </div>

        <!--<div class="checkbox">
            <label>
                <input type="checkbox"> Check me out
            </label>
        </div>-->
        <button type="submit" class="btn btn-default btn-primary">Submit</button>
    </form>
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 14.05.2019
 * Time: 15:18
 */
include 'DB.php';
$max_image_width = 320;
$max_image_height = 240;
$max_image_size = 200000;//320 * 240;
$valid_types_images = ['jpg', 'gif', 'png'];
$valid_types_documents = ['pdf', 'doc', 'xls', 'txt'];
$max_document_size = 150000;
if (isset($_FILES['user_file']))
{
    echo '<div style="padding: 20px">';
    for($i=0;$i<count($_FILES['user_file']);$i++){
        if (is_uploaded_file($_FILES['user_file']['tmp_name'][$i]))
        {
            $filename = basename($_FILES['user_file']['name'][$i]);
            $ext = substr($_FILES['user_file']['name'][$i], 1 + strrpos($_FILES['user_file']['name'][$i], "."));
// strpos --  Возвращает позицию первого вхождения подстроки
// получим массив свойств файла
            $size = GetImageSize($_FILES['user_file']['tmp_name'][$i]);
            echo '$size = ' . $size . '<br>';
            echo '<pre>';
            print_r($size);
            echo '</pre>';
        }
    }
    echo '</div>';
}
?>