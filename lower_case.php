<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $inputdata = $_POST['textInput'];
    $totalCharacters = strlen($inputdata);
    $totalWords = str_word_count($inputdata);
    $totalLines = substr_count($inputdata, PHP_EOL) + 1;
    $responseData = array(
        'totalCharacters' => $totalCharacters,
        'totalWords'=>$totalWords,
        'totalLines'=>$totalLines
    );

    // Send the response as JSON
    header('Content-Type: application/json');
    echo json_encode($responseData);
    exit;
}

?>
