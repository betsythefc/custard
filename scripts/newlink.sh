#!/bin/bash

RandomNumber=$RANDOM

#Set up folder

mkdir ../links

#Embedded HTML

echo -e "<a href=\"review.php?review=2\"><img src=\"http://images.clipartpanda.com/smiley-face-png-96527038_o.png\" width=150px height=150px></a>\n<a href=\"review.php?review=1\"><img src=\"http://www.clker.com/cliparts/I/X/g/L/q/2/yellow-neutral-face-hi.png\" width=150px height=150px></a>\n<a href=\"review.php?review=0\"><img src=\"http://images.clipartpanda.com/red-smiley-face-png-MiLkkBAia.png\" width=150px height=150px></a>" >> ../links/${RandomNumber}.html

mysql -u root -p@P@ch312e098 -D custard -e "INSERT INTO links VALUES (review);"
