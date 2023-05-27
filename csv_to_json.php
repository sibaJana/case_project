<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Convert your CSV files to JSON and HTML formats with ease using our CSV Conversion Tool. Effortlessly transform your data into JSON objects or generate HTML tables for easy visualization. Simplify your data processing and presentation tasks with our versatile CSV converter.">
    <meta name="keywords" content="CSV conversion,CSV Conversion Tool,
CSV to JSON,
CSV to HTML,
Convert CSV,
JSON conversion,
HTML conversion,
Data transformation,
Data conversion tool,
CSV file converter,
JSON formatting,
HTML table generation,
CSV parsing,
Data processing,
Data visualization,
Data manipulation,
CSV converter software,
JSON data representation,
HTML data presentation,
CSV data formatting,
Data interchange formats">
    <title>CSV Conversion Tool: JSON and HTML</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
<div class="container">
    <?php require 'navbar.php'; ?>
    <div class="row align-items-center">
        <div class="col">
            <h1 class="text-success mb-0 mt-1">CSV Conversion Tool: JSON and HTML</h1>
        </div>
        <div class="col-auto"></div>
    </div>
    <form id="convertForm">
        <div class="mb-3 textarea-container">
            <label for="csv_file">CSV File:</label>
            <input type="file" class="form-control" name="csv_file" id="csv_file" placeholder="Upload CSV file" accept=".csv">
        </div>
        <button type="submit" class="btn btn-primary mt-1" data-convert="json">Convert to JSON</button>
        <button type="submit" class="btn btn-primary mt-1" data-convert="html">Convert to HTML</button>

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>

    $(document).ready(function(){
    $('#convertForm').submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var formData = new FormData(form[0]);

        var convertType = $(this).find('button[type="submit"]:focus').attr('data-convert');
        
        var url;
        if (convertType === 'json') {
            url = 'convert_json.php';
        } else if (convertType === 'html') {
            url = 'convert_html.php';
        }

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    if (convertType === 'json') {
                        var json = response.json;
                        var fileName = 'converted.json';
                        downloadFile(json, fileName);
                    } else if (convertType === 'html') {
                        var html = response.html;
                        var fileName = 'converted.html';
                        downloadFile(html, fileName);
                    }
                } else {
                    alert('Error: ' + response.error);
                }
            },
            error: function(xhr, status, error) {
                alert('AJAX Error: ' + error);
            }
        });
    });

    function downloadFile(data, fileName) {
        var blob = new Blob([data], { type: "application/octet-stream" });
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
});
</script>
</body>
</html>
