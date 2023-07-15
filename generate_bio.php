<?php

function randomnumber(){

  $con = mysqli_connect('localhost', 'cviffbma_username', 'sibajana7211', 'cviffbma_userdata');
  $type=$_POST['type_data'];

      if($type==1){
    $randNumber = rand(153,14062);
    $q1 = mysqli_query($con, "SELECT * FROM fb_bio WHERE id = $randNumber");
    if ($row = mysqli_fetch_array($q1)) {
      $text = $row['text'];
      mysqli_close($con);
      echo $text;
    }
      }

    if($type==2){
    $randNumber = rand(1,50);
    $q1 = mysqli_query($con, "SELECT * FROM fb_bio1 WHERE id = $randNumber");
    if ($row = mysqli_fetch_array($q1)) {
      $text = $row['text'];
      mysqli_close($con);
      echo $text;
    }
    }
  

}

randomnumber();

?>
