<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hash Generator</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
    
  <style>
    /* Custom styles */
    body {
      background-color: #f8f9fa;
    }

    .card-group {
      margin-top: 50px;
    }

    .form-floating {
      margin-bottom: 20px;
    }

    #txtRaw, #txtConverted {
      font-size: 14px;
    }

    .badge {
      font-size: 14px;
    }

    .btn {
      font-size: 14px;
    }

    #loaderDiv {
      margin-top: 10px;
    }

    .btn-hash {
      background-color: rgba(128, 0, 128, 0.1);
      color: purple;
    }
    .btn-hash:hover {
      background-color: rgba(128, 0, 128, 0.5);
    }
    .btn-hash i {
      color: white;
    }
    .btn-download {
      background-color: rgba(0, 0, 0, 0.1);
      color: black;
    }
    .btn-download:hover {
      background-color: rgba(0, 0, 0, 0.5);
    }
    .btn-download i {
      color: white;
    }
    .btn-reset {
      background-color: rgba(255, 0, 0, 0.1);
      color: red;
    }
    .btn-reset:hover {
      background-color: rgba(255, 0, 0, 0.5);
    }
    .btn-reset i {
      color: white;
    }
    .btn-copy {
      background-color: rgba(0, 0, 255, 0.1);
      color: blue;
    }
    .btn-copy:hover {
      background-color: rgba(0, 0, 255, 0.5);
    }
    .btn-copy i {
      color: white;
    }
    

  </style>
