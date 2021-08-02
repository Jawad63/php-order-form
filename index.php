<?php
// setting variable here:
$emailErr = "";

// making the condition:
if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  }
  
else {
    $email = test_input($_POST["email"]);

    // check if e-mail address is well-formed:
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
}

// don't know what this is? 
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>