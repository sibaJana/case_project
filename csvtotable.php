<?php
// Check if a file was uploaded
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
    <title>Online CSV Viewer: Explore and Analyze CSV Files in Your Browser</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <meta name="description" content="Powerful CSV viewer: Analyze, explore, and read CSV files online. Effortlessly navigate data, gain insights, and simplify your workflow">
    <meta name="keywords" content="csv viewer, online csv viewer, csv file reader,csv visualizer,csv file viewer online">
    <meta name="robots" content="index,follow">
    <link rel="canonical" href="https://www.example.com">
    <meta property="og:title" content="Online CSV Viewer: Explore and Analyze CSV Files in Your Browser">
    <meta property="og:description" content="Powerful CSV viewer: Analyze, explore, and read CSV files online. Effortlessly navigate data, gain insights, and simplify your workflow">
    <meta property="og:image" content="https://www.alpokotha.in/">
    <meta name="twitter:title" content="Online CSV Viewer: Explore and Analyze CSV Files in Your Browser">
    <meta name="twitter:description" content="Powerful CSV viewer: Analyze, explore, and read CSV files online. Effortlessly navigate data, gain insights, and simplify your workflow">
    <meta name="twitter:image" content="https://www.example.com/image.jpg">

    <style>
       table {
            width: 100%;
            border-collapse: collapse;
            
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
        @media (max-width: 767px) {
            table th,
            table td {
                font-size: 40px;
            }
        }
    .dataTables_wrapper .dataTables_filter {
    /* float: right;
    text-align: right; */
    margin-top: 10px;
    margin-bottom: 20px;
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
    <?php include 'navbar.php'; ?>
    <h1 align="center" class="mt-2">Online CSV Viewer: Explore and Analyze CSV Files in Your Browser</h1>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="csvFile">
        <button type="submit">Upload</button>
    </form>

    <?php if (isset($csvData) && !$error): ?>
        <table id="myTable" >
        <!-- <thead>
                <tr align="center">
                    <?php //for ($i = 0; $i < count($csvData[0]); $i++): ?>
                        
                        <th><?php //echo chr(65 + $i); ?></th>
                    <?php //endfor; ?>
                </tr>
            </thead>

            <tbody> -->




            <thead>
    <tr align="center">
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
        
        <tr>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>     
            
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