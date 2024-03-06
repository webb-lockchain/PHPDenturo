<?php
if (!file_exists('uploads')) {
    mkdir('uploads', 0777);
}

foreach ($_FILES['file']['name'] as $key=>$val) {
    $filename = uniqid().'_'.$_FILES['file']['name'][$key];

    if(move_uploaded_file($_FILES['file']['tmp_name'][$key], 'uploads/'.$filename))
        echo "File(s) uploaded successfully.".$_FILES['file']['tmp_name'][$key]."==".$filename;
}


die;