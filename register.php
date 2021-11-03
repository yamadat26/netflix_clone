<?php
require_once("includes/config.php");
require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/Constants.php");
require_once("includes/classes/Account.php");

  $account = new Account($con);

  if(isset($_POST["submitButton"])) {
    $firstName = FormSanitizer::sanitizeFormString($_POST["firstName"]);
    $lastName = FormSanitizer::sanitizeFormString($_POST["lastName"]);
    $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
    $email = FormSanitizer::sanitizeFormEmail($_POST["email"]);
    $email2 = FormSanitizer::sanitizeFormEmail($_POST["email2"]);
    $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
    $password2 = FormSanitizer::sanitizeFormPassword($_POST["password2"]);

    $success = $account->register($firstName, $lastName, $username, $email, $email2, $password, $password2);

    if($success) {
      // Store session
      $_SESSION["userLoggedIn"] = $username;
      header("Location: index.php");
    }
  }
  function getInputValue($name) {
    if(isset($_POST[$name])) {
      echo $_POST[$name];
    }
  }
  
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to Reeceflix</title>
  <link rel="stylesheet" type="text/css" href="assets/style/style.css" />
</head>
<body>
  <div class="signInContainer">
    <div class="column">
      <div class="header">
        <img src="assets/images/logo.png" title="Logo" alt="Reeceflix" />
        <h3>Sign Up</h3>
        <span>to continue to Reeceflix</span>
      </div>
      <form action="" method="POST">
        
        <?php echo $account->getError(Constants::$firstNameCharacters); ?>
        <input type="text" name="firstName" id="" placeholder="First Name" value="<?php getInputValue("firstName"); ?>" required>
        <?php echo $account->getError(Constants::$lastNameCharacters); ?>
        <input type="text" name="lastName" id="" placeholder="Last Name" value="<?php getInputValue("lastName"); ?>" required>
        <?php echo $account->getError(Constants::$usernameCharacters); ?>
        <?php echo $account->getError(Constants::$usernameTaken); ?>
        <input type="text" name="username" id="" placeholder="Username" value="<?php getInputValue("username"); ?>" required>
        <?php echo $account->getError(Constants::$emailsDontMatch); ?>
        <?php echo $account->getError(Constants::$emailInvalid); ?>
        <?php echo $account->getError(Constants::$emailTaken); ?>
        <input type="email" name="email" id="" placeholder="Email" value="<?php getInputValue("email"); ?>" required>
        <input type="email" name="email2" id="" placeholder="Confirm Email" value="<?php getInputValue("email2"); ?>" required>
        <?php echo $account->getError(Constants::$passwordsDontMatch); ?>
        <?php echo $account->getError(Constants::$passwordLength); ?>
        <input type="password" name="password" id="" placeholder="Password" required>
        <input type="password" name="password2" id="" placeholder="Confirm Password" required>
        <input type="submit" value="SUBMIT" name="submitButton">
      </form>
      <a href="login.php" class="signInMessage">Already have an account? Sign In here!</a>
    </div>
  </div>
</body>
</html>