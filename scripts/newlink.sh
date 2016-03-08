#!/bin/bash

RandomNumber=$RANDOM
Table=(`mysql -u custard_admin -papache -D custard -e "SELECT id FROM csat;"`)
IP=`ip addr | grep "inet " | grep -v "127.0.0.1" | grep -oh '[0-9]*\.[0-9]*\.[0-9]*\.[0-9]*' | grep -v 255`
Domain="http://$IP/custard"

while [[ " ${Table[@]} " =~ " $RandomNumber " ]] ; do
	RandomNumber=$RANDOM
done

#Set up folder

mkdir ../links

#Embedded HTML
echo -e "<a href=\"$Domain/add.php?review=2&ticket=${RandomNumber}\"><div style=\"width: 100px; height: 100px; border-radius: 10px; background-color: green; float: left; margin: 5px; font-size: 4em; line-height: 90px; text-align: center; font-weight: bold; color: black;\">:)</div></a><a href=\"$Domain/add.php?review=1&ticket=${RandomNumber}\"><div style=\"width: 100px; height: 100px; border-radius: 10px; background-color: #ffa500; float: left; margin: 5px; font-size: 4em; line-height: 90px; text-align: center; font-weight: bold; color: black;\">:|</div></a><a href=\"$Domain/add.php?review=0&ticket=${RandomNumber}\"><div style=\"width: 100px; height: 100px; border-radius: 10px; background-color: #c70000; float: left; margin: 5px; font-size: 4em; line-height: 90px; text-align: center; font-weight: bold; color: black;\">:(</div></a>" >> ../links/${RandomNumber}.html

mysql -u custard_admin -papache -D custard -e "INSERT INTO links VALUES (${RandomNumber});"
