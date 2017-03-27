# CT310Proj2
Overview: A Web Managed Ingredients Site.

This is a Paired Programming Project. It is the second in a three part semester project working toward a class federation of fresh ingredients supply websites. Teams will be assigned through Canvas by close of Friday 3/10/17. You will have a new partner, and one of the first challenged of his assignment is deciding how best to integrate exiting code from your respective project 1 sites.

This project extends the previous project in five major ways:

Ingredient pages build on-the-fly from information stored in a site database.
Support for two classes of site users, customers and administrators.
Administrators can add new ingredients through a custom built browser interface.
Customers have a shopping basket and can submit orders.
Both administrators can recover, reset if you will, passwords through an (relatively) secure email protocol.
Requirements Summary

Please refer back to the Project 1 requirements. Unless there is some explicit reason that a requirement for Project 2 supercedes Project 1, assume those original requirements are still in effect. For example, do not take away the ability for a Customer or Administrator to add comments. An administrator may also edit any previously left comment and even delete a comment.

Once an administrator is authenticated with the site, they can initiate a process of adding an ingredient. That process will require submission of a name, new text description, and the uploading of an image. The text will all be entered into a database of your construction. The file name of the iamge will also go in the database. How to upload images will be covered in lecture.

A customer can add and remove ingredients from a shopping basket and submit an order. Once submitted, the customer and the administrator(s) receive and email version of the order.

If a designated user looses or forgets a password, a special recovery process through email will be impmemented. This will be discussed further in lecture. What is critical is the user carry out the entire process in the same browser session.