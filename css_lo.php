<?php
require "php/mysqlconnect.php";

$sql = $DBH->prepare("SELECT parameter FROM settings WHERE setting='theme' AND user='global'");
$sql->execute();
$themeResult = $sql->fetch();
$theme = "${themeResult[parameter]}";

require "theme/${theme}.php";

echo "/* CSS style reset */

html, body, div, span, applet, object, iframe,
h1, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline;
}

/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure, 
footer, header, hgroup, menu, nav, section {
	display: block;
}
body {
	line-height: 1;
	background-color: $PageBackgroundColor;
	color: $TextColor;
}
ol, ul {
	list-style: none;
}
blockquote, q {
	quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
	content: '';
	content: none;
}

table {
	border-collapse: collapse;
	border-spacing: 0;
}

/* Login */
	.loginform {
		width: 400px;
		height: 200px;
		margin: 0 auto;
		border: 1px black solid;
		display: table-cell;
		border-radius: 25px;
		background-color: $WidgetBackgroundColor;
		text-align: center;
		vertical-align: middle;
	}
	
	.loginform_container {
		width: 100%;
		float: left;
		display: inline-block;
		text-align: center;
	}
	
	.loginform_username {
		width: 66%;
		float: left;
		margin-top: 5px;
	}
	
	.loginform_password {
		width: 66%;
		float: left;
		margin-top: 5px;
	}
	
	.loginform_text {
		text-align: right;
		float: left;
		width: 33%;
		margin-top: 5px;
	}
	
	.input {
		width: 200px;
	}
	
	#loginform_submit {
		margin-top: 10px;
	}
	
/* Top Menu */
	#topmenu {
		list-style: none;
		background-color: $TopMenuColor;
		margin: 0;
		padding: 0;
		overflow: hidden;
		position: fixed;
		top: 0;
		width: 100%;
	}
	
	#topmenu li {
		float: left;
	}
	
	#topmenu li a {
		display: block;
		color: white;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
	}
	
	#topmenu li a:hover {
		background-color: $MenuHoverColor;
		color: black;
	}";
?>
	
