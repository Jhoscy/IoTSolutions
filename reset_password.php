<?php
/* Password reset process, updates database with new user password */
require 'db.php';
require 'customPHP.php';
session_start();


// Make sure the form is being submitted with method="post"
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
   
    // Make sure the two passwords match
    if ( $_POST['newpassword'] == $_POST['confirmpassword'] ) { 

        $new_password = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);
        
        // We get $_POST['email'] and $_POST['hash'] from the hidden input field of reset.php form
        //$email = $mysqli->escape_string($_POST['email']);
        //$hash = $mysqli->escape_string($_POST['hash']);
        if(authenticate($_POST['email'], $_POST['password'],$_POST['hash'], $_POST['active'])){
            $email=emailSecure($_POST['email']);
            $hash=hashSecure($_POST['hash']);
        }else{
            trigger_error("Email, Password and Hash is unchecked", E_USER_WARNING);
        }
        
        //settype($offset, 'integer');
        //$sql = "UPDATE users SET password='$new_password', hash='$hash' WHERE email='$email'";
        
        $sql= sprintf("UPDATE users SET password='$new_password', hash='$hash' WHERE email='$email' %d;", $offset);
        $sql1=sprintf("UPDATE users SET password='%s', hash='%s' WHERE email='%s'", 
                mysql_real_escape_string($new_password),
                mysql_real_escape_string($hash),
                mysql_real_escape_string($email));
        if ( $mysqli->query($sql1) ) {

        $_SESSION['message'] = 'Your password has been reset successfully!';
        header('location: success.php');    

        }

    }
    else {
        $_SESSION['message'] = "Two passwords you entered don't match, try again!";
        header('location: error.php');    
    }

}
