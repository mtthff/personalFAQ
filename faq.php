<?php
    require_once 'setfaq.class.php';
    $faq = new setfaq();
$faq->getSections();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
  <title>FAQ</title>
  <basefont face="Tahoma" size="2" />
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <style>
    body, td {
      font-family: Tahoma;
      font-size: 10pt;
    }
  </style>
</head>
<body>

FAQ
<ul>
	<li>jQuery</li>
	<ul>
		<li><a href="#1">jQuery einbinden</a></li>
		<li><a href="#2">Zwei oder mehr Selektoren auswählen</a></li>
		<li><a href="#3">Ajax-Anfrage mit Variablenübergabe</a></li>
	</ul>
	<li>PHP</li>
	<ul>
		<li>dummy</li>
	</ul>
</ul>
<hr />
<div>
	<a name="1"><strong>jQuery einbinden</strong></a>
</div>
<blockquote>
	<div>&lt;script language=&quot;javascript&quot; src=&quot;http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js&quot;&gt;&lt;/script&gt;</div>
</blockquote>


<div><a name="2"><strong>Zwei oder mehr Selektoren auswählen</strong></a></div>
<blockquote>
<div>$('div, li'). ....</div>
</blockquote>
<div><a name="3"><strong>Ajax-Anfrage mit Variablenübergabe</strong></a></div>
<blockquote>
<div>$('#ausgabe').show().load(&quot;test.php&quot;, 'id= 1&amp;quatsch=fgh&amp;heide=Peter' );</div>
</blockquote>

<!-- content end -->

</body>
</html>
 