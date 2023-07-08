
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Use this online notepad to write, edit, and save your text. It's a simple and easy-to-use tool that's perfect for anyone who needs to create or edit text.">
    <meta name="keywords" content="online notepad,online text editor, free text editor, simple text editor,easy-to-use text editor,web-based text editor,cloud-based text editor">
    <meta property="og:title" content="Online Notepad: Write, Edit, and Save Your Text Online">
    <meta property="og:description" content="Use this online notepad to write, edit, and save your text. It's a simple and easy-to-use tool that's perfect for anyone who needs to create or edit text.">
    <meta property="og:url" content="https://alpokotha.in/online-notepad">
    <meta property="og:type" content="website">
    <title>Online Notepad: Write, Edit, and Save Your Text Online</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebApplication",
      "name": "Online Notepad",
      "description": "Use this online notepad to write, edit, and save your text. It's a simple and easy-to-use tool that's perfect for anyone who needs to create or edit text.",
      "url": "https://alpokotha.in/online-notepad",
      "applicationCategory": "Utility",
      "operatingSystem": "All",
      "offers": {
        "@type": "Offer",
        "price": "0",
        "priceCurrency": "USD"
      }
    }
  </script>
</head>

<body>
 <div class="container">
 <?php require 'navbar.php';  ?>

 <div class="row align-items-center">
    <div class="col">
      <h1 class="text-success mb-0 mt-1">online notepad</h1>
    </div>
    <div class="col-auto">

    </div>
  </div>
  <form>
  <div class="mb-3 textarea-container">
    <label for="textInput">Text:</label>
    <textarea class="form-control" id="textInput" name="textInput" rows="5" placeholder="Enter your text"></textarea>
   </div>
</form>
<?php include 'footer.php'; ?>
  </div> 

<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.tiny.cloud/1/kwklcshmx4pichu7rsvysckgtk6l8m1vkjgmz0pt8dyfroo8/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>


$(document).ready(function(){
    tinymce.init({
      selector: 'textarea',
      browser_spellcheck: false,
  contextmenu: false,
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
});


</script>
</body>
</html>
