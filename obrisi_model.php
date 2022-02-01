<?php

$ID = $_POST['ID_DELETE'];
require('konekcijaBaza.php');

$query = "DELETE FROM PATIKE WHERE ID=" . $ID;
return $konekcija->query($query);
