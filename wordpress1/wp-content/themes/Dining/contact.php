<?php
    define("TITLE", "Contact | Franklin's Fine Dining");

    include('includes/header.php');



?>

<div id="contact">

  <hr>

  <h1>Get in touch with us!</h1>

    <?php

    //check for header injections

    function has_header_injection($str) {
      return preg_match ("/[\r\n]/", $str);
    }

    if(isset($_POST['contact_submit'])){

      $name = trim($_POST['name']);
      $email = trim($_POST['email']);
      $msg = $_POST['message'];

      //Check to see if $name or $email has header injections
      if (has_header_injection($name) || has_header_injection($email)){
        die(); // if true, kill the script
      }

      if (!$name || !$email || !$msg) {

        echo '<h4 class="error">All fields are required!</h4><a href="contact.php"
        class="button block">Go back and try again</a>';
        exit;

      }

      //add the recipient email to a variable

      $to = "vnone90@gmail.com";

      //create a subject
      $subject = "$name sent you a message via your contact form";

      //construct the message
      $message = "Name: $name\r\n";
      $message .= "Email: $email\r\n";
      $message .= "Message:\r\n$msg";

      //if the subscribe checkbox was checked

      if(isset($_POST['subscribe']) && $_POST['subscribe']== 'Subscribe'){
        //add a new line to the message variable
        $message .="\r\n\r\nPlease add $email to the mailing list.\r\n";
      }

      $message = wordwrap($message, 72);

      //set the mail headers into a variable
      $headers = "MIME-Version: 1.0\r\n";
      $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
      $headers .= "From: $name <$email> \r\n";
      $headers .= "X-MSMail-Priority: High\r\n\r\n";

      //send the email!
      mail($to, $subject, $message, $headers);


    ?>

    <!--Show success msg after email was sent -->
    <h5>Thanks for contacting us!</h5>
    <p><a href="contact.php" class="button block">&laquo; Go to home page</a></p>

    <?php } else { ?>

  <form method="post" action="" id="contact-form">

    <label for="name">Vardas</label>
    <input type="text" id="name" name="name">

    <label for="email">El.Paštas</label>
    <input type="email" id="email" name="email">

    <label for="message">Žinutė</label>
    <textarea id="message" name="message"></textarea>

    <input type="checkbox" id="subscribe" name="subscribe"
    value="Subscribe">
    <label for="name">Prenumeruokite naujienlaiškį</label>

    <input type="submit" class="button next" name="contact_submit"
    value="Išsiųsti">
  </form>

<?php } ?>

  <hr>
