v1.0
----
 
 - Cleaned up the php files.
 - Created a way to download reviews as a CSV file.
 - Added a comments section to the review for AFTER the review has been submitted.
 - Created a login page.
 - Hashed & salted passwords in databse
 - Prettified the login page.
 - Prettified the logout page.
 - Made logout page redirect to login page after 1 seconds.
 - Created a "Settings" page.
 - Implememented a "Dark theme" that can be toggled with using PHP as the CSS page.
 - Added a user creation setting in settings page.


v0.9
----

 - Created "review details" page that will list the details, any comments and an enlarged copy of the smiley face.
 - Changed Smiley dropdown to check boxes.
 - Changed Date search to a date range.

v0.8
----

 - Added footer to all pages that includes a link to the Apache license.
 - Have date searched set in the date box persistently.
 - Have time searched set in the time box persistently.
 - Have the smiley set in the smiley search box persistently.
 - Allowed to search for reviews by only putting in 02 instead of filling in the month, day and year.
 - Allowed to search for reviews by only entering the hour, instead of reqiuring both hour and minute.
 - Used a foreach loop to loop through all "options" for hours and write out which one is selected.

v0.7
-----

 - Renamed the reviews page to avoid confusion with the review.php which submits the score.
 - Included smiley next to CSAT score on review page.
 - Created "PHP" folder and remove embedded PHP to separate PHP scripts.
 - Moved all standard design elements to php "require" calls.
 - Made table on reviews page alternate a darker color and a lighter color for easier viewing.
 - Changed version scheme (e.g. v0.07 becomes v0.7)

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