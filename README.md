# Custard
Open Source CSat

Custard v1.0 (20160308)
------------------------
Can now export reports.
Settings page.
New dark theme!

Software Requirements
---------------------
 - Linux (Technically can work in windows, some of the scripts would need to be re-written in PowerShell or CMD.)
 - Apache (Any webserver should work (e.g. Nginx).)
 - MySQL
 - PHP

Install
-------

 - Install LAMP stack:

Instructions for installing lamp stacks can be found here: https://help.ubuntu.com/community/ApacheMySQLPHP

```
sudo apt-get install lamp-server^
```

 - Create the actual database:
```
mysql -u root -p*password*
> CREATE DATABASE custard;
> USER custard;
> CREATE TABLE csat (score INT,date VARCHAR(60),id VARCHAR(60),comment VARCHAR(140));
> CREATE TABLE links (link INT);
> CREATE TABLE member (mem_id int(11) NOT NULL AUTO_INCREMENT, username VARCHAR(30) NOT NULL, password VARCHAR(180) NOT NULL, salt VARCHAR(60) NOT NULL, user_type VARCHAR(10), PRIMARY KEY (mem_id));
> CREATE TABLE settings(setting VARCHAR(60) NOT NULL,parameter VARCHAR(120) NOT NULL);
> CREATE USER 'custard_admin'@'localhost' IDENTIFIED BY '*password*';
> GRANT ALL PRIVILEGES ON custard . * TO 'custard_admin'@'localhost';
> FLUSH PRIVILEGES;
```

 - Set up settings in database:
```
> INSERT INTO settings VALUES ('theme','light');
> INSERT INTO settings VALUES ('integration','disabled');
> INSERT INTO settings VALUES ('integration_db','NULL');
> INSERT INTO settings VALUES ('integration_db_host','NULL');
> INSERT INTO settings VALUES ('integration_db_user','NULL');
> INSERT INTO settings VALUES ('integration_db_pw','NULL');
> INSERT INTO settings VALUES ('integration_ticketquery','NULL');
```

 - Get Salt for administrator password:
```
password="\[put admin pw here\]"
salt=`echo $RANDOM`
echo "${password}${salt}" | sha256sum
```
NOTE: Copy the hash without any of the whitespace or the dash at the end.

 - Set up admin user:
```
mysql -u custard_admin -p*password* -D custard
> INSERT INTO member VALUES ('1','admin',\[The hash from above\],\[The salt from above\]);
> exit
```

 - Create the folder:
```
sudo mkdir /var/www/html/custard
```

 - Download custard:
```
cd /var/www/html/custard
sudo apt-get install unzip
sudo wget https://github.com/betsythefc/custard/archive/master.zip
sudo unzip master.zip
sudo mv custard-master/custard custard
```

 - Cleanup:

```
sudo rm master.zip custard-master
```

Congratulations! Custard is now installed.


