#!/bin/bash

RandomNumber=$RANDOM

#Embedded HTML

echo -e "<a href=\"${RandomNumber}.php?review=2\"><img src=\"http://images.clipartpanda.com/smiley-face-png-96527038_o.png\" width=150px height=150px></a>\n<a href=\"${RandomNumber}.php?review=1\"><img src=\"http://www.clker.com/cliparts/I/X/g/L/q/2/yellow-neutral-face-hi.png\" width=150px height=150px></a>\n<a href=\"${RandomNumber}.php?review=0\"><img src=\"http://images.clipartpanda.com/red-smiley-face-png-MiLkkBAia.png\" width=150px height=150px></a>" >> ../links/${RandomNumber}.html

echo "<?php\n\t\$host = 'localhost';
\$database = 'custard';
\$username = 'custard_admin';
\$password = 'apache';
\$Review = \$_GET['review'];
try {
\$DBH = new PDO(\"mysql:host=\$host;dbname=\$database\", \$username, \$password);
}
catch(PDOException \$e) {
echo \$e->getMessage();
}
\$sql = \$DBH->prepare('SELECT link FROM links WHERE link = ${RandomNumber}');
\$sql->execute();
\$result = \$sql->fetch();
if (strpos(\$result,${RandomNumber}) !== false) {
\$sql = \$DBH->prepare(\"INSERT INTO csat VALUES (\$Review)\");
\$sql->execute();
\$sql = \$DBH->prepare('DELETE FROM links WHERE link = ${RandomNumber}');
echo \"Your review has been submitted.\";
} else {
echo \"A review for this ticket has already been submitted.\";
?>" >> ../links/${RandomNumber}.php

mysql -u root -p@P@ch312e098 -D custard -e "INSERT INTO links VALUES (${RandomNumber});"
