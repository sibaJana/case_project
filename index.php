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
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="small_cap.php">Small Text Generator</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown link
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

 <div class="row align-items-center">
    <div class="col">
      <h1 class="text-success mb-0 mt-1">Text Case Converter</h1>
    </div>
    <div class="col-auto">

    </div>
  </div>
    <form>
      <div class="mb-3">
        <label for="textInput">Text:</label>
        <textarea class="form-control" id="textInput" name="textInput" rows="5" placeholder="Enter your text"></textarea>
      </div>
      <p id="countall"></p>
      <button type="button" id="convert_case" class="btn btn-primary mt-1">Sentence case</button>
      <button type="button" id="lower_case" class="btn btn-primary  mt-1">Lower case</button>
      <button type="button" id="upper_case" class="btn btn-primary  mt-1">Upper case</button>
      <button type="button" id="capitalized" class="btn btn-primary mt-1">Capitalized Case</button>
      <button type="button" id="alternatingCase" class="btn btn-primary mt-1"> aLtErNaTiNg cAsE</button>
      <button type="button" id="title_case" class="btn btn-primary mt-1">Title Case</button>
      <button type="button" id="inverseCase" class="btn btn-primary mt-1">Inverse Case</button>
      <button type="button" id="downloadTextFile" class="btn btn-primary mt-1"> Download Text</button>
      <button type="button" id="copyToClipboard" class="btn btn-primary mt-1"> Copy to Clipboard</button>
      <button type="button" id="clear" class="btn btn-primary mt-1"> Clear</button>
    </form>

  </div> 
  <div class="social-icons text-center">
    <a href="https://www.instagram.com/siba.jana/" target="_blank" class="social-icon btn btn-outline-primary"><i class="fab fa-instagram"></i></a>
    <a href="https://www.facebook.com/siba.jana.16/" target="_blank" class="social-icon btn btn-outline-primary"><i class="fab fa-facebook"></i></a>
    <a href="https://wa.me/7076805561" target="_blank" class="social-icon btn btn-outline-primary"><i class="fab fa-whatsapp"></i></a>
    <a href="https://twitter.com/SibaJana18" target="_blank" class="social-icon btn btn-outline-primary"><i class="fab fa-twitter"></i></a>
  </div>
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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
            data: {textInput:textInput},
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
