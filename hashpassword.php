<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Text Case Converter - Change the case of your text with our free text case converter. Simply enter your text and click the convert button.">
    <meta name="keywords" content="text case converter, free text case converter, change case of text, convert text to uppercase, convert text to lowercase, convert text to title case, convert text to sentence case, convert text to proper case,text case converter,text case changer,text case tool,online text case converter,free text case converter,text case switcher,case converter,case changer,case tool,online case converter,free case converter">
    <title>Text Case Converter</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
</head>

<body>
 <div class="container">
 <?php require 'navbar.php';  ?>
 <div class="row align-items-center">
    <div class="col">
      <h1 class="text-success mb-0 mt-1">Small Text Generator</h1>
    </div>
    <div class="col-auto">

    </div>
  </div>
  <form>
  <div class="mb-3 textarea-container">
    <label for="textInput">Text:</label>
    <textarea class="form-control" id="textInput" name="textInput" rows="5" placeholder="Enter your text"></textarea>
   </div>
  <p id="countall"></p>
  <button type="button" id="convert_md5" class="btn btn-primary mt-1">MD5</button>
  <button type="button" id="convert_sha1" class="btn btn-primary mt-1">SHA-1</button>
  <button type="button" id="convert_sha256" class="btn btn-primary mt-1">SHA-256</button>
  <button type="button" id="convert_sha3" class="btn btn-primary mt-1">SHA-3</button>
  <button type="button" id="convert_crc32" class="btn btn-primary mt-1">CRC32</button>
  <button type="button" id="convert_whirlpool" class="btn btn-primary mt-1">Whirlpool</button>
  <button type="button" id="convert_bcrypt" class="btn btn-primary mt-1">bcrypt</button>
  <button type="button" id="convert_scrypt" class="btn btn-primary mt-1">scrypt</button>
  <button type="button" id="convert_argon2" class="btn btn-primary mt-1">Argon2</button>
</form>

  </div> 
  <div class="social-icons text-center">
    <a href="https://www.instagram.com/siba.jana/" target="_blank" class="social-icon btn btn-outline-primary"><i class="fab fa-instagram"></i></a>
    <a href="https://www.facebook.com/siba.jana.16/" target="_blank" class="social-icon btn btn-outline-primary"><i class="fab fa-facebook"></i></a>
    <a href="https://wa.me/7076805561" target="_blank" class="social-icon btn btn-outline-primary"><i class="fab fa-whatsapp"></i></a>
    <a href="https://twitter.com/SibaJana18" target="_blank" class="social-icon btn btn-outline-primary"><i class="fab fa-twitter"></i></a>
  </div>
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-md5/2.18.0/js/md5.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/js-sha1/0.6.0/sha1.min.js" integrity="sha512-q6FuE4ifzTygTD/ug8CFnAFXl+i1zXqBWP6flRAuSWjaXrFu4Cznk8Xr+VrWMyi7fSatbssh7ufobAetvXK8Pg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/js-sha256/0.9.0/sha256.min.js" integrity="sha512-szJ5FSo9hEmXXe7b5AUVtn/WnL8a5VofnFeYC2i2z03uS2LhAch7ewNLbl5flsEmTTimMN0enBZg/3sQ+YOSzQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/js-sha3/0.8.0/sha3.min.js" integrity="sha512-PmGDkK2UHGzTUfkFGcJ8YSrD/swUXekcca+1wWlrwALIZho9JX+3ddaaI9wmmf8PmgDIpMtx6TU8YBJAZS0mPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/crc32-es/dist/crc32.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function(){

        $('#countall').html('Character Count: ' + 0 + ' | Word Count: ' + 0 + ' | Line Count: ' + 0);
        $('#textInput').on('keyup', totalcwc);

        $('#convert_md5').on('click', function(){
            var textInput = $('#textInput').val();
            var hashedText = md5(textInput);
            console.log("MD5: " + hashedText);
        });

        $('#convert_sha1').on('click', function(){
            var textInput = $('#textInput').val();
            var hashedText = sha1(textInput);
            console.log("SHA-1: " + hashedText);
        });

        $('#convert_sha256').on('click', function(){
            var textInput = $('#textInput').val();
            var hashedText = sha256(textInput);
            console.log("SHA-256: " + hashedText);
        });

        $('#convert_sha3').on('click', function(){
            var textInput = $('#textInput').val();
            var hashedText = sha3_256(textInput);
            console.log("SHA-3: " + hashedText);
        });

        $('#convert_crc32').on('click', function() {
  var textInput = $('#textInput').val();
  var hashedText = crc32.str(textInput);
  console.log("CRC32: " + hashedText);
});



        $('#convert_whirlpool').on('click', function(){
            var textInput = $('#textInput').val();
            var hashedText = whirlpool(textInput);
            console.log("Whirlpool: " + hashedText);
        });

        $('#convert_bcrypt').on('click', function(){
            var textInput = $('#textInput').val();
            var salt = bcrypt.genSaltSync(10);
            var hashedText = bcrypt.hashSync(textInput, salt);
            console.log("bcrypt: " + hashedText);
        });

        $('#convert_scrypt').on('click', function(){
            var textInput = $('#textInput').val();
            var hashedText = scrypt(textInput);
            console.log("scrypt: " + hashedText);
        });

        $('#convert_argon2').on('click', function(){
            var textInput = $('#textInput').val();
            var hashedText = argon2.hash(textInput);
            console.log("Argon2: " + hashedText);
        });

        // Implement other hash functions in a similar manner

        function totalcwc(){
            var textInput = $('#textInput').val();
            $.ajax({
                type: "POST",
                url: "totalcwc.php",
                data: {textInput:textInput},
                dataType: "json",
                success: function (response) {
                    $('#countall').html('Character Count: ' + response.totalCharacters + ' | Word Count: ' + response.totalWords + ' | Line Count: ' + response.totalLines);
                }
            });
        }
    });
