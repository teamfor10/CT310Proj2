# CT310Proj2
Overview: A Web Managed Ingredients Site.
<br /><br />
This project extends the previous project in five major ways:<br />

Ingredient pages build on-the-fly from information stored in a site database.<br />
Support for two classes of site users, customers and administrators.<br />
Administrators can add new ingredients through a custom built browser interface.<br />
Customers have a shopping basket and can submit orders.<br />
Both administrators can recover, reset if you will, passwords through an (relatively) secure email protocol.<br /><br />
Requirements Summary
<br />
Please refer back to the Project 1 requirements. Unless there is some explicit reason that a requirement for Project 2 supercedes Project 1, assume those original requirements are still in effect. For example, do not take away the ability for a Customer or Administrator to add comments. An administrator may also edit any previously left comment and even delete a comment.
<br /><br />
Once an administrator is authenticated with the site, they can initiate a process of adding an ingredient. That process will require submission of a name, new text description, and the uploading of an image. The text will all be entered into a database of your construction. The file name of the image will also go in the database. How to upload images will be covered in lecture.
<br /><br />
A customer can add and remove ingredients from a shopping basket and submit an order. Once submitted, the customer and the administrator(s) receive and email version of the order.
<br /><br />
If a designated user looses or forgets a password, a special recovery process through email will be impmemented. This will be discussed further in lecture. What is critical is the user carry out the entire process in the same browser session.
<br /><br />
<strong>Addendum</strong>
<br /><br />
Here is a critical hint for some of you. Look at the use of "__DIR__" in line 6 of database.php in lec20. Under some circumstances, failure to faithfully follow the example (using relative paths instead) can result in complete failure to connect to the database file. (Ross 4/5/17)
<br /><br />
A number of clarifications and suggestions where made in lecture on April 5th. Some of these are summarized below. In general, when reviewing these suggestions, keep in mind that if you have already developed a solution for this project that follows an approach different than that being recommended, you need not change your existing code. If in doubt about such a design decision, please email the GTA and instructor to make sure. (Ross 4/5/17)
<br /><br />
On Piazza there was a request to say more about 'load on-the-fly'. Here is the response: One way to satisfy this requirement is to have a single file/page called something like show_ingredient.php and then when you add arguments to the URL (using the standard protocol for passing via the GET protocol) that specify an ingredient (think about "&in=kale") then the page displays all the information for the ingredient Kale. The same file/page loaded with the argument 'pumpkin' will load and display information about the ingredient pumpkin. Now, about the database. Yes, the PHP code on the server reads the GET argument and retrieves the information about kale/pumpkin/... and generates the appropriate HTML on-the-fly that is then sent to the client for display. One last detail, the image of kale/pumpkin/... is not itself stored in the database; It lives in folder of ingredient images. What does live in the database is the file name of the image of the ingredient, i.e. kale/pumpkin/... (Ross 4/5/17)
<br /><br />
Requirement 5 above should read (and now does read): Both administrators and customers can recover, reset if you will, passwords through a (relatively) secure email protocol. On this topic, here is an additional point I want to reinforce. A user MUST generate the request to reset their password from the same browser during the same session. One easy way for this to work 'automatically' is store the magic key as a session variable upon sending the email and then look for that key when a new page request arrives. If you follow this design, then should the user shutdown and restart their browser, that session data is lost, and hence a key match cannot take place. And, one more thing to emphasize. You will notice that no mechanism exists to add a new administrator or customer through the web. This means in particular that new email address can never be added to the site through a web browser. This is not a minor matter, but indeed a major protection against outside abuse. It is true that anyone on the web could harass one of the registered users by repeatedly issuing password reset emails to be sent to that user. But that same malicious actor cannot actually get a password reset delivered to an email account under their own control. (Ross 4/5/17)
<br /><br />
In lecture the process of having a 'Guest' user initiate the sending of a password reset email was clarified. First, it is not necessary to be logged into the site to send such and email; such a requirement seems at odds with the need for a user to reset their password. How an existing user is selected for such an email can be handled in multiple ways. One way is to have unique user names, and ask someone to type in the name of the user whose password they wish to reset. Another is similar, but uses the email address itself to designate the user. If using this method, be certain to never send email to an address not already stored for a user. Finallly, a dropdown select menu could be used. To reiterate a key point about security, under no circumstances ever can someone add or change through a browser a stored email address maintained by your site. (Ross 4/5/17)
<br /><br />
Your authentication needs to use the more up-to-date Blowfish password hashing. Points will be deducted from projects that use MD5 hashing. (Ross 4/5/17)
<br /><br />
Generally SQLite database tables rather than CSV files should be used for this assignment. However, project teams with working solutions using CSV files may submit their project sites and no points will be taken off for the use of CSV rather than SQLite, provided of course that the site meets the performance requirements for the assignment. (Ross 4/5/17)
<br /><br />
Customer comments should be retained in the site database. To be clear, this means that once submitted comments remain a permenant part of the site. You may wish, optionally, to allow an administrator to clear or even edit comments. (Ross 3/22/17)