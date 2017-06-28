<?php
/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = 'root';
$db = 'accounts';
$mysqli = new mysqli($host,$user,$pass,$db); //or die($mysqli->error);
if(!isset($mysqli)){
    trigger_error('Cannot open Database', E_USER_NOTICE);
}