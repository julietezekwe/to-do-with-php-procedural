<?php
session_start();
define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "");
define("DBNAME", "todo");

$connect = mysqli_connect(DBHOST, DBUSER, DBPASS);
if(!$connect){
	die("Could not connect to the database ".mysqli_error());
}

$dbSelect = mysqli_select_db($connect, DBNAME);
if(!$dbSelect){
	die("Could not select database ".mysqli_error());
}