<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Password Generator</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .password-generator {
      background-color: #f1f1f1;
      padding: 20px;
      text-align: center;
    }

    h1 {
      font-size: 24px;
      color: #333;
      margin-bottom: 10px;
    }

    .text-x-large {
      font-size: 18px;
      color: #666;
      margin-bottom: 20px;
    }

    .generator-container {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .input-group {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
    }

    .input-group label {
      margin-right: 10px;
    }

    .input-group input[type="number"] {
      padding: 5px;
      width: 50px;
    }

    .input-group button {
      padding: 5px 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }

    .input-group button:hover {
      background-color: #45a049;
    }

    .password {
      font-size: 20px;
      margin-top: 20px;
      padding: 10px;
      background-color: #fff;
      border: 1px solid #ccc;
      width: 300px;
      word-break: break-all;
    }
  </style>
</head>
<body>
  <section class="password-generator">
    <h1>Random Password Generator</h1>
    <p class="text-x-large">Create strong and secure passwords to keep your account safe online.</p>
    <div class="generator-container">
      <div class="input-group">
        <label for="length">Length:</label>
        <input type="number" id="length" min="4" max="30" value="8">
      </div>
      <div class="input-group">
        <button id="generate">Generate Password</button>
      </div>
      <div id="password" class="password"></div>
    </div>
  </section>

  <script>
    function generatePassword() {
      var length = document.getElementById("length").value;
      var charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-+=";
      var password = "";
      for (var i = 0; i < length; i++) {
        var randomIndex = Math.floor(Math.random() * charset.length);
        password += charset.charAt(randomIndex);
      }
      document.getElementById("password").textContent = password;
    }

    document.getElementById("generate").addEventListener("click", generatePassword);
  </script>
</body>
</html>
