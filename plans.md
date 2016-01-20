v0.04
-----

 - Add scaling to web page
 - Add css formatting to DIV section of "about.html" page to increase spacing (since the css reset was put in to help the top bar formatting)
 - Restructure Database:

open:

id | date_open
--- | ---
$RandomNumber | $Date

closed:

id | review | date_submitted
--- | ---
$RandomNumber | 0..2 | $Date

 - Modify PHP to move the random number to the review table along with the review and date.
 - Modify new link script to check the MySQL database when creating a new random number to prevent duplicates

v0.05
-----

 - Create a login page so only authorized techs can view the numbers (http://www.sourcecodester.com/tutorials/php/4341/how-create-login-page-phpmysql.html).
 - Set up a bash shell install script to set up MySQL (Include a way to enter in a MySQL password for the custard_admin MySQL user) and install all dependencies (look at readme.md).
