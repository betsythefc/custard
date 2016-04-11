<?php

echo "	/* Login */
		.loginform {
			width: 400px;
			height: 200px;
			margin: 0 auto;
			border: 1px black solid;
			display: table-cell;
			border-radius: 25px;
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
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}
		
		#topmenu li a:hover {
			color: black;
		}
		
/* Begin CSS */
	
	/* Settings Menu */
		#settingsmenu {
			list-style: none;
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
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}
		
		/* admin & user settings */
			#settingsmenu_admin {
				list-style: none;
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
				text-align: center;
				padding: 14px 16px;
				text-decoration: none;
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
		
		#search {
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
			margin: auto;
			width: 25%;
			display: inline-block;
			color: black;
			text-decoration: none;
		}
		
		.exporttocsv a {
			color: black;
			padding: 0px 0px;
			text-align: center; 
			text-decoration: none;
			display: inline-block;
			margin: 5px;
			font-size: 1em;
			font-weight: normal;
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
			
	/* General Settings */
		/* Theme */
			#theme_container {
				width: 400px;
				height: 200px;
				margin: 0 auto;
				border: 1px black solid;
				display: table-cell;
				border-radius: 25px;
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
			}";
?>