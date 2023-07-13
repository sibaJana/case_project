<?php
// Define grammar rules
$grammarRules = array(
    '/\b(he|she|it) (has)\b/i' => '$1 $2',
    '/\b(he|she|it) (have)\b/i' => '$1 $2',
    '/\b(i|you|we|they) (has)\b/i' => '$1 $2',
    '/\b(i|you|we|they) (have)\b/i' => '$1 $2',
    // Add more grammar rules as needed
);

// Function to check grammar and spelling
function checkGrammar($text) {
    global $grammarRules;
    $errors = array();

    // Tokenize the text
    $tokens = preg_split('/\b/', $text, -1, PREG_SPLIT_NO_EMPTY);

    // Check grammar rules
    foreach ($grammarRules as $rule => $replacement) {
        foreach ($tokens as $i => $token) {
            if (preg_match($rule, $token)) {
                $tokens[$i] = preg_replace($rule, $replacement, $token);
                $errors[] = array(
                    'position' => $i,
                    'message' => 'Possible grammar error: ' . $token,
                );
            }
        }
    }

    // Check spelling using API
    foreach ($tokens as $i => $token) {
        $response = file_get_contents("https://api.dictionaryapi.dev/api/v2/entries/en/" . urlencode($token));
        echo "<pre>";
        print_r($response);exit;
        $result = json_decode($response, true);
        if (is_array($result) && empty($result)) {
            $errors[] = array(
                'position' => $i,
                'message' => 'Possible misspelled word: ' . $token,
            );
        }
    }

    return $errors;
}

// Example usage
$text = "He have xx3ersdfs  apple.";
$errors = checkGrammar($text);

// Output errors
if (!empty($errors)) {
    echo "Grammar and spelling errors found:\n";
    foreach ($errors as $error) {
        echo "Position " . $error['position'] . ": " . $error['message'] . "\n";
    }
} else {
    echo "No grammar or spelling errors found.\n";
}
?>
