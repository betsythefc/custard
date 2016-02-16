v0.06
-----

 - Added better text formatting to the "Reviews" page.
 - Increased logged date to include hour, minute and second.
 - Added search criteria into the "reviews" page that allow someone to narrow down reviews based on the score, date and time, or the ID.

v0.05
-----

 - Created css smiley faces.
 - Created a "Reviews" page to get a list of all reviews.
 - Implemented a favicon.

v0.04
-----

 - Added scaling to web page
 - Added css formatting to DIV section of "about.html" page to increase spacing (since the css reset was put in to help the top bar formatting)
 - Added field in DB for $RandomNumber to be stored along with the review and the date.
 - Modified PHP to move the random number to the review table along with the review and date.
 - Modified new link script to check the MySQL database when creating a new random number to prevent duplicates.
 - Modified new link script to use a single review.php instead of creating a php file for each review.
 - Got Date string (yyyymmdd) for php to put into database (was hardcoded as "20160201").

v0.03
-----

 -  Learned how to make it so the folder path to these documents are not super long on git.
 -  Simplifed new link bash script by breaking apart the lines for easier readability and editing.
 -  Implemented a .gitignore file.
 -  Added logic to the actual review links that will make sure only a 0, 1 or 2 is being added (no custom typing in numbers to URLs to add above 2 or below 0).
 - "Prettified" the landing page after a review is submitted.

v0.02
-----

 - Front page now works with a MySQL database.
 - Created a bash shell script that creates the html code that is pasted at the bottom of tickets.
 - Created php files that add to the MySQL database.

v0.01
-----

 - Created name for project: Custard (Customer Ardency).
 - Created first HTML file, currently blank.
