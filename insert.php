<?php
// Database connection
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "test";

// // Create connection
// $conn = mysqli_connect($servername, $username, $password, $dbname);


// // Array of phrases
// $phrases = [

// ];


// for ($i = 0; $i < count($phrases); $i++) {
//     $text = $phrases[$i];
    
//     // Check if the phrase already exists in the database
//     $checkQuery = "SELECT * FROM fb_bio WHERE `text` = '$text'";
//     $checkResult = mysqli_query($conn, $checkQuery);
    
//     if ($checkResult) {
//         if (mysqli_num_rows($checkResult) > 0) {
//             // echo "Phrase '$text' already exists in the database. Skipping insertion.";
//             // continue; // Skip to the next iteration
//         } else {
//             // Insert the phrase into the database
//             $insertQuery = "INSERT INTO fb_bio (`text`) VALUES ('$text')";
//             $insertResult = mysqli_query($conn, $insertQuery);
            
//             if ($insertResult) {
//                 echo "Inserted phrase '$text' successfully.";
//             } else {
//                 echo "Failed to insert phrase '$text'.";
//             }
//         }
//     } else {
//         echo "Error executing check query: " . mysqli_error($conn);
//     }
// }





?>
