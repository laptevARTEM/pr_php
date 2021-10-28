<?php
$target_dir = "public/images/";
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
$isUploaded = false;
$filePath = '';
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$check = getimagesize($_FILES["photo"]["tmp_name"]);
if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $isUploaded = true;
    } else {
        echo "File is not an image.";
        $isUploaded = false;
}

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

if ($_FILES["photo"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
    && $fileType != "gif" ) {
    echo "Sorry,onlyJPG,JPEG,PNG&GIF files are allowed.";
    $uploadOk = 0;
}
if (!$isUploaded) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        $filePath = $target_dir . basename($_FILES["photo"]["name"]);
        echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
