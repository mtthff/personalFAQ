<?php
//echo "<pre>";
//print_r($_GET);
//echo "</pre>";
//exit;
/*
Array
(
    [section_id] => 2
    [ns] => shdfsadh
    [es] => jQueryd
)
Array
(
    [section_id] => 1
    [delete] => do
)

 */

    require_once 'connect.php';

    if($_GET['delete'] == 'do'){
        $query = "DELETE FROM section
                    WHERE section_id = '".$_GET['section_id']."'";
//echo $query."<br />";
        $send = mysql_query($query, $link);
    }else{
        if ($_GET['ns']){
            $query = "INSERT INTO section
                        VALUES ('', '".$_GET['ns']."', '".$_GET['section_id']."', 0)";//::TODO:: letzte position auslesen, incr und einfügen
//echo $query."<br />";
            $send = mysql_query($query, $link);
            }

        $sql_query = "SELECT title FROM section WHERE section_id = ".$_GET['section_id'];
        $result = mysql_query($sql_query);
        $content = mysql_fetch_assoc($result);

        if($_GET['es'] != $content['title']){
            $query = "UPDATE section
                        SET title = '".$_GET['es']."'
                        WHERE section_id = '".$_GET['section_id']."'";
//echo $query;
            $send = mysql_query($query, $link);
        }
    }
    
?>
<script type="text/javascript">
    $(document).ready(function() {
        location.reload();
    });
</script>
