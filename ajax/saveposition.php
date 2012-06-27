<?php
//print_r($_GET);
//exit;

require_once 'connect.php';

foreach ($_GET['position'] as $position => $section_id) :
    $query = 'UPDATE section SET position = '.($position + 1).' WHERE section_id = '.$section_id;
//echo $query."\n";
    $send = mysql_query($query, $link);

endforeach;
?>