<?php
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */

// Set session variables to be used on profile.php page
$_SESSION['email'] = $_POST['email'];
$_SESSION['first_name'] = $_POST['firstname'];
$_SESSION['last_name'] = $_POST['lastname'];

// Escape all $_POST variables to protect against SQL injections

$first_name = $mysqli->escape_string($_POST['firstname']);
$last_name = $mysqli->escape_string($_POST['lastname']);

//$email = $mysqli->escape_string($_POST['email']);
$email = $mysqli->escape_string(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
	if($email===false){
		trigger_error('Invalid email', E_USER_WARNING);
	}
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
//$hash = $mysqli->escape_string( md5( rand(0,1000000000) ) );

  $hash = $mysqli->escape_string(md5(uniqid(mt_rand(), true)));   
 
  //$hashmessage= $mysqli->escape_string( hash_hmac('sha256', $hashmessage, 'thisismykey'));
 // Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");// or die($mysqli->error());
if(!($result)){
    trigger_error("User with this email doesn't exist", E_USER_WARNING);
}

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'User with this email already exists!';
    header('location: error.php');
    
}
else { // Email doesn't already exist in a database, proceed...
        
    // active is 0 by DEFAULT (no need to include it here)
    $sql = 'INSERT INTO users (first_name, last_name, email, password, hash) '
            . "VALUES ('$first_name','$last_name','$email','$password', '$hash')";
    
    // Add user to the database
    if ( $mysqli->query($sql) ){

        $_SESSION['active'] = 0; //0 until user activates their account with verify.php
        $_SESSION['logged_in'] = true; // So we know the user has logged in
        $_SESSION['message'] =
                
                 "Confirmation link has been sent to $email, please verify
                 your account by clicking on the link in the message!";

        // Send registration confirmation link (verify.php)
        $to      = $email;
        $subject = 'Account Verification ( IoTSolutions.com )';
        $message_body = '
        Hello '.$first_name.',

        Thank you for signing up!

        Please click this link to activate your account:

        http://localhost/Login-System-PHP/Login-PHP-Kiuwan/verify.php?email='.$email.'&hash='.$hash;  

        mail( $to, $subject, $message_body );

        header('location: profile.php'); 

    }

    else {
        $_SESSION['message'] = 'Registration failed!';
        header('location: error.php');
    }

}