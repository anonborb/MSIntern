<?php
require_once __DIR__.'/../../data/DataHandler.php';
require_once '../../utility/FormHandler.php';   
$DB = new DataHandler;

?><!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <h1>Add Equipment</h1>
        <form method='POST'>
            <label for="new_equip_id">Enter new Equipment-ID:</label><br>
            <input type="text" id="new_equip_id" name="new_equip_id"><br>
            <label for="users">Enter number of users required:</label><br>
            <input type="text" id="users" name="users"><br>
            <label for="storage">Enter required storage space:</label><br>
            <input type="text" id="storage" name="storage"><br>
            <label for="room_id_op">Set location:</label><br>
            <input type="text" id="room_id_op" name="room_id_op" placeholder="(Optional)"><br>
            <label for="overwrite_box">Allow overwrite?</label>
            <input type="checkbox" id="overwrite_box" name="overwrite"><br>

            <br><input type="submit" value="Enter">
        </form>

        <?php

        $fHandler = new FormHandler($_POST);
        if ($fHandler->valid_addEquip()) {
            $equip = new Equipment($_POST['new_equip_id'], $_POST['users'], $_POST['storage'], $_POST['room_id_op']);
            $overwrite = $_POST['overwrite'] ? true : false;
            $eq_added = $DB->add_equipment($equip, $_POST['room_id_op'], $overwrite);

            echo $_POST['new_equip_id'], $eq_added ? " successfully added." : " already exists.";
        } else {
            $fHandler->errors();
        }
        
        ?>
        <br><a href='inventory.php'>View Inventory</a>
    </body>
    
</html>