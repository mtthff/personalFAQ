<style>
    #newanswer{
        border: 1px solid black;
}
</style>

<?php
    require_once 'connect.php';
    $sql_query = "SELECT title FROM section WHERE section_id = ".$_GET['section_id'];
    $result = mysql_query($sql_query);
    $content = mysql_fetch_assoc($result);
?>
<fieldset>
    <legend>Bitte die neue Frage in der Sektion <b><?=$content['title']?></b> eingeben.</legend>

<div>
    <label for="newquestion">Frage</label>
    <input id="newquestion" class="question" name="newquestion" type="type" />
</div>
<div>
    <label for="newanswer">Antwort</label>
    <textarea id="newanswer" class="answer" name="newanswer" row="3" cols="60"></textarea>
</div>

<!--
Frage: <input id="newquestion" type="text" class="question" /><br />
Antwort:<br /><textarea id="newanswer" rows=3 cols=60 class="answer"></textarea>
-->

<button id="save">speichern</button>
<button id="cancel">Cancel</button>
</fieldset>

<script type="text/javascript">
    $(document).ready(function() {
        $('#save').click(function(){
            var question = $('#newquestion').val();
            var answer = $('#newanswer').val();
            var section_id = <?=$_GET['section_id'] ?>;
            $.post('ajax/savecontent.php', {section_id:  section_id, q: question, a:  answer}, function(data){
//                alert(data);
                location.reload();
            });
        });

        $('#cancel').click(function(){
            $('#output').hide();
            $('#overlay').hide();
        })
    });
</script>
