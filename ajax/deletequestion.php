<?php
echo "<pre>";
print_r($_GET);
echo "</pre>";
exit;
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

    $query = "DELETE FROM questions
                WHERE section_id = '".$_GET['id']."'";
echo $query."<br />";
//        $send = mysql_query($query, $link);

   
?>
<script type="text/javascript">
    $(document).ready(function() {
        location.reload();
    });
</script>
