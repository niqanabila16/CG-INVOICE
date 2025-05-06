=== TSW CG INVOICE ===
Computer Generated Invoice Application
cginvoice ver. 3.0.01 by Tradesouthwest
Author URI: https://tradesouthwest.com 

## License
License: Apache License
License URI: See File, LICENSE

## Legal Notice: 

No liabilities for using this software for personal or business use.

Tradesouthwest 2018
https://tradesouthwest.com 

== Description
Invoicing and Contacts program accessed from your web browser.
- Print from preview window.
- Bootstrap HTML5 - PDO - MySQL - PHP
- Log in secure sessions
- Menu driven selections to create new invoice and display current invoices.
- Adaptable CSS styles and @print @page calls for printing.
- Scheduler calendar and vendor, client, contacts directory
- Email invoice directly from page without exporting file

== Install
Must be installed on a server with PHP 5.2 or greater.
1 - Create database called cginvoice (for example)
2 - Extract files to folder on Apache Server/Linux/localhost
3 - Add tables to your database (PHPMyAdmin) from file ..../inc/cginvoice.sql*
4 - Add your database access information into `inc/db.php`
5 - Add your company address and info into the admin panel to configure emails and other company information.
7 - Put backlink to tradesouthwest.com somewhere on the net!
*The program was designed for MySQL but is written using PDO. Prepared statements used in all instances. Tables are altered to preserve PDO connection types.

== Usage 
a) Navigate from side menu.
b) Reprint last will give you a copy of the last invoice you just put into the database.
c) View/Print lets you print an invoice and pulls up every customer on a single page
e) Print button at bottom of invoice sends the invoice to a preview page and then can be printed.
f) Instructions link in footer.
Administrator login is: tryme / trymenow PLEASE CHANGE ASAP (Go to MyAccount and Change Password. then make a new user with the Token method and change the "access level" to 0.)

== Change Log ==
v. 3.0.01
* added vendors-template
* added ready to go admin to sql

v. 3.0.0
Aug 11, 2018
* fully revised edition 
* less files
* more security
* added scheduler
