<!DOCTYPE html>
<html>
<head>
  <title>sound into text Converter</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Discover how to convert sound into text or spoken language into text with our advanced speech-to-text conversion tool">
    <meta name="keywords" content="sound into text,translate voice to text">
    <meta name="robots" content="index,follow">
    <link rel="canonical" href="https://www.alpokotha.in/sound-into-text">
    <meta property="og:title" content="Sound into Text: Convert Audio Recordings to Written Text">
    <meta property="og:description" content="Discover how to convert sound into text or spoken language into text with our advanced speech-to-text conversion tool">
    <meta property="og:image" content="https://www.alpokotha.in/sound-into-text">
    <meta name="twitter:title" content="Sound into Text: Convert Audio Recordings to Written Text">
    <meta name="twitter:description" content="Discover how to convert sound into text or spoken language into text with our advanced speech-to-text conversion tool">
    <!-- <meta name="twitter:image" content="https://www.example.com/image.jpg"> -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3093970335821256"crossorigin="anonymous"></script>
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Sound into Text Converter",
  "description": "Convert audio recordings into written text using our advanced speech-to-text conversion tool.",
  "url": "https://www.alpokotha.in",
  "image": "https://www.alpokotha.in/sound-into-text",
  "applicationCategory": "Multimedia",
  "operatingSystem": "All",
  "browserRequirements": "Requires JavaScript and a compatible browser with speech recognition support.",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  },
  "creator": {
    "@type": "Person",
    "name": "siba jana",
    "url": "https://www.alpokotha.in"
  }
}
</script>
 <link rel="stylesheet" href="style.css">
  <?php  include 'cs.php'; ?>
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

</style>
</head>
<body>
  <div class="container">
  <?php include 'navbar.php' ?>
  <h1>Sound into Text: Convert Audio Recordings to Written Text</h1>


  <div class="centered-container">
  <div class="form-floating">
    <textarea class="form-control mb-2 centered-textarea col-md-8 col-sm-12" placeholder="Your Text Is Here" style="height: 400px; font-size: 20px;" name="txtRaw" id="txtRaw" required=""></textarea>
    
  </div>
  <div class="centered-buttons">
    <button id="startButton" class="btn btn-primary">Start</button>
    <button id="stopButton" class="btn btn-danger">Stop</button>
  </div>
</div>

  <script>
   $(document).ready(function() {
  // Check if browser supports the Web Speech API
  if ('webkitSpeechRecognition' in window) {
    var recognition = new webkitSpeechRecognition();

    // Set the language for speech recognition (e.g., 'en-US' for English US)
    recognition.lang = 'en-US';

    // Set continuous to true for continuous speech recognition
    recognition.continuous = true;

    // Set interimResults to true to get partial recognition results
    recognition.interimResults = true;

    // Initialize the textarea with previous text (if any)
    $('#txtRaw').val(localStorage.getItem('speechText'));

    // Initialize a variable to store the recognized sentence
    var recognizedSentence = '';

    // Handle the recognition result
    recognition.onresult = function(event) {
      var result = event.results[event.results.length - 1];
      var text = result[0].transcript;

      // Update the recognized sentence with the newly recognized text
      recognizedSentence += text;

      // Split the recognized sentence into individual words
      var words = recognizedSentence.split(' ');

      // Filter out any duplicate words
      var uniqueWords = Array.from(new Set(words));

      // Update the textarea with the recognized text
      $('#txtRaw').val(uniqueWords.join(' '));

      // Save the updated text in localStorage
      localStorage.setItem('speechText', $('#txtRaw').val());
    };

    // Start recording when the 'Start Recording' button is clicked
    $('#startButton').on('click', function() {
      recognition.start();
    });

    // Stop recording when the 'Stop Recording' button is clicked
    $('#stopButton').on('click', function() {
      recognition.stop();
    });
  } else {
    $('#result').text('Speech recognition is not supported in this browser.');
  }
});
  </script>
  </div>
  <?php include 'footer.php' ?>
  <?php include 'js.php'; ?>
</body>
</html>
