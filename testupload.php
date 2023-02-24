<?php

if (isset($_POST['submit'])) {
    $file = $_FILES['file'];
    $targetDirectory = "uploads/";
    $result = uploadFile($file, $targetDirectory);
    echo $result;
}
 
function uploadFile($file, $targetDirectory) {
    $fileName = basename($file['name']);
    $targetFilePath = $targetDirectory . $fileName;
    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
 
    // Create target directory if it doesn't exist
    if (!file_exists($targetDirectory)) {
        mkdir($targetDirectory, 0755, true);
    }
 
    // Check if file already exists
    if (file_exists($targetFilePath)) {
        return "File already exists.";
    }
 
    // Check file size
    if ($file['size'] > 5000000) { // 5MB
        return "File size exceeds maximum allowed.";
    }
 
    // Allow certain file formats
    $allowedTypes = array('jpg', 'jpeg', 'png', 'gif', 'pdf');
    if (!in_array($fileType, $allowedTypes)) {
        return "Only JPG, JPEG, PNG, GIF, and PDF files are allowed.";
    }
 
    // Check for PHP files
    if ($fileType == "php") {
        return "PHP files are not allowed.";
    }
 
    // Check for executable files
    $isExecutable = false;
    if (in_array($fileType, array('exe', 'bat', 'cmd'))) {
        $isExecutable = true;
    } elseif (function_exists('finfo_open')) {
        $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($fileInfo, $file['tmp_name']);
        finfo_close($fileInfo);
        if (in_array($mime, array('application/x-msdownload', 'application/x-executable'))) {
            $isExecutable = true;
        }
    }
    if ($isExecutable) {
        return "Executable files are not allowed.";
    }
 
    // Upload file
    if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
        return "File uploaded successfully.";
    } else {
        return "There was an error uploading your file.";
    }
}


?>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" name="submit" value="Upload">
</form>
