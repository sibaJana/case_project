<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST['type1'];
    $data = $_POST['data'];
    $data = unserialize($data);
    if ($data) {
        if ($type == 1) {
            ob_start(); // Start output buffering
            print_r($data);
            $output = ob_get_clean(); // Get the buffered output
            echo $output; // Send the output to the AJAX response
        } else if ($type == 2) {
            ob_start();
            var_dump($data);
            $output = ob_get_clean();
            echo $output;
        } else if ($type == 3) {
            ob_start();
            var_export($data);
            $output = ob_get_clean();
            echo $output;
        } else {
            // Handle other cases if needed
        }
    } else {
        echo 'Error Found';
    }
}
?>
