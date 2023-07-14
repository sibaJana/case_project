<?php
// Check if a file was uploaded
if (isset($_FILES['imageFile']) && $_FILES['imageFile']['error'] === UPLOAD_ERR_OK) {
    $sourceImagePath = $_FILES['imageFile']['tmp_name'];
    $compressedImagePath = 'compressed_image.jpg';

    // Set the maximum file size in kilobytes (e.g., 40 KB)
    $maxFileSizeKB = $_POST['maxFileSize'] *100;

    // Get the original image dimensions
    list($sourceWidth, $sourceHeight) = getimagesize($sourceImagePath);

    // Load the source image
    $sourceImage = imagecreatefromjpeg($sourceImagePath);

    // Calculate the new dimensions based on a desired file size
    $desiredFileSize = $maxFileSizeKB * 1024; // Convert KB to bytes
    $compressionQuality = 90; // Adjust this value as needed
    $newWidth = sqrt($desiredFileSize * $sourceWidth / $sourceHeight / $compressionQuality);
    $newHeight = $newWidth * $sourceHeight / $sourceWidth;

    // Create a new image with the calculated dimensions
    $compressedImage = imagecreatetruecolor($newWidth, $newHeight);

    // Resize the source image to the compressed image
    imagecopyresampled($compressedImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $sourceWidth, $sourceHeight);

    // Save the compressed image with reduced quality
    imagejpeg($compressedImage, $compressedImagePath, $compressionQuality);

    // Free up memory
    imagedestroy($sourceImage);
    imagedestroy($compressedImage);

    // Set appropriate headers for the download
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="compressed_image.jpg"');
    header('Content-Length: ' . filesize($compressedImagePath));

    // Output the compressed image for download
    readfile($compressedImagePath);
    exit;
} else {
    http_response_code(400);
    echo 'Error: No file was uploaded.';
    exit;
}
?>



