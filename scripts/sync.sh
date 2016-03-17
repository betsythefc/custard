#!/bin/bash

date

echo "Starting sync..."

echo "Collecting information from Custard database..."
Integration=(`mysql -u custard_admin -papache -D custard -e "SELECT parameter FROM settings WHERE setting='integration'"`)
IntegrationHost=(`mysql -u custard_admin -papache -D custard -e "SELECT parameter FROM settings WHERE setting='integration_db_host'"`)
IntegrationDB=(`mysql -u custard_admin -papache -D custard -e "SELECT parameter FROM settings WHERE setting='integration_db'"`)
IntegrationUser=(`mysql -u custard_admin -papache -D custard -e "SELECT parameter FROM settings WHERE setting='integration_db_user'"`)
IntegrationPW=(`mysql -u custard_admin -papache -D custard -e "SELECT parameter FROM settings WHERE setting='integration_db_pw'"`)
IntegrationQuery=(`mysql -u custard_admin -papache -D custard -e "SELECT parameter FROM settings WHERE setting='integration_ticketquery'"`)
QueryLength=`echo "${#IntegrationQuery[@]}-1" | bc`
Query="${IntegrationQuery[@]:1:$QueryLength}"

echo "Collected information."

if [ "${Integration[1]}" != "disabled" ]
then
	if [ "${Integration[1]}" = "mysql" ]
	then
		echo "Connecting to the database..."
		ARR=(`mysql -h ${IntegrationHost[1]} -u ${IntegrationUser[1]} -p${IntegrationPW[1]} -D ${IntegrationDB[1]} -e "$Query"`)
	
		for ticket in ${ARR[@]}
		do
			if [ $ticket != "number" ]
			then
				echo "Checking tickets..."
				Links=(`mysql -u custard_admin -papache -D custard -e "SELECT * FROM links WHERE link='$ticket'"`)
				CSat=(`mysql -u custard_admin -papache -D custard -e "SELECT id FROM csat WHERE id='$ticket'"`)
				if [ "${Links[1]}" = "$ticket" ] || [ "${CSat[1]}" = "$ticket" ]
				then
					echo "" >> /dev/null	
				else 
					echo "Copying ticket numbers to Custard database..."
					mysql -u custard_admin -papache -D custard -e "INSERT INTO links VALUES ($ticket);"
					echo "Imported ticket: $ticket"
				
					IP=`ip addr | grep "inet " | grep -v "127.0.0.1" | grep -oh '[0-9]*\.[0-9]*\.[0-9]*\.[0-9]*' | grep -v 255`
					Domain="http://$IP/custard"
				
					echo -e "<a href=\"$Domain/add.php?review=2&ticket=${ticket}\"><div style=\"width: 100px; height: 100px; border-radius: 10px; background-color: green; float: left; margin: 5px; font-size: 4em; line-height: 90px; text-align: center; font-weight: bold; color: black;\">:)</div></a><a href=\"$Domain/add.php?review=1&ticket=${ticket}\"><div style=\"width: 100px; height: 100px; border-radius: 10px; background-color: #ffa500; float: left; margin: 5px; font-size: 4em; line-height: 90px; text-align: center; font-weight: bold; color: black;\">:|</div></a><a href=\"$Domain/add.php?review=0&ticket=${ticket}\"><div style=\"width: 100px; height: 100px; border-radius: 10px; background-color: #c70000; float: left; margin: 5px; font-size: 4em; line-height: 90px; text-align: center; font-weight: bold; color: black;\">:(</div></a>" >> ../links/${ticket}.html
				fi
			fi
		done
	fi
fi

echo "Sync complete."
