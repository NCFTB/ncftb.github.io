<!DOCTYPE php>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.ico">
    <title>Contact us!</title>

    <!-- Bootstrap core -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">
    
    <link href='https://fonts.googleapis.com/css?family=Montserrat:700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lora:400italic' rel='stylesheet' type='text/css'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

  </head>

  <body>
<div class="text">
<?php
  // Change this to YOUR address
  $recipient = 'nevadacountyftb@gmail.com';
  $email = $_POST['email'];
  $realName = $_POST['realname'];
  $subject = $_POST['subject'];
  $body = $_POST['body'];
  # We'll make a list of error messages in an array
  $messages = array();
# Allow only reasonable email addresses
if (!preg_match("/^[\w\+\-.~]+\@[\-\w\.\!]+$/", $email)) {
$messages[] = "That is not a valid email address.";
}
# Allow only reasonable real names
if (!preg_match("/^[\w\ \+\-\'\"]+$/", $realName)) {
$messages[] = "The real name field must contain only " .
"alphabetical characters, numbers, spaces, and " .
"reasonable punctuation. We apologize for any inconvenience.";
}
# CAREFUL: don't allow hackers to sneak line breaks and additional
# headers into the message and trick us into spamming for them!
$subject = preg_replace('/\s+/', ' ', $subject);
# Make sure the subject isn't blank afterwards!
if (preg_match('/^\s*$/', $subject)) {
$messages[] = "Please specify a subject for your message.";
}

$body = $_POST['body'];
# Make sure the message has a body
if (preg_match('/^\s*$/', $body)) {
$messages[] = "Your message was blank. Did you mean to say " .
"something?";
}
  if (count($messages)) {
    # There were problems, so tell the user and
    # don't send the message yet
    foreach ($messages as $message) {
      echo("<p>$message</p>\n");
    }
    echo("<p>Click the back button and correct the problems. " .
      "Then click Send Your Message again.</p>");
  } else {
    # Send the email - we're done
mail($recipient,
      $subject,
      $body,
      "From: $realName <$email>\r\n" .
      "Reply-To: $realName <$email>\r\n");
    echo("<p>Your message has been sent. Thank you!</p>\n");
  }
?>
</body>
</html>

    </div><!-- /.container -->


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>

</html>
