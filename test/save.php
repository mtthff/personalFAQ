<?php
//echo "<pre>";
//print_r($_GET);
//exit;

/*
foreach ($_GET['listItem'] as $position => $item) :
  $sql[] = "UPDATE `table` SET `position` = $position WHERE `id` = $item";
endforeach;

 */
    session_start();

    foreach ($_GET['position'] as $position => $item){
        $temp[$position] = array('value' =>$_SESSION['positionen'][$item]['value'],
                                'color' =>$_SESSION['positionen'][$item]['color']);
    }

    $_SESSION['positionen'] = $temp;
?>