</head>
<body>
  <div class="container">
    <?php include 'navbar.php' ?>
    <form id="frmTools" method="post">
    <div class="card-group">
        <div class="card">
          <div class="card-body">
            <div class="form-floating">
              <textarea class="form-control mb-2" placeholder="Enter or upload your text" style="height: 200px;" name="txtRaw" id="txtRaw" required=""></textarea>
              <label for="txtRaw">Enter plain text</label>
            </div>
            <div class="row">
              <div class="col-7">
              </div>
              <!-- <div class="col-5 text-end">
                <span class="badge bg-success rounded-pill my-1 me-1"><strong id="charNum"></strong> Characters</span>
                <span class="badge bg-success rounded-pill "><strong id="wordNum"></strong> Words</span>
              </div> -->
              <p id="countall"></p>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="form-floating">
              <textarea class="form-control mb-3 col-12" name="txtConverted" readonly="" id="txtConverted" placeholder="HASH Data" style="height: 200px;"></textarea>
              <label for="txtConverted">HASH Data</label>
            </div>
            <div class="row">
              <div class="col-7">
                <div class="d-flex align-items-center">
                  <div>
                  <!-- <a href="#" id="bPaste" class="btn btn-hash lh-1 rounded-pill my-1 me-2 p-2" data-bs-popup="tooltip" data-bs-original-title="Copy HASH text as an input"><i class="fas fa-files"></i></a> -->
                    <a  id="bDownload" class="btn btn-download lh-1 rounded-pill my-1 me-2 p-2" data-bs-popup="tooltip" data-bs-original-title="Download"><i class="fas fa-download"></i></a>
                    <a  id="bReset" class="btn btn-reset lh-1 rounded-pill my-1 me-2 p-2" data-bs-popup="tooltip" data-bs-original-title="Clear All"><i class="fas fa-broom"></i></a>
                    <a  id="bCopy" class="btn btn-copy lh-1 rounded-pill my-1 me-2 p-2" data-bs-popup="tooltip" data-bs-original-title="Copy HASH text as an input"><i class="fas fa-copy"></i></a>
                </div>
                </div>
              </div>
              <div class="col-5 text-end">
                <div id="loaderDiv" style="display: none;" class="text-blue">
                  <img src="https://www.onlinewebtoolkit.com/images/l3.gif" width="50">Please Wait ...
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> 

      <div class="col-12">
        <div class="card card-body">
          <div>
    <button type="button" id="convert_md5" class="btn btn-primary mt-1">MD5</button>
  <button type="button" id="convert_sha1" class="btn btn-primary mt-1">SHA-1</button>
  <button type="button" id="convert_sha256" class="btn btn-primary mt-1">SHA-256</button>
  <button type="button" id="convert_sha3" class="btn btn-primary mt-1">SHA-3</button>
  <button type="button" id="convert_crc32" class="btn btn-primary mt-1">CRC32</button>
  <button type="button" id="convert_whirlpool" class="btn btn-primary mt-1">Whirlpool</button>
  <button type="button" id="convert_bcrypt" class="btn btn-primary mt-1">bcrypt</button>
  <button type="button" id="convert_scrypt" class="btn btn-primary mt-1">scrypt</button>
  <button type="button" id="convert_argon2" class="btn btn-primary mt-1">Argon2</button>          </div>
        </div>
      </div>
    </form>
    <?php include 'footer.php'; ?>
  </div>
  
  <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  

  <script>
    $(document).ready(function(){

        $('#bReset').click(function(){
            $('#txtRaw').val('');
            $('#txtConverted').val('');
        });


    $('#convert_md5').click(function(){
        var txtRaw=$('#txtRaw').val();
       if(txtRaw ==''){
        alert('text fild shoud not be empty');
        return false;
       }
       $.ajax({
        type: "post",
        url: "hash.php",
        data:{txtRaw:txtRaw,functionName: 'convert_md5'} ,
        dataType: "json",
        success: function (response) {
           $('#txtConverted').html(response.hashcode);
        }
       });
    });

    $('#convert_sha1').click(function(){
        var txtRaw=$('#txtRaw').val();
       if(txtRaw ==''){
        alert('text fild shoud not be empty');
        return false;
       }
       $.ajax({
        type: "post",
        url: "hash.php",
        data:{txtRaw:txtRaw,functionName: 'convert_sha1'} ,
        dataType: "json",
        success: function (response) {
           $('#txtConverted').html(response.hashcode);
        }
       });
    });
    $('#convert_sha256').click(function(){
        var txtRaw=$('#txtRaw').val();
       if(txtRaw ==''){
        alert('text fild shoud not be empty');
        return false;
       }
       $.ajax({
        type: "post",
        url: "hash.php",
        data:{txtRaw:txtRaw,functionName: 'convert_sha256'} ,
        dataType: "json",
        success: function (response) {
           $('#txtConverted').html(response.hashcode);
        }
       });
    });

    $('#convert_sha3').click(function(){
        var txtRaw=$('#txtRaw').val();
       if(txtRaw ==''){
        alert('text fild shoud not be empty');
        return false;
       }
       $.ajax({
        type: "post",
        url: "hash.php",
        data:{txtRaw:txtRaw,functionName: 'convert_sha3'} ,
        dataType: "json",
        success: function (response) {
           $('#txtConverted').html(response.hashcode);
        }
       });
    });
    $('#convert_crc32').click(function(){
        var txtRaw=$('#txtRaw').val();
       if(txtRaw ==''){
        alert('text fild shoud not be empty');
        return false;
       }
       $.ajax({
        type: "post",
        url: "hash.php",
        data:{txtRaw:txtRaw,functionName: 'convert_crc32'} ,
        dataType: "json",
        success: function (response) {
           $('#txtConverted').html(response.hashcode);
        }
       });
    });
    $('#convert_whirlpool').click(function(){
        var txtRaw=$('#txtRaw').val();
       if(txtRaw ==''){
        alert('text fild shoud not be empty');
        return false;
       }
       $.ajax({
        type: "post",
        url: "hash.php",
        data:{txtRaw:txtRaw,functionName: 'convert_whirlpool'} ,
        dataType: "json",
        success: function (response) {
           $('#txtConverted').html(response.hashcode);
        }
       });
    });
    $('#convert_bcrypt').click(function(){
        var txtRaw=$('#txtRaw').val();
       if(txtRaw ==''){
        alert('text fild shoud not be empty');
        return false;
       }
       $.ajax({
        type: "post",
        url: "hash.php",
        data:{txtRaw:txtRaw,functionName: 'convert_bcrypt'} ,
        dataType: "json",
        success: function (response) {
           $('#txtConverted').html(response.hashcode);
        }
       });
    });
    $('#convert_scrypt').click(function(){
        var txtRaw=$('#txtRaw').val();
       if(txtRaw ==''){
        alert('text fild shoud not be empty');
        return false;
       }
       $.ajax({
        type: "post",
        url: "hash.php",
        data:{txtRaw:txtRaw,functionName: 'convert_scrypt'} ,
        dataType: "json",
        success: function (response) {
           $('#txtConverted').html(response.hashcode);
        }
       });
    });
    $('#convert_argon2').click(function(){
        var txtRaw=$('#txtRaw').val();
       if(txtRaw ==''){
        alert('text fild shoud not be empty');
        return false;
       }
       $.ajax({
        type: "post",
        url: "hash.php",
        data:{txtRaw:txtRaw,functionName: 'convert_argon2'} ,
        dataType: "json",
        success: function (response) {
           $('#txtConverted').html(response.hashcode);
        }
       });
    });
    $('#bDownload').click(function(){
        var textInput = $('#txtConverted').val();
        if (textInput.trim() === '') {
          alert('Please enter some text.');
          return false;
        }
        var fileName = "HashPassword.txt";
        downloadTextFile(textInput,fileName);
        
      });

function downloadTextFile(text, fileName) {
  var blob = new Blob([text], { type: "text/plain" });
  var url = URL.createObjectURL(blob);
  
  var a = document.createElement("a");
  a.href = url;
  a.download = fileName;
  a.style.display = "none";
  
  document.body.appendChild(a);
  a.click();
  
  document.body.removeChild(a);
  URL.revokeObjectURL(url);
}
                  /* copyToClipboard  */
        $('#bCopy').click(function(){
        var textInput = $('#txtConverted').val();
        if (textInput.trim() === '') {
          alert('Please enter some text.');
          return false;
        }
        copyToClipboard(textInput);
        
      });

      function copyToClipboard(text) {
  navigator.clipboard.writeText(text)
    .then(() => {
      console.log("Text copied to clipboard.");
    })
    .catch((error) => {
      console.error("Error copying text to clipboard:", error);
    });
}
        





    $('#countall').html('Character Count: ' + 0 + ' | Word Count: ' + 0);
    $('#txtRaw').on('keyup', totalcwc);
        function totalcwc(){
        var txtRaw = $('#txtRaw').val();
        $.ajax({
            type: "POST",
            url: "totalcwc.php",
            data: {txtRaw:txtRaw},
            dataType: "json",
            success: function (response) {
                $('#countall').html('Character Count: ' + response.totalCharacters + ' | Word Count: ' + response.totalWords);
      
       }
    });
    }
    });
  </script>

</body>
</html>
