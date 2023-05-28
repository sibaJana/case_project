<?php
// Check if the CSV file is uploaded
if (isset($_FILES['csv_file']) && $_FILES['csv_file']['error'] === UPLOAD_ERR_OK) {
    $csvFilePath = $_FILES['csv_file']['tmp_name'];

    // Read the CSV file and convert it to JSON
    if (($handle = fopen($csvFilePath, 'r')) !== false) {
        $data = [];
        $header = [];

        while (($row = fgetcsv($handle)) !== false) {
            if (empty($header)) {
                // Store the header row
                $header = $row;
            } else {
                // Store each data row
                $data[] = array_combine($header, $row);
            }
        }

        fclose($handle);

        // Convert data array to JSON
        $json = json_encode($data);

        // Return the JSON response
        $response = [
            'success' => true,
            'json' => $json
        ];
        echo json_encode($response);
    } else {
        // Error reading the CSV file
        $response = [
            'success' => false,
            'error' => 'Error reading the CSV file.'
        ];
        echo json_encode($response);
    }
} else {
    // No CSV file uploaded or error occurred
    $response = [
        'success' => false,
        'error' => 'No CSV file uploaded or an error occurred during file upload.'
    ];
    echo json_encode($response);
}
?>
