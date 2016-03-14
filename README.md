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
> CREATE TABLE csat (score INT,date VARCHAR(60),id VARCHAR(60),comment VARCHAR(140));
> CREATE TABLE links (link INT);
> CREATE TABLE member (mem_id int(11) NOT NULL AUTO_INCREMENT, username varchar(30) NOT NULL, password varchar(180) NOT NULL, salt VARCHAR(60) NOT NULL, PRIMARY KEY (mem_id));
> CREATE TABLE settings(setting VARCHAR(60) NOT NULL,parameter VARCHAR(120) NOT NULL);
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

