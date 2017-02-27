# unfpa-global

This is the repository for UNFPA Global website

### CREATE THE MySQL DATABASE

Database (Ask for access from the team lead): 
https://drive.google.com/a/gizra.com/file/d/0B0mxrCADpU0eNU1SZWxFX1NEZkE/view?ts=56810b37

This step is only necessary if you don't already have a database set up (e.g.,
by your host). In the following examples, 'username' is an example MySQL user
which has the CREATE and GRANT privileges. Use the appropriate user name for
your system.

First, you must create a new database for your Drupal site (here, 'databasename'
is the name of the new database):

  mysqladmin -u username -p create databasename

MySQL will prompt for the 'username' database password and then create the
initial database files. Next you must log in and set the access database rights:

  mysql -u username -p

Again, you will be asked for the 'username' database password. At the MySQL
prompt, enter the following command:

  GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, INDEX, ALTER,
  CREATE TEMPORARY TABLES ON databasename.*
  TO 'username'@'localhost' IDENTIFIED BY 'password';

where:

 'databasename' is the name of your database
 'username' is the username of your MySQL account
 'localhost' is the web server host where Drupal is installed
 'password' is the password required for that username

Note: Unless the database user/host combination for your Drupal installation
has all of the privileges listed above (except possibly CREATE TEMPORARY TABLES,
which is currently only used by Drupal core automated tests and some
contributed modules), you will not be able to install or run Drupal.

If successful, MySQL will reply with:

  Query OK, 0 rows affected

If the InnoDB storage engine is available, it will be used for all database
tables. InnoDB provides features over MyISAM such as transaction support,
row-level locks, and consistent non-locking reads.

### Files

Ask for access from the team lead.
