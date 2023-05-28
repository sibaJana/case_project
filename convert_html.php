<?php
// Check if the CSV file was uploaded
if (isset($_FILES['csv_file']) && $_FILES['csv_file']['error'] === UPLOAD_ERR_OK) {
    // Get the uploaded CSV file
    $csvFile = $_FILES['csv_file']['tmp_name'];
    
    // Read the CSV data
    $csvData = file_get_contents($csvFile);
    
    // Convert the CSV data to an HTML table
    $html = '<table>';
    $rows = str_getcsv($csvData, "\n");
    foreach ($rows as $row) {
        $html .= '<tr>';
        $cells = str_getcsv($row, ",");
        foreach ($cells as $cell) {
            $html .= '<td>' . $cell . '</td>';
        }
        $html .= '</tr>';
    }
    $html .= '</table>';
    
    // Return the HTML table as the response
    echo json_encode(['success' => true, 'html' => $html]);
} else {
    // Error handling for file upload failure
    echo json_encode(['success' => false, 'error' => 'File upload failed.']);
}
?>
