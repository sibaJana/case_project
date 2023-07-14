<?php
function randomnumber(){
  $con = mysqli_connect('localhost', 'cviffbma_username', '@Tx+(mcpz-2t', 'cviffbma_userdata');
  $randNumber = rand(1, 153);
  $q1 = mysqli_query($con, "SELECT * FROM fb_bio WHERE id = $randNumber");
  
  if ($row = mysqli_fetch_array($q1)) {
    $text = $row['text'];
    mysqli_close($con); // Close the database connection
    echo $text;
  }
}

randomnumber();
?>
