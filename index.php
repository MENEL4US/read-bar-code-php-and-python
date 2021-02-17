<?php
    include_once "classes/Image.class.php";
    include_once "classes/Bar_code.class.php";

    // Get file upload
    $img = Image::upload();
    if (!$img) {
        echo "Upload error!"; die();
    }

    $img = Bar_code::info($img, "I25");

    var_dump($img);
?>