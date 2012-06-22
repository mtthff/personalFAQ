<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>personalFAQ</title>
        <link rel="stylesheet" type="text/css" href="index.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.4/jquery-ui.min.js" type="text/javascript"></script>
        <script src="index.js" type="text/javascript"></script>
        <script src="plugins/jquery.elastic.js"></script>
    </head>

    <body>
        <div id="navi">
            <div>nur Fragen <input type="checkbox" id="onlyQuestions" /></div>
            <div>Editiermodus <input type="checkbox" id="edit" checked /></div>
            <div id="newmainsection">neue Hauptkathegorie einfügen</div>
        </div>
        <div id="content">
        <?php
            require_once 'setfaq.class.php';
            $faq = new setfaq();
            echo $faq->getSections(0);
        ?>
        </div>
        <div id="output"></div>
        <div id="overlay"></div>
    </body>
</html>
