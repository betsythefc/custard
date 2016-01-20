# Custard
Open Source CSat

Custard v0.03 (20160119)
------------------------
It works, with lots of manual script running and 0 integration.

Software Requirements
---------------------
 - Linux (Technically can work in windows, some of the scripts would need to be re-written in PowerShell or CMD.)
 - Apache (Any webserver should work (e.g. Nginx).)
 - MySQL
 - PHP

Install
-------

 - Install LAMP stack:
```
sudo apt-get install lamp-server^
```

 - Create the actual database:
```
mysql -u root -p *password* -e 'create database custard;'
mysql -u root -p *password* -D custard -e 'create table csat (score INT,date INT);'
mysql -u root -p *password* -D custard -e 'create table links (link INT);'
```

 - Create the folder:
```
sudo mkdir /var/www/html/custard
```

 - Copy Custard files to the folder:
```
sudo cp */path/to/downloaded/files/*\* /var/www/html/custard/
```

*There are some more steps but I still need to figure them out.*


