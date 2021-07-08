<?php
if(!empty($_FILES['file'])) {
    $file = $_FILES['file'];
    $dir = __DIR__;
    $filename = time() . '.png';
    $path = $dir . '/'. $filename;

    move_uploaded_file($file['tmp_name'], $path);

    echo $filename;
}