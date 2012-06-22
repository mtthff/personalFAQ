<?php
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
//exit;

//Array
//(
//    [q] => frage
//    [a] => antwort
//)

    require_once 'connect.php';

    $question = mysql_escape_string(htmlspecialchars(($_POST['q'])));
    
    $answer = mysql_escape_string(htmlspecialchars(($_POST['a'])));
    

    $query = "INSERT INTO questions
                VALUES ('', '".$question."', '".$answer."', '".(int)$_POST['section_id']."')";
//echo $query;
    $send = mysql_query($query, $link);
    
?>