<?php
// Specify the path to your SQL file
$sqlFilePath = 'base.sql'; // Update this with the actual path

// Read the contents of the SQL file
$sqlContent = file_get_contents($sqlFilePath);

// Set the appropriate Content-Type header
header('Content-Type: text/plain');

// Output the SQL content
echo $sqlContent;
?>