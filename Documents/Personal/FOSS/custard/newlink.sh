#!/bin/bash

RandomNumber=$RANDOM

#Embedded HTML

echo -e "<html>\n\n<!--\nCustard: (Cust)omer (Ard)ency\nv0.01\n-->\n\n\t<title>\n\t\tCustard\n\t</title>\n\n\t<head>\n\t\t<link rel=\"stylesheet\" type=\"text/css\" href=\"../report.css\">\n\t</head>\n\n\t<body>\n\n\t\t<!-- Top Menu -->\n\t\t<ul>\n\t\t\t<li>&nbsp&nbsp&nbsp<img src=\"../img/custard.png\" width=40px height=40px>&nbsp&nbsp&nbsp</li>\n\t\t</ul>\n\n\t\t<div align=center>\n\t\t\t\t<br />\n\t\t\t\t<br />\n\t\t\t\t<br />\n\t\t\t\t<br />\n\t\t\t\tPlease select how satisfied you were with the service:\n\t\t\t\t<br />\n\t\t\t\t<br />\n\t\t\t\t<br />\n\t\t\t\t<a href=\"${RandomNumber}.php?review=2\"><img src=\"http://images.clipartpanda.com/smiley-face-png-96527038_o.png\" width=150px height=150px></a>\n\t\t\t\t<a href=\"${RandomNumber}.php?review=1\"><img src=\"http://www.clker.com/cliparts/I/X/g/L/q/2/yellow-neutral-face-hi.png\" width=150px height=150px></a>\n\t\t\t\t<a href=\"${RandomNumber}.php?review=0\"><img src=\"http://images.clipartpanda.com/red-smiley-face-png-MiLkkBAia.png\" width=150px height=150px></a>\n\t\t\t</div>\n\n\t</body>\n</html>" >> /var/www/html/custard/links/${RandomNumber}.html

echo -e "<?php\n\t\$host = 'localhost';\n\t\$database = 'custard';\n\t\$username = 'custard_admin';\n\t\$password = 'apache';\n\t\$Review = \$_GET['review'];\n\n\ttry {\n\t\t\$DBH = new PDO(\"mysql:host=\$host;dbname=\$database\", \$username, \$password);\n\t}\n\n\tcatch(PDOException \$e) {\n\t\techo \$e->getMessage();\n\t}\n\n\t\$sql = \$DBH->prepare('SELECT link FROM links WHERE link = ${RandomNumber}');\n\t\t\$sql->execute();\n\t\t\$result = \$sql->fetch();\n\t\tif (strpos(\$result,${RandomNumber}) !== false) {\n\t\t\t\$sql = \$DBH->prepare(\"INSERT INTO csat VALUES (\$Review)\");\n\t\t\t\$sql->execute();\n\t\t\t\$sql = \$DBH->prepare('DELETE FROM links WHERE link = ${RandomNumber}');\n\t\t\t\$sql->execute();\n\t\t\techo \"Your review has been submitted.\";\n\t\t} else {\n\t\t\techo \"A review for this ticket has already been submitted.\";\n\t\t}\n?>" >> /var/www/html/custard/links/${RandomNumber}.php

mysql -u root -p@P@ch312e098 -D custard -e "INSERT INTO links VALUES (${RandomNumber});"
