<?php
// Check if a file was uploaded
error_reporting(0);
$error = false; // Initialize the $error variable
if (isset($_FILES['csvFile']) && $_FILES['csvFile']['error'] === UPLOAD_ERR_OK) {
    $csvFile = $_FILES['csvFile']['tmp_name'];

    // Read the CSV file
    $csvData = [];
    if (($handle = fopen($csvFile, 'r')) !== false) {
        while (($row = fgetcsv($handle)) !== false) {
            $csvData[] = $row;
        }
        fclose($handle);
    } else {
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
    <?php  include 'cs.php'; ?>

    <title>Online CSV Viewer: Explore and Analyze CSV Files in Your Browser</title>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <meta name="description" content="Powerful CSV viewer: Analyze, explore, and read CSV files online. Effortlessly navigate data, gain insights, and simplify your workflow">
    <meta name="keywords" content="csv viewer, online csv viewer, csv file reader,csv visualizer,csv file viewer online">
    <meta name="robots" content="index,follow">
    <link rel="canonical" href="https://www.alpokotha.in">
    <meta property="og:title" content="Online CSV Viewer: Explore and Analyze CSV Files in Your Browser">
    <meta property="og:description" content="Powerful CSV viewer: Analyze, explore, and read CSV files online. Effortlessly navigate data, gain insights, and simplify your workflow">
    <meta property="og:image" content="https://www.alpokotha.in/">
    <meta name="twitter:title" content="Online CSV Viewer: Explore and Analyze CSV Files in Your Browser">
    <meta name="twitter:description" content="Powerful CSV viewer: Analyze, explore, and read CSV files online. Effortlessly navigate data, gain insights, and simplify your workflow">
    <meta name="twitter:image" content="https://www.example.com/image.jpg">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3093970335821256"crossorigin="anonymous"></script>
    <style>
        /* td{
            font-size: 20px;
        }
        ul li{
            font-size: 20px;
        } */
   
       table {
            width: 100%;
            border-collapse: collapse;
            /* font-size: 40px; */
            
        }
        
        th, td {
            padding: 8px;
            border: 1px solid #ddd;
        }
        
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        
        td {
            text-align: center;
            
        }
        
        /* .dataTables_wrapper {
            margin-top: 20px;
        } */

        .filter-input {
            display: none;
        }
    
    .dataTables_wrapper .dataTables_filter {
    /* float: right;
    text-align: right; */
    margin-top: 10px;
    margin-bottom: 20px;
}
button, input, optgroup, select, textarea{
            margin-left: 20px;
            margin-bottom: 12px;
        }
@media (max-width: 767px) {
        *{
            font-size: 20px;
        }
        button, input, optgroup, select, textarea{
            margin-left: 80px;
            margin-bottom: 12px;
        }
    }



    </style>

<script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "WebApplication",
        "name": "Online CSV Viewer",
        "description": "A powerful tool to explore and analyze CSV files online.",
        "operatingSystem": "All",
        "applicationCategory": "Data Analysis",
        "offers": {
            "@type": "Offer",
            "price": "0",
            "priceCurrency": "USD"
        }
    }
    </script>
</head>
<body>
    <div class="container">
    <?php include 'navbar.php'; ?>
    <h1 align="center" class="mt-2">Online CSV Viewer: Explore and Analyze CSV Files in Your Browser</h1>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="csvFile">
        <button type="submit">Upload</button>
    </form>

    <?php if (isset($csvData) && !$error): ?>
        <table id="myTable" class="table table-hover sm-12">
        <!-- <thead>
                <tr align="center">
                    <?php //for ($i = 0; $i < count($csvData[0]); $i++): ?>
                        
                        <th><?php //echo chr(65 + $i); ?></th>
                    <?php //endfor; ?>
                </tr>
            </thead>

            <tbody> -->




            <thead>
    <tr align="center" class="fs-2">
        <?php for ($i = 0; $i < count($csvData[0]); $i++): ?>
            <?php
            $columnValues = array_column($csvData, $i); // Get all values in the column
            $columnDataType = getColumnDataType($columnValues); // Determine the data type of the column
            ?>
            <th>
                <?php if ($columnDataType === 'number'): ?>
                    <input class="filter-input" type="number">
                <?php elseif ($columnDataType === 'date'): ?>
                    <input class="filter-input" type="date">
                <?php endif; ?>
                <?php echo chr(65 + $i) /* . ' (' . $columnDataType . ')' */; ?>
            </th>
        <?php endfor; ?>
    </tr>
</thead>






    <?php for ($i = 1; $i < count($csvData); $i++): ?>
        
        <tr class="text-sm-start">
            <?php foreach ($csvData[$i] as $cell): ?>
                <?php
                
                    $decodedCell = htmlspecialchars_decode(utf8_encode($cell));
                    $displayText = strlen($decodedCell) > 25 ? substr($decodedCell, 0, 25) . '...' : $decodedCell;
                    $isNumeric = is_numeric($decodedCell);
                    $isDate = strtotime($decodedCell) !== false;
                ?>
                <td title="<?php echo htmlspecialchars($decodedCell); ?>">
                    <?php if ($isNumeric || $isDate): ?>
                        <span class="hover-text"><?php echo htmlspecialchars($decodedCell); ?></span>
                    <?php else: ?>
                        <?php echo htmlspecialchars($displayText); ?>
                    <?php endif; ?>
                </td>
            <?php endforeach; ?>
        </tr>
    <?php endfor; ?>
</tbody>


        </table>
        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title" id="modalLabel">Row Data</h5> -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modalData"></div>
                </div>
            </div>
        </div>
        <?php echo include 'js.php'; ?>
      <script>
            
            $(document).ready(function() {
                var table = $('#myTable').DataTable();

                $('input.filter-input').on('keyup change', function () {
                    var columnIndex = $(this).closest('th').index();
                    var filterValue = $(this).val();

                    table.column(columnIndex).search(filterValue, true, false).draw();
                });

                // Show filter inputs for numeric and date columns
                $('#myTable thead th').each(function () {
                    var columnIndex = $(this).index();
                    var columnData = table.column(columnIndex).data();

                    if (columnData.length > 0) {
                        var columnDataType = typeof columnData[0];
                        if (columnDataType === 'number' || columnDataType === 'date') {
                            $(this).find('.filter-input').show();
                            $(this).addClass('filterable-column'); // Add class to filterable columns
                        }
                    }
                });

                // Show modal with row data
                $('#myTable tbody').on('click', 'tr', function () {
                    var rowData = table.row(this).data();
                    var modalDataHtml = '';

                    $(this).find('.filterable-column').each(function () {
                        var columnIndex = $(this).index();
                        var cell = rowData[columnIndex];
                        var columnDataType = typeof cell;

                        if (columnDataType === 'number' || (columnDataType === 'string' && !isNaN(Date.parse(cell)))) {
                            modalDataHtml += '<p>' + cell + '</p>';
                        }
                    });

                    if (modalDataHtml !== '') {
                        $('#modalData').html(modalDataHtml);
                        $('#myModal').modal('show');
                    }
                });
            });





            
        </script>
    <?php elseif (isset($error)): ?>
        <p>Error occurred while reading the CSV file.</p>
    <?php endif; ?>
  <ul> 
    <li> 
Place the PHP code in a file with a .Personal home page extension, which includes csv_viewer.Php.</li>
<li>
Upload the document to a web server that supports PHP.</li>
<li>
Access the CSV viewer on your net browser with the aid of coming into the URL of the record. For example, if the record is hosted at https://www.Example.Com/csv_viewer.Php, visit that URL.
    </li><li>
On the CSV viewer page, you'll see a file add form. Click the "Choose File" button to pick a CSV report from your neighborhood laptop.
</li><li>
After selecting the report, click the "Upload" button to add the CSV file to the server.
</li><li>
If the CSV report is correctly uploaded and read, you may see the contents displayed in an interactive table.
</li><li>
You can explore and examine the CSV facts the use of the features furnished, along with sorting, filtering, and clicking on rows to view specified records.
</li></ul>
<script>
    // Increase font size for mobile devices
    if (window.innerWidth < 468) {
        var tableCells = document.querySelectorAll('table td, table th');
        for (var i = 0; i < tableCells.length; i++) {
            tableCells[i].style.fontSize = '124px'; /* Adjust the font size as needed */
        }
    }
</script>

</div>
<?php  include 'footer.php' ; ?>
<?php  include 'js.php' ; ?>
</body>
</html>
<?php 


function getColumnDataType($columnValues)
{
    $numericCount = 0;
    $dateCount = 0;
    $totalCount = count($columnValues);

    foreach ($columnValues as $value) {
        if (is_numeric($value)) {
            $numericCount++;
        } elseif (strtotime($value) !== false) {
            $dateCount++;
        }
    }

    if ($numericCount == $totalCount) {
        return 'number';
    } elseif ($dateCount == $totalCount) {
        return 'date';
    }

    return 'text'; // Default to text data type if no specific type is identified
}


?>