<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Text Case Converter - Change the case of your text with our free text case converter. Simply enter your text and click the convert button.">
    <meta name="keywords" content="text case converter, free text case converter, change case of text, convert text to uppercase, convert text to lowercase, convert text to title case, convert text to sentence case, convert text to proper case,text case converter,text case changer,text case tool,online text case converter,free text case converter,text case switcher,case converter,case changer,case tool,online case converter,free case converter">
    <title>Text Case Converter</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
</head>

<body>
 <div class="container">
 <?php require 'navbar.php';  ?>
 <div class="row align-items-center">
    <div class="col">
      <h1 class="text-success mb-0 mt-1">Small Text Generator</h1>
    </div>
    <div class="col-auto">

    </div>
  </div>
  <form>
  <div class="mb-3 textarea-container">
    <label for="textInput">Text:</label>
    <textarea class="form-control" id="textInput" name="textInput" rows="5" placeholder="Enter your text"></textarea>
   </div>
  <p id="countall"></p>
  <button type="button" id="convert_case" class="btn btn-primary mt-1">Sentence case</button>
</form>
<?php include 'footer.php'; ?>
  </div> 
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
   $(document).ready(function(){

        $('#countall').html('Character Count: ' + 0 + ' | Word Count: ' + 0 + ' | Line Count: ' + 0);
        $('#textInput').on('keyup', totalcwc);

        /* downloadTextFile  */
        $('#downloadTextFile').click(function(){
        var textInput = $('#textInput').val();
        if (textInput.trim() === '') {
          alert('Please enter some text.');
          return false;
        }
        var fileName = "text converter case.txt";
        downloadTextFile(textInput,fileName);
        
      });
                  /* copyToClipboard  */
        $('#copyToClipboard').click(function(){
        var textInput = $('#textInput').val();
        if (textInput.trim() === '') {
          alert('Please enter some text.');
          return false;
        }
        copyToClipboard(textInput);
        
      });

      $('#clear').click(function(){
        var textInput = $('#textInput').val();
        if (textInput.trim() === '') {
          alert('Please enter some text.');
          return false;
        }
        $('#textInput').val('');
        totalcwc();
        
      });


      function totalcwc(){
        var textInput = $('#textInput').val();
        $.ajax({
            type: "POST",
            url: "totalcwc.php",
            data: {textInput:textInput},
            dataType: "json",
            success: function (response) {
                // console.log(response)
                $('#countall').html('Character Count: ' + response.totalCharacters + ' | Word Count: ' + response.totalWords + ' | Line Count: ' + response.totalLines);
            
            }
        });
    }
     

    function downloadTextFile(text, fileName) {
    var blob = new Blob([text], { type: "text/plain" });
    var url = URL.createObjectURL(blob);
  
    var a = document.createElement("a");
    a.href = url;
    a.download = fileName;
    a.style.display = "none";
  
    document.body.appendChild(a);
    a.click();
  
    document.body.removeChild(a);
    URL.revokeObjectURL(url);
    }

    function copyToClipboard(text) {
    navigator.clipboard.writeText(text)
    .then(() => {
      console.log("Text copied to clipboard.");
    })
    .catch((error) => {
      console.error("Error copying text to clipboard:", error);
    });
    }

});



</script>
</body>
</html>
