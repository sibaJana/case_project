<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php unserialize online</title>
    <meta name="description" content="Unserialize Online: Decode PHP Serialized Data Instantly! Try our free unserialize tool to quickly unserialize PHP data. Decode with ease. Fast and efficient! #1 choice for unserialize">
    <meta name="keywords" content="Unserialize Online, Unserialize, php unserialize online">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://www.alpokotha.in/php-unserialize-online.php">
    <meta property="og:title" content="php unserialize online">
    <meta property="og:description" content="Unserialize Online: Decode PHP Serialized Data Instantly! Try our free unserialize tool to quickly unserialize PHP data. Decode with ease. Fast and efficient! #1 choice for unserialize">
    <!-- <meta property="og:image" content="https://www.example.com/image.jpg"> -->
    <meta property="og:url" content="https://www.alpokotha.in/php-unserialize-online.php">
    <meta property="og:type" content="website">
    <meta name="twitter:title" content="php unserialize online">
    <meta name="twitter:description" content="Unserialize Online: Decode PHP Serialized Data Instantly! Try our free unserialize tool to quickly unserialize PHP data. Decode with ease. Fast and efficient! #1 choice for unserialize">
    <!-- <meta name="twitter:image" content="https://www.example.com/image.jpg"> -->
    <!-- <meta name="twitter:card" content="summary_large_image"> -->

    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Unserialize Online",
  "description": "An online tool for unserializing data",
  "url": "https://www.alpokotha.in/php-unserialize-online.php",
  "breadcrumb": {
    "@type": "BreadcrumbList",
    "itemListElement": [
      {
        "@type": "ListItem",
        "position": 1,
        "name": "Home",
        "item": "https://www.alpokotha.in"
      },
      {
        "@type": "ListItem",
        "position": 2,
        "name": "Unserialize Online",
        "item": "https://www.alpokotha.in/php-unserialize-online.php"
      }
    ]
  }
}
</script>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3093970335821256"crossorigin="anonymous"></script>


    <link rel="stylesheet" href="style.css">
    <?php include 'cs.php'  ?>

    <style>
          .centered-textarea {
    margin-left: auto;
    margin-right: auto;
    display: block;
  }

  .centered-container {
    text-align: center;
  }

  .centered-container .form-floating {
    /* display: inline-block; */
    text-align: left;
  }

  .centered-container .form-floating textarea {
    margin-left: auto;
    margin-right: auto;
    display: block;
  }

  .centered-container .centered-buttons {
    margin-top: 10px;
    text-align: center;
  }

  .centered-container .centered-buttons button {
    margin: 5px;
  }
  .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6{
    margin-top: 1.5rem;
    margin-bottom: 1rem;
  }
  .btn-danger{
    margin-left: 20px;
  }
  .btn{
    margin-top: 15px;
  }
    </style>
</head>
<body>
    <div class="container">
    <?php include 'navbar.php' ?> 
    <h1>php unserialize online</h1>  
<div class="centered-container">
  <div class="form-floating">
    <textarea class="form-control mb-2 centered-textarea col-md-8 col-sm-12" placeholder="Your Text Is Here" style="height: 200px; font-size: 20px;" name="serialize" id="serialize" required>a:2:{i:1;a:3:{i:0;s:2:"#1";i:1;s:11:"Tim Verdouw";i:2;s:9:"$1500.00
";}i:2;a:3:{i:0;s:2:"#2";i:1;s:10:"Ben Murray";i:2;s:7:"$500.00";}}</textarea>
    
  </div>
  <div class="centered-buttons">
    <!-- <button id="startButton" class="btn btn-primary">Start</button>
    <button id="stopButton" class="btn btn-danger">Stop</button> -->
    <div class="form-check form-check-inline">
  <input class="form-check-input inlineRadioOptions" checked  selected type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">
  <label class="form-check-label" for="inlineRadio1">Print_r()</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input inlineRadioOptions" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
  <label class="form-check-label" for="inlineRadio2">Var_dump()</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input inlineRadioOptions" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3">
  <label class="form-check-label" for="inlineRadio3">var_export</label>
</div>

  </div>
  <button id="unserializebtn" class="btn btn-primary mr-3">unserialize</button>
    <button id="stopButton" class="btn btn-danger ml-3">Clear</button>
</div>
<div class="displaydata"></div>
<?php include 'footer.php' ?>
</div>
<?php include 'js.php'; ?>

<script>
$(document).ready(function() {
    $('#unserializebtn').click(function() {
        var type = $("input[name='inlineRadioOptions']:checked").val();
        var data = $('#serialize').val();
        $.ajax({
            type: "POST",
            url: "serolize.php",
            data: { type1: type, data: data },
            dataType: "html",
            success: function(response) {
                $('.displaydata').html('<pre>' + response + '</pre>'); // Display response within the element with <pre> tags
       
            }
        });
    });
});

</script>


</body>
</html>
