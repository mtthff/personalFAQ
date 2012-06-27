<?php
//print_r($_POST);
//exit;

//Array
//(
//    [val] => Wie ist die Frage?
//    [id] => 1
//    [art] => question
//oder [art] => answer
//)
    require_once 'connect.php';

    if (empty ($_POST[val]) AND 'question' == $_POST['art']){
        $_POST['art'] = "delete";
    }

    $value = mysql_escape_string(htmlspecialchars(($_POST['val'])));

    switch ($_POST['art']) {
        case 'question':
            $query = "UPDATE questions
                        SET question  = '".$value."'
                        WHERE question_id = '".$_POST['id']."'";
            break;
        case 'answer':
            $query = "UPDATE questions
                        SET answer = '".$value."'
                        WHERE question_id = '".$_POST['id']."'";
            break;
        case 'delete':
            $query = "DELETE FROM questions WHERE question_id = '".$_POST['id']."'";
            break;
        default:
        break;
}
//echo $query;
        $send = mysql_query($query, $link);

?>