<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the value of textInput from the POST data
    $inputdata = $_POST['textInput'];
    // Function to capitalize the first character of each sentence
    $inputdata = ucfirst(strtolower($inputdata));
    $formattedText = preg_replace_callback(
        '/(?<=\.|\?|\!)\s*\b([a-z])/',
        function($matches) {
            return strtoupper($matches[0]);
        },
        $inputdata
    );

    $responseData = array(
        'message' => $formattedText
    );

    // Send the response as JSON
    header('Content-Type: application/json');
    echo json_encode($responseData);
    exit;
}

?>
