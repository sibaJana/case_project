<!DOCTYPE html>
<html>
<head>
  <title>Voice to Text Converter</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> 
 
 <link rel="stylesheet" href="style.css">
  <?php  include 'cs.php'; ?>
</head>
<body>
  <h1>Voice to Text Converter</h1>
  <div class="form-floating">
    <textarea class="form-control mb-2" placeholder="Your Text Is Here" style="height: 400px; width: 50%" name="txtRaw" id="txtRaw" required=""></textarea>
    <label for="txtRaw">Your Text Is Here</label>
  </div>
  <button id="startButton">Start Recording</button>
  <button id="stopButton">Stop Recording</button>
  <div id="result"></div>

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
  <?php include 'js.php'; ?>
</body>
</html>
