<?php
//print_r($_POST);
//exit;

//Array
//(
//    [onlyQuestions] => 1
//)
    require_once 'connect.php';

    foreach ($_POST as $key => $value) {
        $query = "UPDATE navigation
                    SET ".$key."  = '".(int)$value."'
                    WHERE id = 1";
    }
echo $query;
//    $send = mysql_query($query, $link);

?>