
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Use this online notepad to write, edit, and save your text. It's a simple and easy-to-use tool that's perfect for anyone who needs to create or edit text.">
    <meta name="keywords" content="online notepad,online text editor, free text editor, simple text editor,easy-to-use text editor,web-based text editor,cloud-based text editor">
    <title>Online Notepad: Write, Edit, and Save Your Text Online</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
</head>

<body>
 <div class="container">
 <?php require 'navbar.php';  ?>

 <div class="row align-items-center">
    <div class="col">
      <h1 class="text-success mb-0 mt-1">Contact Us</h1>
    </div>
    <div class="col-auto">

    </div>
  </div>
  <form>
    <div class="mt-5">
    <label for="username">Enter Your Name</label>
    <input type="text" class="form-control" required placeholder="Enter Your Name" id="username" name="username">
    </div>
    <div class="mt-3">
    <label for="useremail">Enter Email</label>
    <input type="email" class="form-control" required placeholder="Enter Your Email" id="useremail" name="useremail"></div>
    <div class="mt-3">
    <label for="useremail">Enter Subject</label>
    <input type="email" class="form-control" required placeholder="Enter Your Email" id="mailsubject" name="mailsubject"></div>
  <div class="mb-3 textarea-container mt-3">
    <label for="textInput">Enter Message</label>
    <textarea class="form-control" id="textInput" required name="textInput" rows="5" placeholder="Enter your text"></textarea>
   </div>
   <input type="button" id="mailsend" name="mailsend" value="Send Mail" class="btn btn-success">
</form>
<?php include 'footer.php'; ?>
  </div> 

<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.tiny.cloud/1/kwklcshmx4pichu7rsvysckgtk6l8m1vkjgmz0pt8dyfroo8/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>


$(document).ready(function(){
    tinymce.init({
      selector: 'textarea',
      browser_spellcheck: false,
  contextmenu: false,
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
});

$(document).ready(function(){
$('mailsend').click(function(){

var username=$('username').val();
var useremail=$('useremail').val();
var mailsubject=$('mailsubject').val();
var textInput=$('textInput').val();

$.ajax({
    type: "post",
    url: "mailsend.php",
    data:{username:username,useremail:useremail,mailsubject:mailsubject,textInput:textInput},
    dataType: "json",
    success: function (response) {
        if(response.success==true){
            alert(response.message)
        }else if(response.success==false){
            alert(response.message) 
        }
    }
});

});
});



</script>
</body>
</html>
