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

    #txtRaw,
    #txtConverted {
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

    @media (max-width: 576px) {
      /* Mobile view */
      .card-group {
        display: block;
      }

      .card {
        margin-bottom: 20px;
      }
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
              <textarea class="form-control" id="txtRaw" name="txtRaw" placeholder="Enter the text here" style="height: 150px;"></textarea>
              <label for="txtRaw">Raw Text</label>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="form-floating">
              <textarea class="form-control" id="txtConverted" name="txtConverted" readonly></textarea>
              <label for="txtConverted">Converted Text</label>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center">
        <button class="btn btn-primary btn-hash" type="submit"><i class="fa fa-lock"></i> Generate Hash</button>
        <button class="btn btn-success btn-download" type="button" disabled><i class="fa fa-download"></i> Download Hash</button>
        <button class="btn btn-warning btn-reset" type="reset" onclick="resetForm()"><i class="fa fa-undo"></i> Reset</button>
        <button class="btn btn-info btn-copy" type="button" disabled onclick="copyHash()"><i class="fa fa-copy"></i> Copy Hash</button>
      </div>
    </form>
  </div>

  <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</body>
</html>
