<?php
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$calender = $_POST["calender"];
$gender = $_POST["gender"];
$Input = $_POST["select"];
$file = $_FILES["Document"]["name"];
$filesize = $_FILES["Document"]["size"];
$filetype = pathinfo($file, PATHINFO_EXTENSION);
$file_tmp = $_FILES["Document"]["tmp_name"];

if ($filetype == "pdf") {
    if ($filesize < 204800) {
        $folders = [
            "Aadhar" => "Aadhar/",
            "License" => "License/",
            "voter" => "voter/",
            "Pan" => "Pan/"
        ];

        if (array_key_exists($Input, $folders)) {
            $actual_path = $folders[$Input] . $file;
            move_uploaded_file($file_tmp, $actual_path);
        }
    } else {
        echo '<p style="color: red;">File Size Exceeds!</p><br>';
    }
} else {
    echo '<p style="color: red;">Only PDFs are allowed!</p><br>';
}

$file_name = $_FILES["uploadfile"]["name"];
$file_size = $_FILES["uploadfile"]["size"];
$file_type = pathinfo($file_name, PATHINFO_EXTENSION);
$tmp = $_FILES["uploadfile"]["tmp_name"];
$actualImg_path = "Image/" . $file_name;

if ($file_type == "jpeg" || $file_type == "png" || $file_type == "jpg") {
    if ($file_size < 10000000) {
        move_uploaded_file($tmp, $actualImg_path);
    } else {
        echo '<p style="color: red;">Image Size Exceeds!</p><br>';
    }
} else {
    echo '<p style="color: red;">Wrong File Selected</p>';
}

echo '<div style="margin: 20px; padding: 20px; border: 2px solid #ccc; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">';
echo '<h2 style="color: #007bff;">Uploaded Information</h2>';
if ($file_type == "jpeg") {
    echo '<img src="Image/smile.jpeg" style="border: 2px solid black; padding: 5px; border-radius: 5px;" alt="Image" height="100px" width="100px"><br>';
}
if ($file_type == "jpg") {
    echo '<img src="Image/smile.jpg" style="border: 2px solid black; padding: 5px; border-radius: 5px;" alt="Image" height="100px" width="100px"><br>';
}
if ($file_type == "png") {
    echo '<img src="Image/smile.png" style="border: 2px solid black; padding: 5px; border-radius: 5px;" alt="Image" height="100px" width="100px"><br>';
}

echo '<p style="font-size: 1.2rem; font-weight: bold;">Name: '.$firstname.' '.$lastname.'</p>';
echo '<p style="font-size: 1.2rem; font-weight: bold;">DOB: '.$calender.'</p>';
echo '<p style="font-size: 1.2rem; font-weight: bold;">Gender: '.$gender.'</p>';
echo '<p style="font-size: 1.2rem; font-weight: bold;">ID Proof Selected: '.$file.'</p><br>';

if ($Input == "Aadhar") {
    echo '<a href="Aadhar/docs.pdf" style="text-decoration: none; color: white; background-color: #007bff; padding: 10px 20px; border-radius: 5px; font-weight: bold;">Download Aadhar Card</a><br>';
}
if ($Input == "License") {
    echo '<a href="License/docs.pdf" style="text-decoration: none; color: white; background-color: #007bff; padding: 10px 20px; border-radius: 5px; font-weight: bold;">Download License</a><br>';
}
if ($Input == "voter") {
    echo '<a href="voter/docs.pdf" style="text-decoration: none; color: white; background-color: #007bff; padding: 10px 20px; border-radius: 5px; font-weight: bold;">Download Voter ID</a><br>';
}
if ($Input == "Pan") {
    echo '<a href="Pan/docs.pdf" style="text-decoration: none; color: white; background-color: #007bff; padding: 10px 20px; border-radius: 5px; font-weight: bold;">Download Pan Card</a><br>';
}

echo '</div>';
?>
