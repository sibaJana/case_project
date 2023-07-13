<!DOCTYPE html>
<html>
<head>
    <title>File Converter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./img/coding.png" type="image/x-icon">
    <style>
        /* Styles for page layout */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        
        /* .content-area {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        } */
        
        .page-title {
            margin-bottom: 30px;
        }
        
        h1 {
            font-size: 32px;
            color: #333;
        }
        
        h2 {
            font-size: 24px;
            color: #777;
        }
        
        .index-counter {
            margin-bottom: 20px;
        }
        
        .counter-box {
            font-size: 18px;
            color: #333;
            padding: 10px 20px;
            background-color: #f9f9f9;
        }
        
        .converter-container {
            margin-bottom: 30px;
        }
        
        .converter-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 200px;
            border: 2px dashed #ccc;
            background-color: #f5f5f5;
        }
        

        
        .file-source-button-wrapper {
            margin-bottom: 20px;
        }
        
        .file-source-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }
        
        .file-source-button:hover {
            background-color: #b20824;
        }
        
        .file-source-caption {
            font-size: 14px;
            color: #777;
        }
        
        .advantages {
            margin-bottom: 30px;
        }
        
        .icon {
            margin-bottom: 20px;
        }
        
        .icon svg {
            width: 40px;
            height: 40px;
            fill: #007bff;
        }
        
        h3 {
            font-size: 20px;
            color: #333;
            margin-bottom: 10px;
        }
        
        p {
            font-size: 16px;
            color: #777;
        }
        
        .api-cta {
            text-align: center;
        }
        
        .api-cta-icon svg {
            width: 42px;
            height: 42px;
            fill: #2fbf5b;
            margin-bottom: 10px;
        }
        
        .api-cta p {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
        }
    </style>
    <?php  include 'cs.php'; ?>
</head>
<body>
    <div class="container">
<?php  include 'navbar.php'; ?>
    <div class="content-area">
        <div class="page-title text-center">
            <h1>File Converter</h1>
            <!-- <h2>Convert your files to any format</h2> -->
        </div>



        <div class="converter-container">
    <div class="converter-wrapper tall">
        <div class="converter">
            <div class="file-source-button-wrapper file-source-button-resizable">
                <div class="file-source-button">
                    <!-- <label for="pc-upload-add" class="action-label"><span>Choose Files</span></label> -->
                    <input type="file" id="pc-upload-add" multiple>
                </div>
                <div class="file-source-caption d-none d-md-block">
                    <span class="security-icon" data-placement="left" title="" data-original-title="All your data is always protected and under your control. Learn more about technical and organizational security measures we take on the Security page."></span>
                    <!-- <span>Drop files here. 100 MB maximum file size or <a href="https://convertio.co/pricing/?utm_source=index" class="text-white text-primary-hover">Sign Up</a></span> -->
                </div>
            </div>
        </div>
    </div>
</div>

        
    </div>
    <?php  include 'footer.php'; ?>
    </div>
    <?php  include 'js.php'; ?>
</body>
</html>
