<?php
function get_page_load_time($url) {
    $start_time = microtime(true);
    $content = file_get_contents($url);
    $end_time = microtime(true);
    $load_time = $end_time - $start_time;
    return $load_time;
}

// Usage example
$website_url = 'https://www.codingbaz.in';
$page_load_time = get_page_load_time($website_url);
echo 'Page Load Time: ' . $page_load_time . ' seconds';
?>
