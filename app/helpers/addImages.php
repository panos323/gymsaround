<?php

// Add images to local folder
function addImage(string $folder, string $subfolder) {

    // Get Image Details
    $image_file = $_FILES["image"]["name"];
    $temp  = $_FILES["image"]["tmp_name"];

    $user_image_path = "../../public/images/$folder/$subfolder";
    if (!file_exists($user_image_path)) {
        mkdir($user_image_path, 0777, true);
    }

    move_uploaded_file($temp, $user_image_path.'/'.$image_file);
    return $image_file;
}