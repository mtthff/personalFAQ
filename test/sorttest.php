<?php
session_start();
if (!isset($_SESSION['positionen'])){
    $_SESSION['positionen'] = array(
                                array('value' => 'item 0', 'color' => 'yellow'),
                                array('value' => 'item 1', 'color' => 'red'),
                                array('value' => 'item 2', 'color' => 'blue'),
                                array('value' => 'item 3', 'color' => 'green'),
                                array('value' => 'item 4', 'color' => 'gray')
                            );
//    echo "<pre>";
//    print_r($_SESSION);
//    echo "</pre>";
}
/*
 * [0] => Array
        (
            [value] => item 0
        )

 */
//echo "<pre>";
//print_r($_SESSION['positionen']);
//session_destroy();
//exit;
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.4/jquery-ui.min.js" type="text/javascript"></script>

     <style type="text/css">
	#sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
	#sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
	#sortable li span { position: absolute; margin-left: -1.3em; }
        .ui-state-highlight { height: 1.5em; line-height: 1.2em; background-color: lightcyan; }

    </style>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#sortable").sortable({
                handle : '.handle',
                placeholder: 'ui-state-highlight',
                update : function () {
                    var order = $(this).sortable('serialize', {'attribute': 'ref'});//nicht 'id'(default)  sondern 'ref' als Positionsanzeiger
                    $.get('save.php?' + order, function(data){
//                        alert(data);
                        location.reload();//nach Ajaxdurchf�hrung: reload
                    });
                }
            });

            $('#reset').click(function(){
                $.get('reset.php', function(){
                    location.reload();
                });
            });


        });
    </script>
</head>

<body>

<ul id="sortable">
    <?php
    $arrow ='<img src="sortable_hoch.png" alt="move" width="7" height="11" class="handle" />&nbsp;';
        foreach($_SESSION['positionen'] as $key => $value){
            $color = ' style="background-color:'.$value['color'].'"';
            echo '<li ref="position_'.$key.'"'.$color.'>'.$arrow.$value['value'].'</li>';
        }
    ?>
</ul>
    <button id="reset">Reset</button>


</body>
</html>