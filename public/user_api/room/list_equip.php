<?php
//list all equipment held in this room

require '../../../data/DataHandler.php';
session_start();

$db = $_SESSION['testhandler'][0];
echo "<pre>warehouse:<br>";
$db->list_all_equipment();