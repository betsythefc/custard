#!/bin/bash

RandomNumber=$RANDOM

#Embedded HTML

echo -e "<a href=\"${RandomNumber}.php?review=2\"><img src=\"http://images.clipartpanda.com/smiley-face-png-96527038_o.png\" width=150px height=150px></a>\n<a href=\"${RandomNumber}.php?review=1\"><img src=\"http://www.clker.com/cliparts/I/X/g/L/q/2/yellow-neutral-face-hi.png\" width=150px height=150px></a>\n<a href=\"${RandomNumber}.php?review=0\"><img src=\"http://images.clipartpanda.com/red-smiley-face-png-MiLkkBAia.png\" width=150px height=150px></a>"

echo -e "<?php\n\t\$host = 'localhost';\n\t\$database = 'custard';\n\t\$username = 'custard_admin';\n\t\$password = 'apache';\n\t\$Review = \$_GET['review'];\n\n\ttry {\n\t\t\$DBH = new PDO(\"mysql:host=\$host;dbname=\$database\", \$username, \$password);\n\t}\n\n\tcatch(PDOException \$e) {\n\t\techo \$e->getMessage();\n\t}\n\n\t\$sql = \$DBH->prepare('SELECT link FROM links WHERE link = ${RandomNumber}');\n\t\t\$sql->execute();\n\t\t\$result = \$sql->fetch();\n\t\tif (strpos(\$result,${RandomNumber}) !== false) {\n\t\t\t\$sql = \$DBH->prepare(\"INSERT INTO csat VALUES (\$Review)\");\n\t\t\t\$sql->execute();\n\t\t\t\$sql = \$DBH->prepare('DELETE FROM links WHERE link = ${RandomNumber}');\n\t\t\t\$sql->execute();\n\t\t\techo \"Your review has been submitted.\";\n\t\t} else {\n\t\t\techo \"A review for this ticket has already been submitted.\";\n\t\t}\n?>" >> ../links/${RandomNumber}.php

mysql -u root -p@P@ch312e098 -D custard -e "INSERT INTO links VALUES (${RandomNumber});"
