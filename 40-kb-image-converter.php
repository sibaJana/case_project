<!DOCTYPE html>
<html>
<head>
<title>Image Compressor - Compress and Optimize Images</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="./img/coding.png" type="image/x-icon">
  <meta name="keywords" content="40 kb image converter,convert image to 40 kb,image compressor to 15kb,image compressor,image compressor to 30kb,pi7 image compressor,image compressor to 150 kb,image compressor to 150kb,image compressor to 80kb,image compressor to 25kb,image compressor 300kb,image compressor to 1mb">
  <meta name="description" content="Compress your images to a desired file size, such as 40 KB, 15 KB, 30 KB, 150 KB, 80 KB, 25 KB, 300 KB, or 1 MB, with our efficient image compressor. Convert and optimize your images without compromising on quality.">
  <meta name="robots" content="index, follow">
  <meta name="author" content="siba jana">
  <meta name="canonical" href="https://www.alpokotha.in/40-kb-image-converter.php">
  <link rel="stylesheet" href="style.css">
  <?php include 'cs.php' ?>
  <style>
    p,ul li{
      font-size: 20px;
    }
  </style>
  <script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "WebPage",
  "name": "Image Compressor - Compress and Optimize Images",
  "description": "Compress your images to a desired file size with our efficient image compressor. Convert and optimize your images without compromising on quality.",
  "url": "https://www.alpokotha.in/40-kb-image-converter.php",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "https://www.alpokotha.in/40-kb-image-converter.php"
  },
  "inLanguage": "en-US",
  "keywords": "40 kb image converter, convert image to 40 kb, image compressor to 15kb, image compressor, image compressor to 30kb, pi7 image compressor, image compressor to 150 kb, image compressor to 150kb, image compressor to 80kb, image compressor to 25kb, image compressor 300kb, image compressor to 1mb",
  "author": {
    "@type": "Person",
    "name": "siba jana"
  },
  "datePublished": "2023-07-14",
  "dateModified": "2023-07-14",
  "image": {
    "@type": "ImageObject",
    "url": "https://www.alpokotha.in/img/coding.png",
    "width": 32,
    "height": 32
  }
}
</script>

</head>
<body>
<div class="container">
<?php include 'navbar.php' ?> 
  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-12">
      <h1 class="title text-center mt-3">Image Compressor - Compress and Optimize Images</h1>
      <form id="imageForm" enctype="multipart/form-data">
        <div class="form-group">
          <label for="imageFile" class="form-label mt-3">Select an image:</label>
          <input type="file" id="imageFile" name="imageFile" accept="image/*" required class="form-control">
        </div>
        <div class="form-group">
          <label for="maxFileSize" class="form-label mt-3">Maximum file size (KB):</label>
          <input type="number" id="maxFileSize" name="maxFileSize" min="1" required class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary mt-3">Compress Image</button>
        </div>
      </form>
      <div id="message" class="message"></div>
    </div>
  </div>
  <p class="mt-5">Click the "Compress Image" button to start the compression process.</p>

    <p>After the compression is completed, you will see a message indicating the success or failure of the compression process.</p>

    <p>If the compression is successful, the message will display "Image compressed successfully!" and provide a download link for the compressed image.</p>

    <p>If the compression fails, the message will display "Image compression failed."</p>

    <p class="mb-4">Note: The compression process may take a few moments depending on the size of the image and the specified maximum file size.</p>

    <p>Once the compression is successful, click on the <a href="#" class="btn btn-primary">Download Compressed Image</a> link to download the compressed image file to your device.</p>

    <p>You can repeat the process to compress other images by selecting a new image and specifying the maximum file size.</p>

    <h2 class="mt-5 mb-3">Tips for best <a href="online-csv-viewer.php"> results</a>:</h2>

    <ul>
      <li>Choose the maximum file size carefully, balancing between the desired file size and the quality of the compressed image.</li>
      <li>Larger original images may require a higher maximum file size to maintain acceptable quality after compression.</li>
      <li>Experiment with different maximum file sizes to find the optimal balance between file size and image quality.</li>
    </ul>
</div>
<?php include 'js.php' ?>
<?php include 'footer.php' ?>

  <script>
    document.getElementById('imageForm').addEventListener('submit', function(event) {
      event.preventDefault();
      var form = event.target;
      var formData = new FormData(form);

      // Display a loading message
      var messageElement = document.getElementById('message');
      messageElement.textContent = 'Compressing the image...';

      // Send the form data using AJAX
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'compress.php', true);
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
          if (xhr.status === 200) {
            // Compression successful
            messageElement.textContent = 'Image compressed successfully!';

            // Create a download link for the compressed image
            var downloadLink = document.createElement('a');
            downloadLink.href = 'compressed_image.jpg';
            downloadLink.textContent = 'Download Compressed Image';
            downloadLink.download = 'compressed_image.jpg';

            // Append the download link to the message element
            messageElement.appendChild(document.createElement('br'));
            messageElement.appendChild(downloadLink);
          } else {
            // Compression failed
            messageElement.textContent = 'Image compression failed.';
          }
        }
      };
      xhr.send(formData);
    });
  </script>
</body>
</html>
