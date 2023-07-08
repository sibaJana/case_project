<!DOCTYPE html>
<html>
<head>
    <title>Binary to Decimal Converter</title>
    <style>
        table {
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
            text-align: center;
            border: 1px solid black;
        }

        .chart-container {
    display: flex;
    flex-direction: row;
    justify-content: flex-end;
    align-items: center;
    height: 100px;
    margin-top: 10px;
}

.bar-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-right: 10px;
}

.binary-digit {
    font-size: 14px;
    font-weight: bold;
}

.decimal-value {
    font-size: 12px;
}

.bar {
    background-color: #336699;
    height: 40px;
    width: 0;
    transition: width 0.5s ease;
}
.number-line-container {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.tick-marks-container {
    display: flex;
}

.tick-mark {
    width: 40px;
    height: 2px;
    background-color: #000;
    margin-right: 10px;
}

.tick-mark.final-tick-mark {
    width: 60px;
}

.decimal-value-container {
    display: flex;
    margin-top: 10px;
}

.decimal-value {
    font-size: 14px;
    font-weight: bold;
    margin-right: 10px;
}

.decimal-value.final-decimal-value {
    font-size: 16px;
}
body {
            font-family: Arial, sans-serif;
        }

        h2 {
            margin-bottom: 20px;
        }

        .converter-container {
            max-width: 400px;
            margin: 0 auto;
            text-align: center;
        }

        .input-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        #binary_number {
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 10px;
        }

        #convert {
            padding: 8px 16px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        #graphical_representation {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .binary-digit {
            width: 30px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            background-color: #f1f1f1;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin: 5px;
        }

        .decimal-value {
            font-size: 14px;
            margin-top: 5px;
        }

    </style>
    <link rel="stylesheet" href="style.css">
    <?php include 'cs.php'; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container">
    <?php include 'navbar.php'; ?>
    <div class="converter-container">
        <h2>Binary to Decimal Converter</h2>
        <div class="input-container">
            <input type="text" id="binary_number" placeholder="Enter a binary number">
            <button id="convert">Convert</button>
        </div>
        <div class="col-12 col-md-6 mb-3" id="graphical_representation"></div>
        <div class="col-12 col-md-4 mb-3" id="graphical_representation1"></div>
        <!-- <div class="col-12 col-md-4 mb-3" id="graphical_representation2"></div> -->
    </div>
   
    <?php include 'footer.php'; ?>
    <?php include 'js.php'; ?>
    </div>
    <script>
        $(document).ready(function(){
            $('#convert').click(function(){
                var binaryNumber = $('#binary_number').val();
                $.post(window.location.href, {binary_number: binaryNumber}, function(data){
                    $('#decimal_result').text(data);
                    showGraphicalRepresentation(binaryNumber, data);
                    showGraphicalRepresentation1(binaryNumber, data);
                    showGraphicalRepresentation2(binaryNumber, data);
                });
            });
        });

        function showGraphicalRepresentation(binaryNumber, decimalNumber) {
    var table = '<table class="table col-sm-12"><tr><th>Binary Digit</th><th>Place Value</th><th>Decimal Value</th></tr>';
    var placeValue = 1;
    var result = 0;

    for (var i = binaryNumber.length - 1; i >= 0; i--) {
        var bit = parseInt(binaryNumber.charAt(i));
        var decimal = bit * placeValue;
        result += decimal;
        
        table += '<tr><td>' + bit + '</td><td>2<sup>' + (binaryNumber.length - 1 - i) + '</sup></td><td>' + decimal + '</td></tr>';
        
        placeValue *= 2;
    }

    table += '<tr><td colspan="2"><strong>Decimal Result:</strong></td><td><strong>' + result + '</strong></td></tr>';
    table += '</table>';

    $('#graphical_representation').html(table);
}

function showGraphicalRepresentation1(binaryNumber, decimalNumber) {
    var chartData = [];
    var placeValue = 1;
    var result = 0;

    for (var i = binaryNumber.length - 1; i >= 0; i--) {
        var bit = parseInt(binaryNumber.charAt(i));
        var decimal = bit * placeValue;
        result += decimal;

        chartData.push({
            binary: bit,
            decimal: decimal
        });

        placeValue *= 2;
    }

    // Clear the existing chart
    $('#graphical_representation1').empty();

    // Create a new chart container
    var chartContainer = $('<div class="chart-container"></div>');

    // Iterate over the chart data and create bars
    for (var j = chartData.length - 1; j >= 0; j--) {
        var barContainer = $('<div class="bar-container"></div>');
        var binaryDigit = $('<div class="binary-digit">' + chartData[j].binary + '</div>');
        var decimalValue = $('<div class="decimal-value">' + chartData[j].decimal + '</div>');
        var bar = $('<div class="bar"></div>');

        // Set the width of the bar based on the decimal value
        var barWidth = (chartData[j].decimal / result) * 100 + '%';
        bar.css('width', barWidth);

        // Append the elements to the bar container
        barContainer.append(binaryDigit);
        barContainer.append(decimalValue);
        barContainer.append(bar);

        // Append the bar container to the chart container
        chartContainer.append(barContainer);
    }

    // Append the chart container to the graphical representation div
    $('#graphical_representation1').append(chartContainer);
}
$(document).ready(function(){
    $('#convert').click(function(){
        var binaryNumber = $('#binary_number').val();
        if (validateBinaryNumber(binaryNumber)) {
            showGraphicalRepresentation(binaryNumber);
        } else {
            alert('Please enter a valid binary number.');
        }
    });
});

function validateBinaryNumber(binaryNumber) {
    var binaryRegex = /^[01]+$/;
    return binaryRegex.test(binaryNumber);
}
function showGraphicalRepresentation2(binaryNumber, decimalNumber) {
    var numberLineContainer = $('<div class="number-line-container"></div>');
    var tickMarksContainer = $('<div class="tick-marks-container"></div>');
    var decimalValueContainer = $('<div class="decimal-value-container"></div>');

    var placeValue = 1;
    var result = 0;

    for (var i = binaryNumber.length - 1; i >= 0; i--) {
        var bit = parseInt(binaryNumber.charAt(i));
        var decimal = bit * placeValue;
        result += decimal;

        var tickMark = $('<div class="tick-mark"></div>');
        var decimalValue = $('<div class="decimal-value">' + decimal + '</div>');

        tickMarksContainer.append(tickMark);
        decimalValueContainer.append(decimalValue);

        placeValue *= 2;
    }

    var finalTickMark = $('<div class="tick-mark final-tick-mark"></div>');
    var finalDecimalValue = $('<div class="decimal-value final-decimal-value">' + result + '</div>');

    tickMarksContainer.append(finalTickMark);
    decimalValueContainer.append(finalDecimalValue);

    numberLineContainer.append(tickMarksContainer);
    numberLineContainer.append(decimalValueContainer);

    $('#graphical_representation2').empty().append(numberLineContainer);
}


    </script>
</body>
</html>
