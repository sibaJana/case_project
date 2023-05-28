<?php

$functionName = $_POST['functionName'];
$txtRaw = $_POST['txtRaw'];

if ($functionName === 'convert_md5') {
    $md5Hash = md5($txtRaw);
    $response = array('hashcode' => $md5Hash);
    echo json_encode($response);
    exit;
  }
  if ($functionName === 'convert_sha1') {
    $sha1Hash = sha1($txtRaw);
    $response = array('hashcode' => $sha1Hash);
    echo json_encode($response);
    exit;
  }
  if ($functionName === 'convert_sha256') {
    $sha256Hash = hash('sha256', $txtRaw);
    $response = array('hashcode' => $sha256Hash);
    echo json_encode($response);
  }
  if ($functionName === 'convert_sha3') {
    $sha3Hash = hash('sha3-256', $txtRaw); // or hash('sha3-512', $txtRaw) for SHA3-512
    $response = array('hashcode' => $sha3Hash);
    echo json_encode($response);
    exit;
  }
  if ($functionName === 'convert_crc32') {
    $crc32Hash = crc32($txtRaw);
    $response = array('hashcode' => $crc32Hash);
    echo json_encode($response);
    exit;
  }
  if ($functionName === 'convert_whirlpool') {
    $whirlpoolHash = hash('whirlpool', $txtRaw);
    $response = array('hashcode' => $whirlpoolHash);
    echo json_encode($response);
    exit;
  }
  if ($functionName === 'convert_bcrypt') {
  $bcryptHash = password_hash($txtRaw, PASSWORD_BCRYPT);
  $response = array('hashcode' => $bcryptHash);
  echo json_encode($response);
  exit;
  }
  if ($functionName === 'convert_scrypt') {
    extension_loaded('sodium');
    $scryptHash = sodium_crypto_pwhash_str(
        $txtRaw,
        SODIUM_CRYPTO_PWHASH_OPSLIMIT_INTERACTIVE,
        SODIUM_CRYPTO_PWHASH_MEMLIMIT_INTERACTIVE
      );
      $response = array('hashcode' => $scryptHash);
      echo json_encode($response);
      exit;
  }

  if ($functionName === 'convert_argon2') {
    $argon2Hash = password_hash($txtRaw, PASSWORD_ARGON2I); // or PASSWORD_ARGON2ID
    $response = array('hashcode' => $argon2Hash);
    echo json_encode($response);
    exit;
  }


?>