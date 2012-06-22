Neue Hauptkategorie eingeben:
<input id="mainsection" type="text" class="question"/>
<br /><br />
<button id="save">speichern</button>
<button id="cancel">Cancel</button>


<script type="text/javascript">
    $(document).ready(function() {

        $('#save').click(function(){
            var mainsection = $('#mainsection').val();
            $('#output').load('ajax/savemainsection.php', 'ms=' + mainsection);
        });


        $('#cancel').click(function(){
            $('#output').hide();
        })
    });
</script>
