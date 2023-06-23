<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Text Converter - Change the case of your text with our free text case converter. Simply enter your text and click the convert button.">
    <meta name="keywords" content="text changer
text converter,
online font changer,
caps converter,
case changer,
text case converter,
text case,
text case changer,
lower case to upper case,font changer
text convert case">
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3093970335821256"crossorigin="anonymous"></script>
    <title>Text Converter</title>
    <link rel="stylesheet" href="style.css">
   <?php echo include 'cs.php'; ?>
  </head>
<body>
<div class="container">
  <?php require 'navbar.php'; ?>

  <div class="row align-items-center">
    <div class="col">
      <h1 class="text-success mb-0 mt-1">Text Converter</h1>
    </div>
    <div class="col-auto"></div>
  </div>

  <form>
    <div class="mb-3">
      <label for="textInput">Text:</label>
      <textarea class="form-control custom-textarea" id="textInput" name="textInput" rows="5" placeholder="Enter your text"></textarea>
    </div>
    <p id="countall"></p>
    <!-- Buttons for text case conversion -->
    <button type="button" id="convert_case" class="btn btn-primary mt-1">Sentence case</button>
    <button type="button" id="lower_case" class="btn btn-primary mt-1">Lower case</button>
    <button type="button" id="upper_case" class="btn btn-primary mt-1">Upper case</button>
    <button type="button" id="capitalized" class="btn btn-primary mt-1">Capitalized Case</button>
    <button type="button" id="alternatingCase" class="btn btn-primary mt-1">aLtErNaTiNg cAsE</button>
    <button type="button" id="title_case" class="btn btn-primary mt-1">Title Case</button>
    <button type="button" id="inverseCase" class="btn btn-primary mt-1">Inverse Case</button>

    <!-- Buttons for additional actions -->
    <button type="button" id="downloadTextFile" class="btn btn-primary mt-1">Download Text</button>
    <button type="button" id="copyToClipboard" class="btn btn-primary mt-1">Copy to Clipboard</button>
    <button type="button" id="clear" class="btn btn-primary mt-1">Clear</button>
  </form>

  <?php include 'footer.php'; ?>
</div>
<?php include 'js.php'; ?>
<script>
   $(document).ready(function(){
    $('#countall').html('Character Count: ' + 0 + ' | Word Count: ' + 0 + ' | Line Count: ' + 0);
    $('#textInput').on('keyup', totalcwc);
      $('#convert_case').click(function(){
        $('#convert_case').val('Converting');
        var textInput = $('#textInput').val();
        if (textInput.trim() === '') {
          alert('Please enter some text.');
          return false;
        }
        $.ajax({
            type: "POST",
            url: "index_action.php",
            data: {textInput:textInput},
            dataType: "json",
            success: function (response) {
                // totalcwc();
                $('#convert_case').val('Sentence case');
               $('#textInput').val(response.message); 
            }
        });
      });

      /* lower case */
      $('#lower_case').click(function(){
        $('#lower_case').val('Converting');
        var textInput = $('#textInput').val();
        if (textInput.trim() === '') {
          alert('Please enter some text.');
          return false;
        }
        var lowercaseSentence = textInput.toLowerCase();
        $('#textInput').val(lowercaseSentence);
      });

            /* upper case */
        $('#upper_case').click(function(){
        // $('#upper_case').val('Converting');
        var textInput = $('#textInput').val();
        if (textInput.trim() === '') {
          alert('Please enter some text.');
          return false;
        }
        var uppercaseSentence  = textInput.toUpperCase();
        $('#textInput').val(uppercaseSentence );
      });

    /* Capitalized Case */
        $('#capitalized').click(function(){
        // $('#upper_case').val('Converting');
        var textInput = $('#textInput').val();
        if (textInput.trim() === '') {
          alert('Please enter some text.');
          return false;
        }
        var capitalized  = capitalizeSentence(textInput);
        $('#textInput').val(capitalized );
      });
          /* alternating Case */
          $('#alternatingCase').click(function(){
        // $('#upper_case').val('Converting');
        var textInput = $('#textInput').val();
        if (textInput.trim() === '') {
          alert('Please enter some text.');
          return false;
        }
        var alternatingSentence   = alternatingCase(textInput);
        $('#textInput').val(alternatingSentence);
      });

                /* title Case */
        $('#title_case').click(function(){
        var textInput = $('#textInput').val();
        if (textInput.trim() === '') {
          alert('Please enter some text.');
          return false;
        }
        var titleCaseSentence = titleCase(textInput);
        $('#textInput').val(titleCaseSentence);
      });
        /* inverse Case */
        $('#inverseCase').click(function(){
        var textInput = $('#textInput').val();
        if (textInput.trim() === '') {
          alert('Please enter some text.');
          return false;
        }
        var inverseSentence = inverseCase(textInput);
        $('#textInput').val(inverseSentence);
      });

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
            data: {txtRaw:textInput},
            dataType: "json",
            success: function (response) {
                // console.log(response)
                $('#countall').html('Character Count: ' + response.totalCharacters + ' | Word Count: ' + response.totalWords + ' | Line Count: ' + response.totalLines);
       }
        });
     
            }
        function capitalizeSentence(sentence) {
        var words = sentence.split(" ");
        var capitalizedWords = [];

        for (var i = 0; i < words.length; i++) {
            var word = words[i];
            var capitalizedWord = word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
            capitalizedWords.push(capitalizedWord);
        }

        var capitalizedSentence = capitalizedWords.join(" ");
        return capitalizedSentence;
        }

        function alternatingCase(sentence) {
        var alternatingSentence = "";

        for (var i = 0; i < sentence.length; i++) {
        if (i % 2 === 0) {
        alternatingSentence += sentence[i].toUpperCase();
        } else {
        alternatingSentence += sentence[i].toLowerCase();
        }
        }

     return alternatingSentence;
    }
    function titleCase(sentence) {
  var words = sentence.toLowerCase().split(" ");
  var titleCaseWords = [];

  for (var i = 0; i < words.length; i++) {
    var word = words[i];
    var titleCaseWord = word.charAt(0).toUpperCase() + word.slice(1);
    titleCaseWords.push(titleCaseWord);
  }

  var titleCaseSentence = titleCaseWords.join(" ");
  return titleCaseSentence;
}

function inverseCase(sentence) {
  var inverseSentence = "";

  for (var i = 0; i < sentence.length; i++) {
    var char = sentence[i];

    if (char === char.toUpperCase()) {
      inverseSentence += char.toLowerCase();
    } else {
      inverseSentence += char.toUpperCase();
    }
  }

  return inverseSentence;
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
