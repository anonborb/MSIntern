<?php
//this funtion prints all rooms in the database

require '../../../data/DataHandler.php';
session_start();

$db = $_SESSION['testhandler'][0];
echo "<pre>";
$db->list_all_rooms();