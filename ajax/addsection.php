<style>
    #deletesection{
        text-decoration: underline;
        cursor: pointer;
    }
</style>

<?php
    require_once 'connect.php';
    $sql_query = "SELECT title FROM section WHERE section_id = ".$_GET['section_id'];
    $result = mysql_query($sql_query);
    $content = mysql_fetch_assoc($result);

?>

Neue Untersektion eingeben:
<input id="newsection" type="text" class="question"/>
<br /><br />
Sektion <input id="editsection" type="text" class="question" value="<?=$content['title']?>" /> editieren 
oder <span id="deletesection">l&ouml;schen.</span><br /><br />
<button id="save">speichern</button>
<button id="cancel">Cancel</button>


<script type="text/javascript">
    $(document).ready(function() {
        $('#deletesection').click(function(){
            var section_id = <?=$_GET['section_id'] ?>;
            $('#output').load('ajax/savesection.php', 'section_id=' + section_id + '&delete=do');
        })

        $('#save').click(function(){
            var newsection = $('#newsection').val();
            var editsection = $('#editsection').val();
            var section_id = <?=$_GET['section_id'] ?>;
            $('#output').load('ajax/savesection.php', 'section_id=' + section_id + '&ns=' + newsection + '&es=' + editsection);
        });
        
        $('#cancel').click(function(){
            $('#output').hide();
            $('#overlay').hide();
        })
    });
</script>
