<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the file was uploaded without errors
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        // Specify the target directory for file uploads
        $targetDir = "uploads/";

        // Create the target directory if it doesn't exist
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        // Get the name of the uploaded file
        $fileName = basename($_FILES["file"]["name"]);

        // Set the target path for the uploaded file
        $targetPath = $targetDir . $fileName;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetPath)) {
            echo "File uploaded successfully. Path: " . $targetPath;
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "Invalid file upload.";
    }
}
?>
