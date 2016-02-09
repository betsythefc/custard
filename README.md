# Custard
Open Source CSat

Custard v0.04 (20160205)
------------------------
It works. Far more automation. Still requires 2 bash scripts.

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
> CREATE TABLE csat (score INT,date INT,id VARCHAR(60));
> CREATE TABLE links (link INT);
> CREATE TABLE \`member\` (\`mem_id\` int(11) NOT NULL AUTO_INCREMENT, \`username\` varchar(30) NOT NULL, \`password\` varchar(30) NOT NULL, PRIMARY KEY (\`mem_id\`));
> CREATE USER 'custard_admin'@'localhost' IDENTIFIED BY '*password*';
> GRANT ALL PRIVILEGES ON custard . * TO 'custard_admin'@'localhost';
> FLUSH PRIVILEGES;
```

 - Create the folder:
```
sudo mkdir /var/www/html/custard
```

 - Copy Custard files to the folder:

```
sudo cp /path/to/downloaded/files/* /var/www/html/custard/
```

Congratulations! Custard is now installed.


