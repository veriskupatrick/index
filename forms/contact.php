<?php

  $receiving_email_address = 'pxie@silone.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];


  $contact->smtp = array(
    'host' => 'smtp-relay.sendinblue.com/',
    'username' => 'siloneemail@gmail.com',
    'password' => 'L6cV0vJqsUIQ2fRN',
    'port' => '587'
  );


  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();

  $contact->invalid_to_email = 'Email to (receiving email address) is empty or invalid!';
  $contact->invalid_from_name = 'From Name is empty!';

  $contact->invalid_from_email = 'Email from: is empty or invalid!';
  $contact->invalid_subject = 'Subject is too short or empty!';
  $contact->short = 'is too short or empty!'; // If the length check number is set and the provided message text is under the set length in the add_message() method call
  $contact->ajax_error = 'Sorry, the request should be an Ajax POST'; // If ajax property is set true and the post method is not an AJAX call
?>
