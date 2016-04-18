#!/bin/bash

date=`date`
echo "[INF] $date"

echo "[INF] Starting sync..."

CustardUsername="custard_admin"
CustardPassword="apache"
CustardDatabase="custard"

echo "[INF] -- Collecting information from Custard database..."
Integration=(`mysql -u $CustardUsername -p${CustardPassword} -D $CustardDatabase -e "SELECT parameter FROM settings WHERE setting='ticket_integration'"`)
echo "[INF] ---- Collected integration setting."
IntegrationHost=(`mysql -u custard_admin -papache -D custard -e "SELECT parameter FROM settings WHERE setting='ticket_integration_db_host'"`)
echo "[INF] ---- Collected integration host."
IntegrationDB=(`mysql -u custard_admin -papache -D custard -e "SELECT parameter FROM settings WHERE setting='ticket_integration_db'"`)
echo "[INF] ---- Collected integration database."
IntegrationUser=(`mysql -u custard_admin -papache -D custard -e "SELECT parameter FROM settings WHERE setting='ticket_integration_db_user'"`)
echo "[INF] ---- Collected integration user."
IntegrationPW=(`mysql -u custard_admin -papache -D custard -e "SELECT parameter FROM settings WHERE setting='ticket_integration_db_pw'"`)
echo "[INF] ---- Collected integration password."
IntegrationQuery=(`mysql -u custard_admin -papache -D custard -e "SELECT parameter FROM settings WHERE setting='ticket_integration_query'"`)
QueryLength=`echo "${#IntegrationQuery[@]}-1" | bc`
Query="${IntegrationQuery[@]:1:$QueryLength}"
echo "[INF] ---- Collected integration query."

echo "[INF] -- Collected information."

if [ "${Integration[1]}" != "disabled" ]
then
	if [ "${Integration[1]}" = "mysql" ]
	then
		echo "[INF] -- Running Databse query..."
		ARR=(`mysql -h ${IntegrationHost[1]} -u ${IntegrationUser[1]} -p${IntegrationPW[1]} -D ${IntegrationDB[1]} -e "$Query"`)
		echo "[INF] ---- Checking tickets..."
		
		for ticket in ${ARR[@]}
		do
			if [ $ticket != "number" ]
			then
				Links=(`mysql -u custard_admin -papache -D custard -e "SELECT * FROM links WHERE link='$ticket'"`)
				CSat=(`mysql -u custard_admin -papache -D custard -e "SELECT id FROM csat WHERE id='$ticket'"`)
				if [ "${Links[1]}" = "$ticket" ] || [ "${CSat[1]}" = "$ticket" ]
				then
					echo "" >> /dev/null	
				else 
					echo "[INF] ---- Copying ticket numbers to Custard database..."
					mysql -u custard_admin -papache -D custard -e "INSERT INTO links VALUES ($ticket);"
					echo "[INF] ------ Imported ticket: $ticket"
				
					IP=`ip addr | grep "inet " | grep -v "127.0.0.1" | grep -oh '[0-9]*\.[0-9]*\.[0-9]*\.[0-9]*' | grep -v 255`
					Domain="http://$IP/custard"
				
					echo -e "<a href=\"$Domain/add.php?review=2&ticket=${ticket}\"><div style=\"width: 100px; height: 100px; border-radius: 10px; background-color: green; float: left; margin: 5px; font-size: 4em; line-height: 90px; text-align: center; font-weight: bold; color: black;\">:)</div></a><a href=\"$Domain/add.php?review=1&ticket=${ticket}\"><div style=\"width: 100px; height: 100px; border-radius: 10px; background-color: #ffa500; float: left; margin: 5px; font-size: 4em; line-height: 90px; text-align: center; font-weight: bold; color: black;\">:|</div></a><a href=\"$Domain/add.php?review=0&ticket=${ticket}\"><div style=\"width: 100px; height: 100px; border-radius: 10px; background-color: #c70000; float: left; margin: 5px; font-size: 4em; line-height: 90px; text-align: center; font-weight: bold; color: black;\">:(</div></a>" >> ../links/${ticket}.html
				fi
			fi
		done
	fi
fi

echo "[INF] Sync complete."
