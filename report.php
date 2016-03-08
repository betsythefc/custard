<?php

//Theme
require "php/mysqlconnect.php";
$sql = $DBH->prepare('SELECT parameter FROM settings WHERE setting="theme"');
$sql->execute();
$themeResult = $sql->fetch();
$theme = "${themeResult[parameter]}";

if (strpos($theme, 'light') !== false) {
	$PageBackgroundColor = "#eee";
	$WidgetBackgroundColor = "#f2f2f2";
} elseif (strpos($theme, 'dark') !== false) {
	$PageBackgroundColor = "#383838";
	$WidgetBackgroundColor = "#4b4b4b";
}

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

/* Begin CSS */

/* Top Menu */
	#topmenu {
		list-style: none;
		background-color: #333;
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
		background-color: #e2b816;
		color: black;
	}

/* Settings Menu */
	#settingsmenu {
		list-style: none;
		background-color: #555;
		margin: 0;
		padding: 0;
		overflow: hidden;
		position: fixed;
		top: 44px;
		width: 100%;
	}

	#settingsmenu li {
		float: left;
	}
	
	#settingsmenu li a {
		display: block;
		color: white;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
	}
	
	#settingsmenu li a:hover {
		background-color: #e2b816;
		color: black;
	}

#widgets {
	margin: auto;
	margin-top: 75px;
}

#widgetcontainer {
	width: 50%;
	float: left;
	display: inline-block;
	text-align: center;
}

#widget {
	width: 75%;
	height: 60%;
	margin: 0 auto;
	border: 1px black solid;
	display: inline-block;
	border-radius: 25px;
	background-color: $WidgetBackgroundColor;
	text-align: center;
}

#widgettitle {
	margin-top: 5px;
	font-size: 4.5vmin;
}

#widgettext {
	font-size: 21vw;
	height: 100%;
	display: inline-block;
	vertical-align: middle;
	position: relative;
	top: 25%;
}

#reviewscontainer {
	width: 80%;
	float: left;
	display: inline-block;
	text-align: center;
	margin: auto;
	border: 1px black solid;
	display: inline-block;
	border-radius: 25px;
	background-color: #f2f2f2;
}

.license {
	line-height: 1.3;
}

#reviews {
	border-top: 1px solid gray;
	border-bottom: 1px solid gray;
	margin: auto;
	text-align: center;
	width: 90%;
}

#reviews th {
	border-top: 1px solid gray;
	margin: auto;
	text-align: center;
	font-weight: bold;
	background-color: #e3e2e2;
}

#reviews table tr:nth-child(odd) td{
	background-color: #e3e2e2;
}

.searchoptions {
	border: 1px solid gray;
}

.scorecolumn {
	border-top: 1px solid gray;
	margin: auto;
	text-align: center;
	width: 10%;
	font-size: 1.5vw;
	height: 2vw;
}

.datecolumn {
	border-top: 1px solid gray;
	margin: auto;
	text-align: center;
	width: 20%;
	font-size: 1.5vw;
}


.idcolumn {
	border-top: 1px solid gray;
	margin: auto;
	text-align: center;
	width: 10%;
	font-size: 1.5vw;
}

.reviewsearchtd {
	border-top: 1px solid gray;
}

.reviewsearch {
	text-align: center;
}

.scoresearch {
	width: 50px;
}

.loginform {
	width: 400px;
	height: 200px;
	margin: 0 auto;
	border: 1px black solid;
	display: table-cell;
	border-radius: 25px;
	background-color: #f2f2f2;
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

/* User managment */
	/* Add User */
		#adduser_container {
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

		#adduser {
			width: 100%;
			float: left;
			display: inline-block;
			text-align: center;
		}

		.addusertext {
			float: left;
			text-align: right;
			width: 50%;
		}
		
	/* User list */
		
/* General Settings */
	/* Theme */
		#theme_container {
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

		#theme {
			width: 100%;
			float: left;
			display: inline-block;
			text-align: center;
		}

		.themetext {
			float: left;
			text-align: right;
			width: 50%;
		}";
		

?>
