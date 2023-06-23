<?php
function get_page_load_time($url) {
    return microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];
}

function get_content_size($url) {
    $content = file_get_contents($url);
    return strlen($content);
}

$website_url = 'https://www.alpokotha.in';
$page_load_time = get_page_load_time($website_url);
$content_size = get_content_size($website_url);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page Load Time</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="chart"></canvas>

    <script>
        let page_load_time = <?php echo $page_load_time; ?>;
        let content_size = <?php echo $content_size; ?>;

        let ctx = document.getElementById('chart').getContext('2d');
        let chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Page Load Time', 'Content Size'],
                datasets: [{
                    label: 'Statistics',
                    data: [page_load_time, content_size],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
