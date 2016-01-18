#!/bin/bash

RandomNumber=$RANDOM

#Set up folder

mkdir ../links

#Embedded HTML

echo -e "<a href=\"${RandomNumber}.php?review=2\"><img src=\"http://images.clipartpanda.com/smiley-face-png-96527038_o.png\" width=150px height=150px></a>\n<a href=\"${RandomNumber}.php?review=1\"><img src=\"http://www.clker.com/cliparts/I/X/g/L/q/2/yellow-neutral-face-hi.png\" width=150px height=150px></a>\n<a href=\"${RandomNumber}.php?review=0\"><img src=\"http://images.clipartpanda.com/red-smiley-face-png-MiLkkBAia.png\" width=150px height=150px></a>" >> ../links/${RandomNumber}.html

echo -e "<html>
\t<title>
\t\tCustard
\t</title>

\t<head>
\t\t<link rel="stylesheet" type="text/css" href="report.css">
\t</head>

\t<body>
\t\t<ul>
\t\t\t<li>&nbsp&nbsp&nbsp<img src="..img/custard.png" width=40px height=40px>&nbsp&nbsp&nbsp</li>
\t\t\t<li><a href="index.php">Home</a></li>
\t\t\t<li><a href="newlink.php">New Link</a></li>
\t\t\t<li><a href="about.html">About</a></li>
\t\t</ul>

\t\t<div align=center>

\t\t\t<?php\n\t\$host = 'localhost';
\t\t\t\t\$database = 'custard';
\t\t\t\t\$username = 'custard_admin';
\t\t\t\t\$password = 'apache';
\t\t\t\t\$Review = \$_GET['review'];

\t\t\t\ttry {
\t\t\t\t\t\$DBH = new PDO(\"mysql:host=\$host;dbname=\$database\", \$username, \$password);
\t\t\t\t}

\t\t\t\tcatch(PDOException \$e) {
\t\t\t\t\techo \$e->getMessage();
\t\t\t\t}

\t\t\t\t\$sql = \$DBH->prepare('SELECT link FROM links WHERE link = ${RandomNumber}');
\t\t\t\t\$sql->execute();
\t\t\t\t\$result = \$sql->fetch();

\t\t\t\tif (strpos(\$result,${RandomNumber}) !== false) {
\t\t\t\t\tif ($Review !== 0 && $Review !== 1 && $Review !== 2) {
\t\t\t\t\t\t\$sql = \$DBH->prepare(\"INSERT INTO csat VALUES (\$Review)\");
\t\t\t\t\t\t\$sql->execute();
\t\t\t\t\t\t\$sql = \$DBH->prepare('DELETE FROM links WHERE link = ${RandomNumber}');
\t\t\t\t\t\techo \"Your review has been submitted.\";
\t\t\t\t\t\}
\t\t\t\t} else {
\t\t\t\t\techo \"A review for this ticket has already been submitted.\";
\t\t\t\t}
\t\t\t?>

\t\t</div>
\t</body>
</html>" >> ../links/${RandomNumber}.php

mysql -u root -p@P@ch312e098 -D custard -e "INSERT INTO links VALUES (${RandomNumber});"