</script>
</body>
</html> -->
















<!DOCTYPE html>
<html>
<head>
  <title>Replica - Hash Generator</title>
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
              <textarea class="form-control mb-2 col-12" placeholder="Enter or upload your text" style="height: 200px;" name="txtRaw" id="txtRaw" required=""></textarea>
              <label for="txtRaw">Enter plain text</label>
            </div>
            <div class="row">
              <div class="col-7">
                <!-- <input type="file" class="form-control mb-2" accept="text/plain, .htm,.html" value="Accepts only text file" onchange="openFile(event)"> -->
                <!-- <div class="form-text">Accepts HTML, text file</div> -->
                <script>
                  var openFile = function(event) {
                    var input = event.target;
                    var reader = new FileReader();
                    reader.onload = function() {
                      var text = reader.result;
                      var node = document.getElementById('txtRaw');
                      node.value = text;
                      node.focus();
                    };
                    reader.readAsText(input.files[0]);
                  };
                </script>
              </div>
              <div class="col-5 text-end">
                <span class="badge bg-success rounded-pill my-1 me-1"><strong id="charNum"></strong> Characters</span>
                <span class="badge bg-success rounded-pill "><strong id="wordNum"></strong> Words</span>
              </div>
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
                    <a href="#" id="bDownload" class="btn btn-download lh-1 rounded-pill my-1 me-2 p-2" data-bs-popup="tooltip" data-bs-original-title="Download"><i class="fas fa-download"></i></a>
                    <a href="#" id="bReset" class="btn btn-reset lh-1 rounded-pill my-1 me-2 p-2" data-bs-popup="tooltip" data-bs-original-title="Clear All"><i class="fas fa-broom"></i></a>
                    <a href="#" id="bCopy" class="btn btn-copy lh-1 rounded-pill my-1 me-2 p-2" data-bs-popup="tooltip" data-bs-original-title="Copy"><i class="fas fa-copy"></i></a>
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
  </div>
  <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

  <script>
    $(document).ready(function(){
    // $('#countall').html('Character Count: ' + 0 + ' | Word Count: ' + 0 + ' | Line Count: ' + 0);
    $('#txtRaw').on('keyup', totalcwc);
        function totalcwc(){
        var txtRaw = $('#txtRaw').val();
        $.ajax({
            type: "POST",
            url: "totalcwc.php",
            data: {txtRaw:txtRaw},
            dataType: "json",
            success: function (response) {
                // console.log(response)
                $('#charNum').html( response.totalCharacters);
                $('#wordNum').html( response.totalWords);
       }
    });
    }


    });
  </script>

</body>
</html>
