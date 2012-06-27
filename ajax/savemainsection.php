<?php
//echo "<pre>";
//print_r($_GET);
//echo "</pre>";
//exit;

/*
Array
(
    [ms] => ::TODO::
)
 */

    require_once 'connect.php';

    if ($_GET['ms']){
        $query = "INSERT INTO section
                    VALUES ('', '".$_GET['ms']."', 0, 1)";
//echo $query."<br />";
        $send = mysql_query($query, $link);
    }else{
        echo "Eingabefehler!";
    }
    
?>
<script type="text/javascript">
    $(document).ready(function() {
        location.reload();
    });
</script>
