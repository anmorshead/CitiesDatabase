<img width="150px" src="https://w0244079.github.io/nscc/nscc-jpeg.jpg" >

# INET 2005 - Assignment
Total points - 30

## Prerequisites

Recommended: Labs 1 & 2: PHP Debugging and PHP Basics.<br/>
Strongly Recommended: Lab 3: Introduction to PHP + MySQL, JavaScript.

## Summary

You will create a web site in PHP that will allow for the viewing, searching, inserting, updating, and deleting of city records from the provided MySQL `world` sample database. Forms to allow for insertion and update will have client-side validation of valid input. Only authenticated users will be able to access the system. Some significant value-added innovation will be included on top of the system requirements.

1.	Don’t forget that a code review is a required part of this assignment (worth <b>5pts</b> of your final assignment grade). You will need to show your code to the instructor in code review on or shortly after the due date while going through an evaluation of the site’s functionality. You will need to explain how the code works and complete the code review part of the rubric. You will need to do this to at least a competent level (refer to the rubric for more details).
2.	Late submissions will be subject to the late penalties laid out in the course outline. 

## General Requirements

### REQ-1: DISPLAY OF CITY RECORDS (4 PTS.)

Create a home page with the name of your choosing and display the first twenty-five (25) city records in an HTML table with borders and gridlines as seen in the accompanying figure below. 
Configure the appropriate SQL query such that the following fields are displayed in the html table:
* ID (from city table)
* Name (from city table)
* District (from city table)
* Population (from city table)
* Country (full name from country table)    
  
Rows should be sorted by the city ID in ascending order.

<figure>
  <img src="https://w0244079.github.io/nscc/courses/inet2005/assignment/cities/req1.png" width="400px" />
  <figcaption><i>Figure - Display first 25 cities</i></figcaption>
</figure>

### REQ-2:	PAGING THROUGH CITY RECORDS (3 PTS.)

Extend the functionality of the page you created in REQ-1 by adding functionality to navigate through all city records by providing either links or buttons that then cause the page to display the next 25 records or the previous 25 records depending on the link that was clicked. The ability to page through the entire record set 25 records at a time will be implemented. This paging feature must not break if users are on either the first or last page of results.

### REQ-3: SEARCHING FOR CITY RECORDS (4 PTS.)

Add a page that will facilitate the searching of city records. The user will type a search string in a textbox and only matching results will display. The search string will be preserved in the textbox upon page refresh (i.e. a sticky form). The search string will be matched against the city table's `name` column and the `district` column. So matches from either column should be displayed in the results. See Figure below:

<figure>
  <img src="https://w0244079.github.io/nscc/courses/inet2005/assignment/cities/search.png" width="400px" />
  <figcaption><i>Figure 1 – Example of searching for cities</i></figcaption>
</figure>

### REQ-4: ADDING CITY RECORDS (3 PTS.)

Add a page that will facilitate the creation of new city records. An HTML Form will allow the user to fill out all fields corresponding to all fields in the `city` table. The country data should be entered via a dropdown list of all available countries. The HTML Form will be subjected to proper client-side validation prior to submission to PHP for database insertion (see REQ-006). Once the record is created, the number of affected rows will be reported.

### REQ-5: UPDATING CITY RECORDS (3 PTS.)

Add a page that will facilitate the updating of existing city records. A specified record will be selectable for update. (<b>This will be done with an Edit button in the table that displays records (as shown in Figure below</b>). An HTML Form will display with exiting data pre-populated in the form fields, which will allow the user to modify the data corresponding to all fields in the `city` table. The country data should be entered via a dropdown list of all available countries. The HTML Form will be subjected to proper client-side validation prior to submission to PHP for database update (see REQ-6). The number of affected rows will be reported.

### REQ-6: CITY DATA ENTRY/MODIFICATIONS WITH CLIENT-SIDE VALIDATION (3 PTS.)

The data on HTML forms for creating and updating a city in the database will be fully validated on the client before being allowed to submit to server-side code for database modification. All fields must validate according to the restrictions for the data in each table column. In addition, city and district names must begin with a capital letter followed by one or more lower case letters. Appropriate error messages must be displayed in areas next to the erroneous fields in the form and <b>not as pop-up boxes</b>.

### REQ-7: DELETING CITY RECORDS (3 PTS.)

City records will be deleted. A specified record will be selectable for deletion. <b>This will be done by adding a `Delete` button to the html the table that displays records (as shown in Figure below)</b>. The deletion will be confirmed before executing. The number of affected rows will be reported.

<figure>
  <img src="https://w0244079.github.io/nscc/courses/inet2005/assignment/cities/update-delete.png" width="400px" />
  <figcaption><i>Figure - Example of edit and delete buttons for REQ-5 and REQ-7</i></figcaption>
</figure>

### REQ-8: LIMITING ACCESS TO ONLY AUTHENTICATED USERS (4 PTS.)

Only authenticated users will be able access the site’s pages and view/modify the data. A login screen that prompts for the username and password will be presented when a user tries to access any page of the website. The password field will be masked with asterisks when the user types. The login information will match against data stored in a new `users` table that you add to the `world` database and the password will be appropriately hashed using modern web techniques. If the credentials match, they will be redirected to the site; otherwise they will stay on the login screen and get an appropriate message. Each page will have a `Logout` button, which will redirect to the login page and clear current logged in credentials when clicked. 

### REQ-9: ADD YOUR OWN UNIQUE AND USEFUL FEATURE IN THE WEB APPLICATION (3 PTS.)

A <b>significant and unique</b> feature will be added to the web site to give additional value to its role as tool for interacting with the city data. This feature will provide functionality in addition to the previous set of requirements and can involve making an alteration/addition to the `world` database.



