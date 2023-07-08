<?php

function encrypt($plaintext, $key)
{
    $ivSize = openssl_cipher_iv_length('aes-256-cbc');
    $iv = openssl_random_pseudo_bytes($ivSize);
    $ciphertext = openssl_encrypt($plaintext, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
    return base64_encode($iv . $ciphertext);
}

function decrypt($ciphertext, $key)
{
    $ciphertext = base64_decode($ciphertext);
    $ivSize = openssl_cipher_iv_length('aes-256-cbc');
    $iv = substr($ciphertext, 0, $ivSize);
    $ciphertext = substr($ciphertext, $ivSize);
    return openssl_decrypt($ciphertext, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
}

// Example usage
$plaintext = "This is a secret message.";
$key = "mysecretkey";
$key1="sibajana";
$encrypted = encrypt($plaintext, $key);
$decrypted = decrypt($encrypted, $key1);

echo "Plaintext: " . $plaintext . "\n";
echo "Encrypted: " . $encrypted . "\n";
echo "Decrypted: " . $decrypted . "\n";

?>
