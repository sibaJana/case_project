<!DOCTYPE html>
<html>
<head>
  <title>telugu voice to text | Codingbox</title>
  <link rel="icon" href="./img/coding.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Revolutionize Communication with Voice-to-Text: Easily Convert Telugu, Malayalam, and Bangla Speech into Text! Say it, We Type it! Try Now!">
  <meta name="keywords" content="voice to text telugu,telugu voice to text,voice to text malayalam,tamil voice to text,voice to text bangla">
  <meta name="robots" content="index,follow">
  <link rel="canonical" href="https://www.alpokotha.in/telugu-voice-to-text.php">
  <meta property="og:title" content="telugu voice to text: Convert Audio Recordings to Written Text">
  <meta property="og:description" content="Revolutionize Communication with Voice-to-Text: Easily Convert Telugu, Malayalam, and Bangla Speech into Text! Say it, We Type it! Try Now!">
    <!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3093970335821256" crossorigin="anonymous"></script> -->
  
  <link rel="stylesheet" href="style.css">
  <?php include 'cs.php'; ?>
  <style>
        body {
      font-family: Arial, sans-serif;
      line-height: 1.6;
      margin: 0;
      padding: 20px;
    }
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

  .h1,
  .h2,
  .h3,
  .h4,
  .h5,
  .h6,
  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    margin-top: 1.5rem;
    margin-bottom: 1rem;
  }
  .pulsating-animation {
    animation: pulsate 1.2s ease-in-out infinite;
  }

  @keyframes pulsate {
    0% {
      transform: scale(1);
    }
    50% {
      transform: scale(1.1);
    }
    100% {
      transform: scale(1);
    }
  }
  
  h1 {
      color: #333;
      font-size: 24px;
      margin-bottom: 20px;
    }

    h2 {
      color: #333;
      font-size: 30px;
      margin-top: 30px;
      margin-bottom: 10px;
    }

    ol, ul {
      margin-top: 0;
      /* padding-left: 20px; */
    }

    li {
      margin-bottom: 10px;
      font-size: 20px;
    }


    a {
      color: #007bff;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <?php include 'navbar.php'; ?>
    <h1>Telugu voice to text</h1>

    <select id="leng" class="form-select form-select-sm col-md-3" aria-label=".form-select-sm example">
      <option>Open this select menu</option>
      <option value="bn-IN">Bengali</option>
      <option value="te-IN">Telugu</option>
      <option value="en-IN">English</option>
      <option value="hi-IN">Hindi</option>
      <option value="ml-IN">Malayalam </option>
      <option value="ta-IN">Tamil </option>
    </select>

    <div class="centered-container mt-3">
      <div class="form-floating">
        <textarea class="form-control mb-2 centered-textarea col-md-8 col-sm-12" placeholder="Your Text Is Here" style="height: 400px; font-size: 20px;" name="txtRawtb" id="txtRawtb" required=""></textarea>
      </div>
      <div class="centered-buttons">
        <button id="startButton" class="btn btn-primary">Start</button>
        <button id="stopButton" class="btn btn-danger">Stop</button>
      </div>
      <h2>user Guidelines</h2>
  <ol class="user">
    <li>Open the Telugu Voice to Text page on the Codingbox website: <a href="https://www.alpokotha.in/telugu-voice-to-text.php">https://www.alpokotha.in/telugu-voice-to-text.php</a>.</li>
    <li>On the page, you will see a dropdown menu labeled "Select Language." Click on the dropdown and choose "Telugu" from the available options.</li>
    <li>In the main area of the page, you will find a textarea labeled "Your Text Is Here." This is where the transcribed text will be displayed.</li>
    <li>To start the voice recognition, click on the "Start" button. The button will begin pulsating to indicate that it's active.</li>
    <li>Start speaking in Telugu. As you speak, the tool will convert your speech into text and display it in the textarea in real-time.</li>
    <li>When you have finished speaking, click on the "Stop" button to end the voice recognition. The pulsating animation on the "Start" button will stop.</li>
    <li>The transcribed text will remain in the textarea until you refresh the page or close the browser. You can copy the text or use it as needed.</li>
    <li>You can repeat the process as many times as needed to transcribe additional Telugu speech.</li>
  </ol>

  <h2>Tips for Better Transcriptions</h2>
  <ul>
    <li>Speak clearly and enunciate your words to improve the accuracy of the transcriptions.</li>
    <li>Ensure that your microphone is working properly and there is minimal background noise.</li>
    <li>If you encounter any issues or have feedback regarding the Telugu Voice to Text feature, please feel free to contact our support team at <a href="mailto:support@codingbox.com">support@codingbox.com</a>.</li>
  </ul>
    </div>

    <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "WebApplication",
    "name": "voice into Text Converter",
    "description": "Revolutionize Communication with Voice-to-Text: Easily Convert Telugu, Malayalam, and Bangla Speech into Text! Say it, We Type it! Try Now!",
    "url": "https://www.alpokotha.in/telugu-voice-to-text.php",
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

<script>
  $(document).ready(function() {
    // Check if browser supports the Web Speech API
    if ('webkitSpeechRecognition' in window) {
      var recognition = new webkitSpeechRecognition();
      var isListening = false; // Flag to track if recognition is in progress

      $('#leng').change(function() {
        recognition.lang = $(this).val();
      });

      // Set continuous to true for continuous speech recognition
      recognition.continuous = true;

      // Set interimResults to true to get partial recognition results
      recognition.interimResults = true;

      // Get the previously recognized sentence from localStorage
      var recognizedSentence = localStorage.getItem('speechText');
      $('#txtRawtb').val(recognizedSentence);

      // Handle the recognition result
      recognition.onresult = function(event) {
        var lastResult = event.results[event.results.length - 1];
        var text = lastResult[0].transcript;

        // If recognition is in progress and the text is not empty
        if (isListening && text.trim() !== '') {
          recognizedSentence = text.trim(); // Update recognized sentence with the last result

          // Update the textarea with the recognized text
          $('#txtRawtb').val(recognizedSentence);

          // Save the updated text in localStorage
          localStorage.setItem('speechText', recognizedSentence);
        }
      };

      // Start recording when the 'Start Recording' button is clicked
      $('#startButton').on('click', function() {
        isListening = true;
        recognition.start();
        $(this).addClass('pulsating-animation');
      });

      // Stop recording when the 'Stop Recording' button is clicked
      $('#stopButton').on('click', function() {
        isListening = false;
        recognition.stop();
        $('#startButton').removeClass('pulsating-animation');
      });
    } else {
      $('#txtRawtb').val('Speech recognition is not supported in this browser.');
      $('#startButton').prop('disabled', true);
      $('#stopButton').prop('disabled', true);
    }
  });
</script>



    <?php include 'footer.php'; ?>
    <?php include 'js.php'; ?>
  </div>
</body>
</html>
