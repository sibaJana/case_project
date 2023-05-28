<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $useremail = $_POST['useremail'];
    $mailsubject = $_POST['mailsubject'];
    $textInput = $_POST['textInput'];

    // TODO: Implement your email sending logic here

    // Example using PHP's mail() function
    $to = 'sibajana18@gmail.com';
    $subject = $mailsubject;
    $message = $textInput;
    $headers = "From: $useremail" . "\r\n" .
               "Reply-To: $useremail" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    if (mail($to, $subject, $message, $headers)) {
        $response = ['success' => true, 'message' => 'Email sent successfully'];
    } else {
        $response = ['success' => false, 'message' => 'Failed to send email'];
    }

    echo json_encode($response);
}
?>
