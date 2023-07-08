<?php
phpinfo();
// Database configuration (you can modify this based on your setup)
$dbHost = 'localhost';
$dbName = 'url_shortener';
$dbUser = 'root';
$dbPass = '';

// Function to generate a unique short code
function generateShortCode($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    $characterCount = strlen($characters);

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $characterCount - 1)];
    }

    return $randomString;
}

// Connect to the database
$db = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
if ($db->connect_error) {
    die('Connection failed: ' . $db->connect_error);
}

// Handle form submission
if (isset($_POST['url'])) {
    $originalUrl = $_POST['url'];

    // Check if the URL is already in the database
    $query = $db->prepare('SELECT * FROM urls WHERE original_url = ?');
    $query->bind_param('s', $originalUrl);
    $query->execute();

    $result = $query->get_result()->fetch_assoc();

    if ($result) {
        // URL already exists, return the existing short URL
        $shortUrl = $result['short_url'];
    } else {
        // Generate a unique short code
        $shortCode = generateShortCode();

        // Insert the URL into the database
        $query = $db->prepare('INSERT INTO urls (original_url, short_url) VALUES (?, ?)');
        $query->bind_param('ss', $originalUrl, $shortCode);
        $query->execute();

        // Create the short URL
        $shortUrl = 'http://codingbaz.in/' . $shortCode;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>URL Shortener</title>
</head>
<body>
    <h1>URL Shortener</h1>

    <form method="post" action="">
        <input type="text" name="url" placeholder="Enter your URL" required>
        <input type="submit" value="Shorten">
    </form>

    <?php if (isset($shortUrl)): ?>
        <p>Your shortened URL: <a href="<?php echo $shortUrl; ?>"><?php echo $shortUrl; ?></a></p>
    <?php endif; ?>
</body>
</html>
