<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Create highly secure passwords with our Strong Password Generator. Ensure the safety of your online accounts with reliable and unbreakable password combinations">
    <meta name="keywords" content="strong password generator,random password,passgen">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Strong Password Generator</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      text-align: center;
    }

    h1 {
      color: #333333;
      margin-top: 30px;
    }

    #container-x {
      margin-top: 50px;
      max-width: 400px;
      margin-left: auto;
      margin-right: auto;
      background-color: #ffffff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    #password-length {
      margin-bottom: 20px;
    }

    label {
      font-weight: bold;
      display: block;
      margin-bottom: 10px;
      text-align: left;
    }

    .checkbox-group {
      margin-bottom: 15px;
      text-align: left;
    }

    img {
      margin-top: 30px;
      max-width: 200px;
    }

    #generate-btn {
      padding: 10px 20px;
      font-size: 16px;
      background-color: #4caf50;
      border: none;
      color: #ffffff;
      cursor: pointer;
    }

    #generated-password {
      margin-top: 30px;
      font-weight: bold;
      font-size: 18px;
    }

    #password-strength {
      margin-top: 20px;
      font-weight: bold;
      font-size: 18px;
    }

    .weak {
      color: red;
    }

    .medium {
      color: orange;
    }

    .strong {
      color: green;
    }

    .copy-btn {
      padding: 5px 10px;
      font-size: 14px;
      background-color: #4e8cff;
      border: none;
      color: #ffffff;
      cursor: pointer;
      margin-left: 10px;
    }
  </style>
</head>
<body>
    <div class="container">
    <?php include 'navbar.php'; ?>
  <h1>Strong Password Generator - Generate Secure and Reliable Passwords</h1>
  <div id="container-x">
    <div>
      <label for="password-length">Password Length:</label>
      <input type="number" id="password-length" min="1" max="30" value="12">
    </div>
    <div class="checkbox-group">
      <label for="lowercase">Lowercase (abc)</label>
      <input type="checkbox" id="lowercase" checked>
    </div>
    <div class="checkbox-group">
      <label for="uppercase">Uppercase (ABC)</label>
      <input type="checkbox" id="uppercase" checked>
    </div>
    <div class="checkbox-group">
      <label for="numbers">Numbers (123)</label>
      <input type="checkbox" id="numbers" checked>
    </div>
    <div class="checkbox-group">
      <label for="special-characters">Special Characters (#&$)</label>
      <input type="checkbox" id="special-characters" checked>
    </div>
    <button id="generate-btn">Generate Password</button>
    <div id="generated-password"></div>
    <div id="password-strength"></div>
  </div>
  <?php include 'footer.php'; ?>
  </div>
  <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script>
    // Generate password function
    function generatePassword() {
      var passwordLength = document.getElementById('password-length').value;
      var lowercaseChecked = document.getElementById('lowercase').checked;
      var uppercaseChecked = document.getElementById('uppercase').checked;
      var numbersChecked = document.getElementById('numbers').checked;
      var specialCharactersChecked = document.getElementById('special-characters').checked;

      var characters = '';
      var password = '';

      if (lowercaseChecked) {
        characters += 'abcdefghijklmnopqrstuvwxyz';
      }

      if (uppercaseChecked) {
        characters += 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      }

      if (numbersChecked) {
        characters += '1234567890';
      }

      if (specialCharactersChecked) {
        characters += '#&$!@%^&*()-_=+[{]|:\'<>/?';
      }

      for (var i = 0; i < passwordLength; i++) {
        password += characters.charAt(Math.floor(Math.random() * characters.length));
      }

      document.getElementById('generated-password').textContent = 'Generated Password: ' + password;

      var strength = calculatePasswordStrength(password);
      var strengthElement = document.getElementById('password-strength');
      strengthElement.textContent = 'Password Strength: ' + strength;
      strengthElement.className = strength.toLowerCase();
    }

    // Calculate password strength function
    function calculatePasswordStrength(password) {
      // Custom logic to calculate password strength
      // Modify this function according to your requirements

      var passwordLength = password.length;
      var hasLowercase = /[a-z]/.test(password);
      var hasUppercase = /[A-Z]/.test(password);
      var hasNumbers = /[0-9]/.test(password);
      var hasSpecialCharacters = /[#$&]/.test(password);

      if (passwordLength < 6) {
        return 'Very Weak';
      } else if (passwordLength < 8 || (!hasLowercase && !hasUppercase && !hasNumbers && !hasSpecialCharacters)) {
        return 'Weak';
      } else if (passwordLength < 10 || (!hasLowercase || !hasUppercase || !hasNumbers || !hasSpecialCharacters)) {
        return 'Medium';
      } else {
        if (!hasLowercase || !hasUppercase || !hasNumbers || !hasSpecialCharacters) {
          return 'Very Strong (Recommended to include all character types)';
        } else {
          return 'Strong';
        }
      }
    }

    // Copy password to clipboard
    function copyPassword() {
  var passwordElement = document.getElementById('generated-password');
  var passwordText = passwordElement.textContent.trim().split(': ')[1];

  var tempInput = document.createElement('input');
  tempInput.setAttribute('type', 'text');
  tempInput.setAttribute('value', passwordText);
  document.body.appendChild(tempInput);

  tempInput.select();
  document.execCommand('copy');
  document.body.removeChild(tempInput);

  alert('Password copied to clipboard!');
}


    // Generate password button click event
    document.getElementById('generate-btn').addEventListener('click', generatePassword);

    // Copy password button click event
    document.getElementById('generated-password').addEventListener('click', copyPassword);
  </script>
</body>
</html>
