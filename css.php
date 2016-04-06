<?php

require "mysql.php";
session_start();

if(isset($_SESSION['SESS_MEMBER_ID'])) {
	//Theme
	require 'auth.php';
	require 'rights.php';
	
	$sql = $DBH->prepare("SELECT parameter FROM settings WHERE setting='theme' AND user='$LoggedInUserName'");
	$sql->execute();
	$themeResult = $sql->fetch();
	$theme = "${themeResult[parameter]}";
	if ("$theme" == "default") {
		$sql = $DBH->prepare("SELECT parameter FROM settings WHERE setting='theme' AND user='global'");
		$sql->execute();
		$themeResult = $sql->fetch();
		$theme = "${themeResult[parameter]}";
	} 
	echo "/* User: $LoggedInUserName*/ ";
	echo "/* Theme: $theme */ ";
	
	// Require the default theme //
	require "theme/light.php";
	//Any missing elements from the custom theme will be taken from the default theme //
	require "theme/${theme}.php";
	
	$ThemeArr = file("theme/$theme.theme");
	foreach ($ThemeArr as $ThemeVar) {
		preg_match("/^(.*)=/", $ThemeVar, $output_array);
		$ThemeVarSetting = "${output_array[1]}";
		preg_match("/=(.*)$/", $ThemeVar, $output_array);
		$ThemeVarParam = "${output_array[1]}";
		echo "${ThemeVarSetting}: ${ThemeVarParam}";
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
		color: $PageTextColor;
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
			color: $MenuTextColor;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}
	
		#topmenu li a:hover {
			background-color: $MenuHoverColor;
			color: black;
		}
	
	/* Settings Menu */
		#settingsmenu {
			list-style: none;
			background-color: $SettingsMenuColor;
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
			color: $MenuTextColor;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}
		
		#settingsmenu li a:hover {
			background-color: $MenuHoverColor;
			/* color: black; */
		}
		
		/* admin & user settings */
			#settingsmenu_admin {
				list-style: none;
				background-color: $SecondSettingsMenuColor;
				margin: 0;
				padding: 0;
				overflow: hidden;
				position: fixed;
				top: 88px;
				width: 100%;
			}
		
			#settingsmenu_admin li {
				float: left;
			}
			
			#settingsmenu_admin li a {
				display: block;
				color: $MenuTextColor;
				text-align: center;
				padding: 14px 16px;
				text-decoration: none;
			}
			
			#settingsmenu_admin li a:hover {
				background-color: $MenuHoverColor;
				/* color: black; */
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

	/* Search page */
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
			background-color: $ReviewsPageTableRowColor;
		}
	
		.rowtype0 {
			background-color: $PageBackgroundColor;
		}
		
		.rowtype1 {
			background-color: $ReviewsPageTableRowColor;
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
			background-color: $TextboxBackgroundColor;
		}
		
		.scoresearch {
			width: 50px;
		}
		
		.searchdatetime {
			background-color: $TextboxBackgroundColor;
		}
		
		#search {
			border: 1px solid $SearchButtonBackground;
			background-color: $SearchButtonBackground;
			margin-top: 8px;
			height: 25px;
			font-size: 1em;
			width: 25%;
		}
		
		#export_container {
			width: 100%;
			margin-top: 5px;
			margin-bottom: 5px;
		}
	
		.exporttocsv {
			background-color: $SearchButtonBackground;
			margin: auto;
			width: 25%;
			display: inline-block;
			color: black;
			text-decoration: none;
		}
		
		.exporttocsv a {
			background-color: $SearchButtonBackground;
			color: black;
			padding: 0px 0px;
			text-align: center; 
			text-decoration: none;
			display: inline-block;
			margin: 5px;
			font-size: 1em;
			font-weight: normal;
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
	
	/* User managment */
		/* Add Users / List & Delete User */
			#user_container {
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
	
			#user {
				width: 100%;
				float: left;
				display: inline-block;
				text-align: center;
			}
	
			.usertext {
				float: left;
				text-align: right;
				width: 50%;
			}
			
			.usertable {
				margin: 0 auto;
				border-top: 1px solid gray;
				border-bottom: 1px solid gray;
			}
			
			.usertable td {
				border-top: 1px solid gray;
				padding: 2px;
			}
			
			/* .usertable td {
				text-align: center;
			} */
			
			.userrow0 {
				backgroundcolor: $ReviewsPageTableRowColor;
			}
			
			.userrow1 {
				backgroundcolor: $WidgetBackgroundColor;
			}
			
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
			}
	
	/* Integration */	
		#integration_container {	
				width: 400px;
				height: 250px;
				margin: 0 auto;
				border: 1px black solid;
				display: table-cell;
				border-radius: 25px;
				background-color: $WidgetBackgroundColor;
				text-align: center;
				vertical-align: middle;
			}
	
			#integration {
				width: 100%;
				float: left;
				display: inline-block;
				text-align: center;
			}
	
			.integrationtext {
				float: left;
				text-align: right;
				width: 50%;
			}
	";
} else {
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
}
?>
