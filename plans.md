v0.03
-----

 - ~~[DONE] Learn how to make it so the folder path to these documents are not super long on git.~~
 - ~~[DONE] Simplify new link bash script by breaking apart the lines for easier readability and editing.~~
 - ~~[DONE] Implement a .gitignore file.~~
 - Set up a bash shell install script to set up MySQL (Include a way to enter in a MySQL password for the custard_admin MySQL user) and install all dependencies (look at readme.md).
 - [SORT OF DONE] Add logic to the actual review links that will make sure only a 0, 1 or 2 is being added (no custom typing in numbers to URLs to add above 2 or below 0). *It seems to accept strings and numbers 0, 1 and 2. It does not accept <0 and >2 as expected.*
 - ~~[DONE] "Prettify" the landing page after a review is submitted.~~

v0.04
-----

 - ~~[DONE] Add scaling of text on web page.~~
 - Add scaling to web page (Using the vw/vh/vmax/vmin font scaling in CSS: https://css-tricks.com/viewport-sized-typography/).
 - Add css formatting to DIV section of "about.html" page to increase spacing (since the css reset was put in to help the top bar formatting)
 - Add column in MySQL table where reviews are stored to store the number that was generated.
 - Add column in MySQL table where reviews are stored to store the date when the review was submitted.
 - Modify PHP to move the random number to the review table along with the review and date.
 - Modify new link script to check the MySQL database when creating a new random number to prevent duplicates

v0.05
-----

 - Create a login page so only authorized techs can view the numbers (http://www.sourcecodester.com/tutorials/php/4341/how-create-login-page-phpmysql.html).
