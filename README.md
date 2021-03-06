# Help Needed!

We are looking for a web designer who would like to help us develop a more responsive, and prettier design.

If you would like to help, please fork us and send a pull request with some changes to the design!

# Custard
Open Source CSat

Custard v1.3 (20160331)
=======================
Integrates with all MySQL based ticketing systems!

Software Requirements
=====================
 - Linux (Technically can work in windows, some of the scripts would need to be re-written in PowerShell or CMD.)
 - Apache (Any webserver should work (e.g. Nginx).)
 - MySQL
 - PHP

Install
=======

 - Install LAMP stack:

Instructions for installing lamp stacks can be found here: https://help.ubuntu.com/community/ApacheMySQLPHP

```
sudo apt-get install lamp-server^
```

 - Create the actual database:
```
mysql -u root -p*password*
> CREATE DATABASE custard;
> USE custard;
> CREATE USER 'custard_admin'@'localhost' IDENTIFIED BY '*password*';
> GRANT ALL PRIVILEGES ON custard . * TO 'custard_admin'@'localhost';
> FLUSH PRIVILEGES;
```

 - Set up settings in database:
 
 Modify mysqlconnect.php:
  - Change the password to the one set for custard_admin.
  - Change the username or host if needed.

In a web browser, navigate to _domain_/custard/install.php to setup the database as needed.

 - Get Salt for administrator password:
```
password="[put admin pw here]"
salt=`echo $RANDOM`
echo "${password}${salt}" | sha256sum
```
NOTE: Copy the hash without any of the whitespace or the dash at the end.

 - Set up admin user:
```
mysql -u custard_admin -p*password* -D custard
> INSERT INTO member VALUES ('1','admin',[The hash from above],[The salt from above]);
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

Roadmap
=======

 - v1.4

  - Stability fixes.
  - Add Tech field to database and review / search page.
  - Add .json file for menu.php to read from (as a practice for json / maybe implement more)


 - Future

  - Make reviews table sortable (http://www.kryogenix.org/code/browser/sorttable/ OR http://www.codeproject.com/Articles/1604/Sorting-HTML-Tables-using-Javascript)
  - "Pageinate" the Search page.
  - Add CSS3 animation.


