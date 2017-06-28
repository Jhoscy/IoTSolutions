<?php
/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = 'admin';
$db = 'accounts';
$mysqli = new mysqli($host,$user,$pass,$db); //or die($mysqli->error);
if(!$mysqli){
    trigger_error('Cannot open Database', E_USER_NOTICE);
}