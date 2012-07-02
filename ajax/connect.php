<?php
/* 
 * Verbindung zur Datenbank
 */
	require_once 'config/config.inc.php';

    $link = mysql_connect(HOSTNAME, USERNAME, PASSWORD);
    mysql_select_db (DATABASE, $link);
    
?>
