$(document).ready(function(){

    $('#output').hide();
    $('#overlay').hide();
//    $('.answer').parent().hide();

    $(window).scroll(function(){
        $('#navi')
            .stop()
            .animate({'top': $(document).scrollTop()}, 'slow');
            //.css('top', $(document).scrollTop());
    })

    $('.question, .answer, textarea').bind({
        focus: function(){
            $(this).css({
                border: '1px solid blue'
            }).select();//.after('<img src="delete.png" id="delete_question" />');
        },
        blur: function(){
            if ($(this).attr('class') == 'question'){
                $(this).css({
                    'border': '0 none',
                    'border-bottom': '1px solid black'
                });
            }else{
                $(this).css({
                    border: '0 none'
                });
            };
        },
        change: function(){
            var val = $(this).val();
            var id = $(this).attr('name');
            var art = $(this).attr('class');
            $.post('ajax/changecontent.php', {val: val, id: id, art: art}, function(data){
//                alert(data);
                location.reload();
            });
        }
    });

    $('textarea').elastic();

    $('.add').click(function(){
        var id = $(this).attr('title');
        $('#overlay').show();
        $('#output')
            .show()
            .css('top', $(document).scrollTop()+ 100)
            .load('ajax/addcontent.php', 'section_id=' + id);
    })

    $('#onlyQuestions').change(function(){
        if(!$(this).hasClass("checked")){
            $('.answer').parent().hide();
            $(this).addClass("checked");
            $.post('ajax/changenavi.php', {onlyquestions: 1}, function(data){
                alert(data);
            })
        }else{
            $('.answer').parent().show();
            $(this).removeClass('checked');
            $.post('ajax/changenavi.php', {onlyquestions: 0}, function(data){
                alert(data);
            })
        }
    });

    $('#edit').change(function(){
        if(!$(this).hasClass("checked")){
            $('.question, .answer').attr('disabled', 'disabled');
            $(this).addClass("checked");
            $.post('ajax/changenavi.php', {edit: 1}, function(data){
                alert(data);
            })
        }else{
            $('.question, .answer').removeAttr('disabled');
            $(this).removeClass('checked');
            $.post('ajax/changenavi.php', {edit: 0}, function(data){
                alert(data);
            })
        }
    });

    $('.section').click(function(){
        $('.section').css('color', 'black');
        $(this).css('color', 'darksalmon');
        var id = $(this).attr('name');
        $('#output').show().load('ajax/addsection.php', 'section_id=' + id);
     });

     $('#newmainsection').click(function(){
         $('#output').show().load('ajax/newmainsection.php');
     });


    $('.sortable').sortable({
        handle : '.handle',
        placeholder : 'ui-state-highlight',
        update : function(){
            var order = $(this).sortable('serialize');
            $.get('ajax/saveposition.php', order, function(){
//                alert(data);
                location.reload();//nach Ajaxdurchf�hrung: reload
            });
        }
    });

});
